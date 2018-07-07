<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
         //$this->call(JurisdictionSeeder::class);
        $this->call(UserSeeder::class);
    }
   }
    class JurisdictionSeeder extends Seeder
{
	public function run()
    {
        DB::table('JURISDICTION')->insert([
            ['jurisdiction_id'=>0,'jurisdiction_name'=>'Ban quản trị'],
            ['jurisdiction_id'=>1,'jurisdiction_name'=>'Thành viên']
        ]);
    }
}
     class ArtistSeeder extends Seeder
    {
        public function run()
        {
            DB::table('ARTISTS')->insert([
                ['artist_name'=>'Bích Phương','artist_image'=>'https://zmp3-photo.zadn.vn/thumb/240_240/avatars/4/3/43d8be33dc00a33132c82adb9d0d3a54_1509355224.jpg','nation_id'=>1,'info_summary'=>"Bích Phương là ca sĩ trưởng thành từ cuộc thi Việt Nam Idol 2010. Năm 2011, cô nổi lên như 1 hiện tượng với hàng loạt những ca khúc Pop Ballad mang giai điệu trữ tình, lời ca đi sâu vào lòng người như: Vẫn, Có khi nào rời xa, Kí ức ngủ quên, v..v.."]
            ]);
        }
    }
        class StatusSeeder extends Seeder
{
    public function run()
    {
        DB::table('status')->insert([
            ['status_id'=>0,'status_name'=>'hoạt động'],
            ['status_id'=>1,'status_name'=>'không hoạt động']
        ]);
    }
}
class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            ['id'=>'admin','name'=>'Admin','email'=>'sunmusic.tttn@gmail.com','password'=>bcrypt('huong'),'jurisdiction_id'=>0,'status_id'=>0]
        ]);
    }
}


