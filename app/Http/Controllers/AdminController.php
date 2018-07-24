<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Googl;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
{
    private $client;
    private $drive;
    private $token;

    public function startConfig(){
        $cli = new Googl;
        $this->client = $cli->client();
        //dd(session('user.token'));
        $this->client->setAccessToken(session('user.token'));
        $this->drive = $cli->drive($this->client);
    }
    public function index()
    {   
        return view('admin.dashboard');
    }
    public function files()
    {
        $result = [];
        $pageToken = NULL;
        $files = [];
        // tres mese atras a partir de hoy en formato  formato RFC que por default es
        // timezone is UTC, e.g., 2012-06-04T12:00:00-08:00.
        // y es el formato nombrado en la documentacion de la api
        $three_months_ago = Carbon::now()->subMonths(3)->toRfc3339String();
        do {
            try {
                $parameters = [
                    'q' => "viewedByMeTime >= '$three_months_ago' or modifiedTime >= '$three_months_ago'",
                    'orderBy' => 'modifiedTime',
                    'fields' => 'nextPageToken, files(id, name, modifiedTime, iconLink, webViewLink, webContentLink)',
                ];
                // de existir el token para continuar una solicitud de lista previa en la página siguiente
                if ($pageToken) {
                    $parameters['pageToken'] = $pageToken;
                }
                $result = $this->drive->files->listFiles($parameters);
                $files = $result->files;
                //array_push($files,$result->files);
                // se obtiene la pagina siguiente 
                $pageToken = $result->getNextPageToken();
            } catch (Exception $e) {
                return redirect('/files')->with('message',
                    [
                        'type' => 'error',
                        'text' => 'Something went wrong while trying to list the files'
                    ]
                );
              $pageToken = NULL;
            }
            // debe seguir enviando la consulta hasta que no exista una pagina mas
        } while ($pageToken);
        $page_data = [
            'files' => $files
        ];
        return view('admin.files', $page_data);
   }
    public function search(Request $request)
    {   
        $query = '';
        $files = [];
        if ($request->has('query')) {
            $query = $request->input('query');
            $parameters = [
                'q' => "name contains '$query'",
                'fields' => 'files(id, name, modifiedTime, iconLink, webViewLink, webContentLink)',
            ];
            $result = $this->drive->files->listFiles($parameters);
            if($result){
                $files = $result->files;
            }
        }
        $page_data = [
            'query' => $query,
            'files' => $files
        ];
        return view('admin.search', $page_data);
   }
    public function delete($id)
    {   
        $this->startConfig();
        try {
            $this->drive->files->delete($id);
        } catch (Exception $e) {
            $message = [
                'type' => 'success',
                'text' => 'No se pudo eliminar el archivo'];
            return view('admin.dashboard',$message);
          
        }
        $message = [
            'type' => 'success',
            'text' => 'Archivo eliminado'];
        return view('admin.dashboard', $message);
          
    }
    public function upload()
    {   
        return view('admin.upload');
    }
   	public function doUploadFileImage(Request $request){

   		if ($request->hasFile('imagefile')) {
        	//lấy file
            $file = $request->file('imagefile');
            //lấy thể loại
            $allowedFileTypes=config('app.typesImage');
            $maxFileSize=config('app.maxFileSize');
      //      $this->validate($request,
    		// [
    		// 	'file'=>'required|mimes:'.$allowedFileTypes
    		// ],
    		// [
    		// 	'file.required'=>'Chưa nhập Tên Quốc gia',
    		// 	'file.mimes'=>'Phải nhập lớn hơn 4 ký tự'
    		// ]);
            //lấy tên
            $name = $file->getClientOriginalName();
            
            //copy 1 file vào mục documentos
            $request->file('imagefile')->move('documentos/', $name);

            //lấy dữ liệu của file vào biến contents
            $contents = File::get('documentos\\'.$name);
            
		    
            try {
            	//đẩy dữ liệu lên
			    Storage::cloud()->put($name, $contents);

			    //xóa file tạm trong documentos
                File::delete('documentos\\'.$name);

                //lất id của file vừa tải
                $dir = '/';
                $recursive = false; // Get subdirectories also?
                $contents = collect(Storage::cloud()->listContents($dir, $recursive));
                
		    	
			    $f = $contents
			        ->where('type', '=', 'file')
			        ->where('filename', '=', pathinfo($name, PATHINFO_FILENAME))
			        ->where('extension', '=', pathinfo($name, PATHINFO_EXTENSION))
			        ->first(); // there can be duplicate file names!
			    $id=$f['path'];
			   
                return "https://drive.google.com/uc?id=".$f['path'];
                
            } catch (Exception $e) {
                $message = [
                    'type' => 'error',
                    'text' => 'Error al almcenar el archivo'];
                return view('admin.upload', $message);
               
            }
        }
        return "noen";
    
   	}
    public function doUpload(Request $request)
    {   //kiểm tra có file gửi lên không
        if ($request->hasFile('imagefile') && $request->hasFile('musicfile')) {
        	//lấy file
            $file = $request->file('imagefile');
            $musicFile= $request->file('musicfile');
            //lấy thể loại
            $allowedFileTypes=config('app.allowedFileTypes');
            $maxFileSize=config('app.maxFileSize');
            /*$rules=[
            	'file'=>'required|mimes:'.$allowedFileTypes.'|max:'.$maxFileSize
            ];
            $this->validate($request,$rules);*/

            $mime_type = $file->getMimeType();
            //lấy tên
            $title = $file->getClientOriginalName();
            $description = $request->input('description');
            $name = $file->getClientOriginalName();
            $nameSong = $musicFile->getClientOriginalName();
            
            //copy 1 file vào mục documentos
            $request->file('imagefile')->move('documentos/', $name);
            $request->file('musicfile')->move('documentos/', $nameSong);

            //lấy dữ liệu của file vào biến contents
            $contents = File::get('documentos\\'.$name);
            $contentsSong = File::get('documentos\\'.$nameSong);
            //$file_metadata->setMimeType($mime_type);

            
		    
            try {
            	//đẩy dữ liệu lên
			    Storage::cloud()->put($name, $contents);
			    Storage::cloud()->put($nameSong, $contentsSong);

			    //xóa file tạm trong documentos
                File::delete('documentos\\'.$name);
                File::delete('documentos\\'.$nameSong);

                //lất id của file vừa tải
                $dir = '/';
                $recursive = false; // Get subdirectories also?
                $contents = collect(Storage::cloud()->listContents($dir, $recursive));
                
		    	
			    $f = $contents
			        ->where('type', '=', 'file')
			        ->where('filename', '=', pathinfo($name, PATHINFO_FILENAME))
			        ->where('extension', '=', pathinfo($name, PATHINFO_EXTENSION))
			        ->first(); // there can be duplicate file names!
			    $id=$f['path'];
			    $fs = $contents
			        ->where('type', '=', 'file')
			        ->where('filename', '=', pathinfo($nameSong, PATHINFO_FILENAME))
			        ->where('extension', '=', pathinfo($nameSong, PATHINFO_EXTENSION))
			        ->first(); // there can be duplicate file names!
                $message = [
                    'type' => 'success',
                    'text' => 'Archivo almacenado con el id: '. $id];
                return "https://drive.google.com/uc?id=".$fs['path']."&export=download"." <br> "."https://drive.google.com/uc?id=".$f['path'];
                
            } catch (Exception $e) {
                $message = [
                    'type' => 'error',
                    'text' => 'Error al almcenar el archivo'];
                return view('admin.upload', $message);
               
            }
        }
        return "noen";
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('message', ['type' => 'success', 'text' => 'You are now logged out']);
    }
}