<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('images/productos');
        Storage::makeDirectory('images/productos');
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\Producto::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\Producto::factory(100)->create();
    }
}
