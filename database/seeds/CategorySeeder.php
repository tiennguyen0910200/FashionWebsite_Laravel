<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array('Men Fashion','Women Fashion');
        for($i = 0 ;$i<count($category);$i++){
        DB::table('categories')->insert([
            'name' =>$category[$i],
        ]);
        }
    }
}
