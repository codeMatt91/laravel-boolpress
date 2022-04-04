<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Qui sto creando l'istanza di un nuovo utente registrato cosi che quando refresho la pagina devo ripetere la registrazione
        $user = new User();
        $user->name = 'Matteo';
        $user->email = 'matteo@gmail.it';
        $user->password = bcrypt('password');

        $user->save();

    }
}
