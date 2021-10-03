<?php

namespace App\Http\Controllers;

use App\Directorio;
use App\Http\Requests\CreateDirectorioRequest;
use App\Http\Requests\UpdateDirectorioRequest;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //Get listar registro
    public function index(Request $request)
    {
        // dd($request->all());

        if ($request->has('txtBuscar')) {
            $directorios = Directorio::where('nombre','like','%'.$request->txtBuscar.'%')
            ->orWhere('telefono', 'like','%'.$request->txtBuscar.'%')
            ->get();
        }else{
            $directorios = Directorio::all();
        }
        return $directorios;
    }

    // Post insertar datos
    public function store(CreateDirectorioRequest $request)
    {
        $input = $request->all();
        if($request->has('foto')){
            // $input['foto'] = $this->cargarArchivo($request->foto);
            $input['foto'] = '';
        }

        Directorio::create($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro creado!'
        ], 200);
    }

    //Get retorna un solo registro
    public function show(Directorio $directorio)
    {
        return $directorio;
    }

    //Put actualizar registros
    public function update(UpdateDirectorioRequest $request, Directorio $directorio)
    {
        $input = $request->all();

        if($request->has('foto')){
            // $input['foto'] = $this->cargarArchivo($request->foto);
            $input['foto'] = '';
        }

        $directorio->update($input);

        return response()->json([
            'res'=>true,
            'message'=>'Registro actualizado!'
        ], 200);
    }

    // Delete eliminar registro
    public function destroy($id)
    {
        Directorio::destroy($id);

        return response()->json([
            'res'=>true,
            'message'=>'Registro Eliminado!'
        ], 200);
    }

    public function cargarArchivo($file)
    {
        $nombreArchivo = time(). '.' . $file->getClientOriginalExtension();
        $file->move(public_path('fotografias'), $nombreArchivo);

        return $nombreArchivo;
    }
}
