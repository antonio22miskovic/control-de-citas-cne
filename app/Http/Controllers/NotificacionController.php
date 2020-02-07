<?php

namespace App\Http\Controllers;

use App\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $notificacion =  Notificacion::orderBy('id', 'desc')->get();
       $notificacion->toJson();
      return  $notificacion;
    }

    public function store(Request $request)
    {
        Notificacion::create([

        'asunto' => $request['asunto'],
        'descripcion' => $request['descripcion'],
        'estado_id' => $request['estado_id'],

        ]);

        return response()->json(['mensaje'=> 'notificacion creada con exito'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notificacion = Notificacion::find($id);

        if ( is_null($notificacion)) {
              return response()->json(['mensaje'=>'notificacion no encontrada'],404);
        }
            $notificacion->estado;
        return response()->json($notificacion,200);

    }


    public function update(Request $request, $id)
    {
             $notificacion = Notificacion::find($id);

        if (is_null($notificacion)) {

              return response()->json(['mensaje'=>'notificacion no encontrada'],404);

        }

        $notificacion->update($request->all());

        return response()->json(['mensaje'=>'se ah actualizado con exito'],200);
    }


    public function destroy($id)
    {

         $notificacion = Notificacion::find($id);

        if (is_null($notificacion)) {

              return response()->json(['mensaje'=>'notificacion no encontrada'],404);

        }

        $notificacion->delete();

        return response()->json(['mensaje'=> 'notoficacion eliminada con exito'],200);
    }
}
