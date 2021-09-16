<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class ComerciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas  = \App\Models\Empresa::with('rubro')->get();

        /*foreach ($empresas as $empresa) {
            $empresa['image_url']    = url('storage/empresas/'.$empresa->imagen);
            $empresa['public_url']   = asset('empresas/'.$empresa->imagen);
            $empresa['public_path']  = public_path('empresas/'.$empresa->imagen);
            $empresa['storage_path'] = storage_path('empresas/'.$empresa->imagen);
            $empresa['url']          = env('APP_URL', false).Storage::url('empresas/'.$empresa->imagen);
            //$empresa['temp']         = Storage::get('storage\empresas\\'.$empresa->imagen);
        }*/

        return $empresas->toJson(); /*response()->json([
            'comercios'    => $empresas,
            'asset' => url('images/empresas'),
        ]);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            //'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
            'nombre'   => 'required',
            'rubro_id' => 'required',
        ]);

        $empresa = new \App\Models\Empresa;
        $empresa->nombre   = $request->input('nombre');
        $empresa->rubro_id = $request->input('rubro_id');
        $empresa->estado   = $request->input('estado');
        $empresa->save();
        return response()->json([
            'status' => 200,
            'result' => $empresa
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $empresa = \App\Models\Empresa::find($id);
        return response()->json($empresa);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $empresa = \App\Models\Empresa::find($id);
        $empresa->nombre = $request->input('nombre');
        $empresa->rubro_id = $request->input('rubro_id');
        $empresa->estado = $request->input('estado');
        $empresa->save();
        return response()->json([
            'status' => 200,
            'result' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /**
     * enableStatus
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function enableStatus (Request $request, $id)
    {
        $empresa = \App\Models\Empresa::find($id);
        $empresa->estado = 1;
        $empresa->save();
        return response()->json([
            'status' => 200,
            'result' => true
        ]);
    }
    /**
     * enableStatus
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function disableStatus (Request $request, $id)
    {
        $empresa = \App\Models\Empresa::find($id);
        $empresa->estado = 0;
        $empresa->save();
        return response()->json([
            'status' => 200,
            'result' => true
        ]);
    }
}
