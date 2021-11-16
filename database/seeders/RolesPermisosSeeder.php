<?php

namespace Database\Seeders;

use App\Models\Permisos;
use App\Models\Roles;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles    = Roles::all();
        foreach ($roles as $rol) {
            $rol->permisos()->detach();
            if ($rol['nombre'] === 'Administrador') {
                $permisos = Permisos::where('estado',1)->get();
                $rol->permisos()->attach($permisos);
            } else if ($rol['nombre'] === 'Empresa') {
                $permisos = Permisos::where('estado',1)
                ->where('ability','not like','%roles%')
                ->where('ability','not like','%permisos%')
                ->where('ability','not like','%clientes%')
                ->where('ability','not like','%pedidos%')
                ->get();
                $rol->permisos()->attach($permisos);
            } else if ($rol['nombre'] === 'Cliente') {
                $permisos = Permisos::where('estado',1)
                ->where('ability','like','%pedidos%')
                ->get();
                $rol->permisos()->attach($permisos);
            }
        }
    }
}
