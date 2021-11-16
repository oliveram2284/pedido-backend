<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
use App\Models\Rubro;
use App\Models\User;
class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/empresas');
        Storage::makeDirectory('public/empresas');
        //exit;*/

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Empresa::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $empresa = new Empresa();
        $empresa->nombre = 'indev';
        $empresa->imagen = null;
        $empresa->estado = 1;
        $empresa->rubro_id = Rubro::find(1)->id;
        $empresa->save();


        Empresa::factory(20)->create()->each(function($e){
            /*echo "==> Empresa creada: ".($e->id);
            //$e->usuarios()->detach();

            $usuario = [
                'name'              => 'empresa'.$e->id,
                'email'             => 'empresa'.$e->id.'@email.com',
                'email_verified_at' => now(),
                'password'          => Hash::make('12345678'), // password
                //'rol_id'           => 0,
                'empresa_id'        => $e->id,
                'remember_token'    => Str::random(10),
            ];

            User::create($usuario);*/


        });
    }
}
