<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++){
            DB::table('users')->insert([
                'nome' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'senha' => Hash::make('senha'),
                'funcao'=> rand(1,0) == 0 ? 'Admin' : 'Membro',
            ]);
        }
        
    }
}
