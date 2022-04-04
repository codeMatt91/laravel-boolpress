<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('id'); // Qui ho creato la colonna dicendo che può essere NUll e metterla dopo l'id

            // Qui creo la relazione tra le chiavi. Con onDelete mi proteggo in caso eliminassi la categoria mi elimina anche tutti i post con quella categoria. Mettendo questo faccio si che non vengano eliminati i post
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');  

            //POSSO USARE ANCHE QUESTA SINTASSI
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // Qui creo la down per eliminare il vincolo con la tabella e poi elimino la tabella stessa
            $table->dropForeign('posts_category_id_foreign');
            $table->dropColumn(['category_id']);
        });
    }
}
