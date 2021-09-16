<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class EmpresaController extends Controller
{

    public function index()
    {
        $empresas = \App\Models\Empresa::all();

        return view('empresa/index', ["empresas"=>$empresas]);
    }
}
