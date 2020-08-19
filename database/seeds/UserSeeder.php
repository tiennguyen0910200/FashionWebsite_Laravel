<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'name'=>"user",
           'email'=>"nguyenthitien226@gmail.com",
           'password'=>Hash::make("123")
       ]);
       DB::table('users')->insert([
           'name'=>"admin",
           'email'=>"nguyenthitien0910@gmail.com",
           'password'=>Hash::make("admin")
       ]);
    }
}
