<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('positions')->delete();
        
        \DB::table('positions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Slideshow',
                'slug' => 'slideshow',
                'created_at' => '2018-01-02 11:45:20',
                'updated_at' => '2018-01-02 11:45:20',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Contato',
                'slug' => 'contato',
                'created_at' => '2018-01-02 11:45:31',
                'updated_at' => '2018-01-02 11:45:31',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cliente',
                'slug' => 'cliente',
                'created_at' => '2018-01-02 11:45:37',
                'updated_at' => '2018-01-02 11:45:37',
            ),
        ));
        
        
    }
}