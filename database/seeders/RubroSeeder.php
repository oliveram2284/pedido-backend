<?php

namespace Database\Seeders;

use App\Models\Rubro;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nombres = [
            'Alimentación y Gastrononmía',
            'Bares / Cervecerías artesanales',
            'Casas de comidas',
            'Rotiserías',
            'Cafeterías',
            'Pizzerías',
            'Casas de empanadas',
            'Productos Alimenticios',
            'Panadería',
            'Almacenes',
            'Fiambrerías',
            'Verdulerías y Fruterías',
            'Carnicerías',
            'Granjas o Pollerías',
            'Kioskos',
            'Otros'
        ];
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Rubro::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ( $nombres as $nombre ) {

            Rubro::create([
                'nombre' => $nombre,
                'descripcion' => "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet",
            ]);

        }

        //Rubro::factory()->create();
    }
}
