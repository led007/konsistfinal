<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => 'Administrador',
            'email' => 'admin@prosa.com',
            'password' => bcrypt('prosanucleo'),
            'funcao'=> 'admin',
            'foto' => '/assets/images/admin.png',

        ]);
    }
}
