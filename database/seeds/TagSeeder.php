<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ['label' => 'Natural', 'color'=> 'green'],
            ['label' => 'Astrophisical', 'color'=> 'red'],
            ['label' => 'Japanese', 'color'=> 'purple'],
            ['label' => 'Italian', 'color'=> 'pink'],
            ['label' => 'American', 'color'=> 'black'],
            ['label' => 'French', 'color'=> 'orange'],
        ];

        foreach ($tags as $tag) {
            $t = new Tag();
            $t->label = $tag['label'];
            $t->color = $tag['color'];
            $t->save();
        }
    }
}
