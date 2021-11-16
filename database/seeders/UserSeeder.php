<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Roles;
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
                'email'             => 'admin@indev.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                //'rol_id'            => 1,
                'empresa_id'        => 1,
                'remember_token'    => Str::random(10),
            ],
            [
                'name'              => 'usuario',
                'email'             => 'usuario@indev.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                //'rol_id'            => 2,
                //'empresa_id'        => 1,
                'remember_token'    => Str::random(10),
            ]
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $rolAdmin = Roles::find(1);
        foreach ( $usuarios as $usuario ) {

            $aEmpresa = Empresa::findOrFail(1);

            $user = new User;
            $user->name              = $usuario['name'];
            $user->email             = $usuario['email'];
            $user->email_verified_at = $usuario['email_verified_at'];
            $user->password          = $usuario['password'];
            $user->remember_token    = $usuario['remember_token'];
            $user->rol_id            = $rolAdmin->id;
            $user->empresa_id        = $aEmpresa->id;

            $user->save();
        }

        $empresas = Empresa::all();
        foreach ($empresas as $empresa) {

            if ($empresa->id === 1){
                continue;
            }

            $user = new User;
            $user->name              = 'empresa'.$empresa->id;
            $user->email             = 'empresa'.$empresa->id.'@email.com';
            $user->email_verified_at = now();
            $user->password          = Hash::make('12345678');
            $user->remember_token    = Str::random(10);
            $user->rol_id            = 2;
            $user->empresa_id        = $empresa->id;
            $user->save();

        }
    }
}
