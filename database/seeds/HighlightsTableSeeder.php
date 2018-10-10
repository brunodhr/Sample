<?php

use Illuminate\Database\Seeder;

class HighlightsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('highlights')->delete();
        
        \DB::table('highlights')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Destaque 1',
                'model' => 'page',
                'foreign_key' => 1,
                'title' => 'Dicas de Viagens',
                'summary' => 'Resumo',
                'link' => 'dicas-de-viagens',
                'image' => 'highlights/January2018/Mk6uRQY0q7d4D5HoFnZS.jpg',
                'created_at' => '2018-01-02 11:45:52',
                'updated_at' => '2018-01-03 11:10:02',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Destaque 2',
                'model' => 'link',
                'foreign_key' => NULL,
                'title' => 'Conheça nossos Serviços',
                'summary' => 'Conheça nossos Serviços',
                'link' => 'servicos',
                'image' => 'highlights/January2018/gyf4GOSAFc5MtQqmFOYt.jpg',
                'created_at' => '2018-01-02 11:46:00',
                'updated_at' => '2018-01-03 11:10:10',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Destaque 3',
                'model' => 'link',
                'foreign_key' => NULL,
                'title' => 'Faça seu Orçamento',
                'summary' => 'Faca seu Orcamento',
                'link' => 'orcamento',
                'image' => 'highlights/January2018/Cbj7hRWLgqcLb9ZIPSQe.jpg',
                'created_at' => '2018-01-02 11:46:11',
                'updated_at' => '2018-01-03 11:11:42',
            ),
        ));
        
        
    }
}