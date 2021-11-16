<?php

namespace Database\Seeders;

use App\Models\Permisos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $permisos_base = [
            'usuarios' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'roles' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'permisos' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'empresas' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'productos' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'pedidos' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
            'clientes' => [
                'view',
                'create',
                'edit',
                'delete',
            ],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Permisos::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        foreach ($permisos_base as $key => $permiso) {
            foreach ($permiso as $action) {
                //dump($action);
                Permisos::create([
                    'nombre'      => $key." ".$action,
                    'ability'     => $key.':'.$action,
                    'descripcion' => '',
                    'estado'      => 1
                ]);
            }
        }
    }
}
