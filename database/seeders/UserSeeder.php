<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $usuarios =[
            [
                'name'              => 'admin',
                'email'             => 'admin@email.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                'role_id'           => 1,
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'usuario',
                'email'             => 'usuario@email.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                'remember_token'    => Str::random(10),
            ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ( $usuarios as $usuario ) {

            User::create($usuario);

        }

        //User::factory()->create();
    }
}
