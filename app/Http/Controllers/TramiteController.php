<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\Tramite;
use Illuminate\Http\Request;

class TramiteController extends Controller
{

    public function index()
    {

        return Tramite::all();

    }

    public function store(Request $request)
    {
        Tramite::create([

            'tramite' => $request['tramite'],

        ]);

        return response()->json(['mensaje'=>'tramite creatdo con exito'],201);

    }

    public function show(Request $request,$id)
    {

     $tramite = Tramite::find($id);

        if (is_null($tramite)) {

            return response()->json(['mensaje' => 'tramite no encontrado'],404);

        }

             $solicitudes = Solicitud::orderBy('id', 'desc')->where('tramite_id', $tramite->id)->paginate(5);

         return [

            'paginate' => [

                'total' => $solicitudes->total(),
                'current_page' => $solicitudes->currentPage(),
                'per_page' => $solicitudes->perPage(),
                'last_page' => $solicitudes->lastPage(),
                'from' => $solicitudes->firstItem(),
                'to' => $solicitudes->lastPage(),

            ],

           'solicitudes' => $solicitudes,
           'tramite' => $tramite_id

        ];

    }

    public function update(Request $request, $id)
    {
       $tramite = Tramite::find($id);

        if (is_null($tramite)) {

            return response()->json(['mensaje' => 'tramite no encontrado'],404);

        }

        $tramite->update($request->all());

        return response()->json(['mensaje'=> 'tramite realizado con exito'],201);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tramite =  Tramite::find($id);

        if (is_null($tramite)) {

            return response()->json(['mensaje' => 'tramite no encontrado'],404);

        }

        $tramite->delete();

        return response()->json(['mensaje'=> 'se ah eliminado el tramite con exito']);

    }
}
