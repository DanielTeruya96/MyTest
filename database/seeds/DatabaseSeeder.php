<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        $this->call(ProvaTableSeeder::class);
    }
}

class UsersTableSeeder extends Seeder{

    public function run()
    {
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'daniel',
            'email' => 'd2@dd.com',
            'password' => 'dd',
            'area' => 'matematica'
        ]);
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Juao',
            'email' => 'di@dd.com',
            'password' => 'dd',
            'area' => 'portugues'
        ]);
        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => 'Jake',
            'email' => 'da@dd.com',
            'password' => 'dd',
            'area' => 'Historia'
        ]);
    }
}

class ProvaTableSeeder extends Seeder{

    public function run(){
        \Illuminate\Support\Facades\DB::table('provas')->insert([
            'titulo' => 'Fim semestre',
            'id_user' => 2
        ]);
        \Illuminate\Support\Facades\DB::table('provas')->insert([
            'titulo' => 'recuperacao',
            'id_user' => 3
        ]);
        \Illuminate\Support\Facades\DB::table('provas')->insert([
            'titulo' => 'semestre',
            'id_user' => 1
        ]);
        \Illuminate\Support\Facades\DB::table('provas')->insert([
            'titulo' => 'alo semestre',
            'id_user' => 2
        ]);
        \Illuminate\Support\Facades\DB::table('provas')->insert([
            'titulo' => 'Fim',
            'id_user' => 4
        ]);
    }
}


