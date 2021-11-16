<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles_base = [
            'Administrador',
            'Empresa',
            'Cliente',
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Roles::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($roles_base as $role) {
            Roles::create([
                'nombre'      => $role,
                'descripcion' => '',
                'estado'      => 1
            ]);
        }
    }
}
