<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Creo un array associativo
        $categories = [
            ['label' => 'Film', 'color' => 'info'],
            ['label' => 'Anime', 'color' => 'warning'],
            ['label' => 'Actuality', 'color' => 'secondary'],
            ['label' => 'Science', 'color' => 'success'],
            ['label' => 'Food', 'color' => 'danger'],
            ['label' => 'Serie', 'color' => 'dark'],
            ['label' => 'Economy', 'color' => 'primary'],
        ];

        // Ciclo sull'array per riempire i campi della tabella creando un istanza della categoria 
        foreach($categories as $category){
            $c = new Category();
            $c->label = $category['label'];
            $c->color = $category['color'];
            $c->save();
        }

    }
}
