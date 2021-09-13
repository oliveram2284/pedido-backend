<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Empresa;
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
        Empresa::factory(20)->create()->each(function($e){
            echo "==> Empresa creada: ".($e->id);
        });
    }
}
