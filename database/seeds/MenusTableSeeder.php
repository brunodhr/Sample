<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2017-12-20 12:07:06',
                'updated_at' => '2017-12-20 12:07:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Principal',
                'created_at' => '2017-12-20 12:07:06',
                'updated_at' => '2017-12-20 12:07:06',
            ),
        ));
        
        
    }
}