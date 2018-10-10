<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 21,
                'position_id' => 2,
                'name' => 'Entre em contato conosco',
                'image' => 'posicoes/contato/anonovo.jpg',
                'description' => NULL,
                'link' => 'contato',
                'label_link' => 'Ir para contato',
                'target' => '_self',
                'created_at' => '2018-01-02 18:27:52',
                'updated_at' => '2018-01-02 18:29:19',
            ),
            1 => 
            array (
                'id' => 22,
                'position_id' => 1,
                'name' => NULL,
                'image' => 'posicoes/slideshow/banner01.jpg',
                'description' => NULL,
                'link' => NULL,
                'label_link' => NULL,
                'target' => '_self',
                'created_at' => '2018-01-03 08:51:33',
                'updated_at' => '2018-01-03 08:51:33',
            ),
            2 => 
            array (
                'id' => 23,
                'position_id' => 1,
                'name' => NULL,
                'image' => 'posicoes/slideshow/banner02.jpg',
                'description' => NULL,
                'link' => NULL,
                'label_link' => NULL,
                'target' => '_self',
                'created_at' => '2018-01-03 08:51:33',
                'updated_at' => '2018-01-03 08:51:33',
            ),
            3 => 
            array (
                'id' => 24,
                'position_id' => 1,
                'name' => NULL,
                'image' => 'posicoes/slideshow/banner03.jpg',
                'description' => NULL,
                'link' => NULL,
                'label_link' => NULL,
                'target' => '_self',
                'created_at' => '2018-01-03 08:51:33',
                'updated_at' => '2018-01-03 08:51:33',
            ),
            4 => 
            array (
                'id' => 25,
                'position_id' => 1,
                'name' => NULL,
                'image' => 'posicoes/slideshow/banner04.jpg',
                'description' => NULL,
                'link' => NULL,
                'label_link' => NULL,
                'target' => '_self',
                'created_at' => '2018-01-03 08:51:33',
                'updated_at' => '2018-01-03 08:51:33',
            ),
            5 => 
            array (
                'id' => 26,
                'position_id' => 1,
                'name' => NULL,
                'image' => 'posicoes/slideshow/banner05.jpg',
                'description' => NULL,
                'link' => NULL,
                'label_link' => NULL,
                'target' => '_self',
                'created_at' => '2018-01-03 08:51:33',
                'updated_at' => '2018-01-03 08:51:33',
            ),
        ));
        
        
    }
}