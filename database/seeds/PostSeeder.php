<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str; // Serve per importare l'Helper usato per lo slug
use Illuminate\Support\Arr; // Serve per importare l'Helper per gli array

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //prendo gli id delle categorie per metterle nel DB_DATABASE, uso la funzione pluck che restituisce un array associativo e poi uso toArryay per restituire un array secco di numeri
        $category_ids = Category::pluck('id')->toArray();

        for ($i=0; $i < 20; $i++) { 
            $post = new Post();
            //Uso l'helpers per gli array e randomizzando assegno ad ogni categoria un numero
            $post->category_id = Arr::random($category_ids);
            $post->title =$faker->text(20);
            $post->content =$faker->paragraph(2, false); // Crea due paragrafi, mettendo false mi da due paragrafi, con True invece restituisce un array
            $post->image =$faker->imageUrl(250, 250);
            $post->slug=Str::slug($post->title, '-');
            $post->save();
        }
    }
}
