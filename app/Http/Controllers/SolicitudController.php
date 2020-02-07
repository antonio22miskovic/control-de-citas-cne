<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

       $solicitud = Solicitud::orderBy('id', 'desc')->where('user_id',$user->rol_id)->paginate(5);

        return [

            'paginate' => [

                'total' => $solicitud->total(),
                'current_page' => $solicitud->currentPage(),
                'per_page' => $solicitud->perPage(),
                'last_page' => $solicitud->lastPage(),
                'from' => $solicitud->firstItem(),
                'to' => $solicitud->lastPage(),

            ],
           'solicitud' => $solicitud
        ];

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        Solicitud::create([

        'fecha' => Carbon::now(),
        'solicitud' => $request['solicitud'],
        'respuesta' => $request['respuesta'],
        'descripcion' => $request['descripcion'],
        'tramite_id' => $request['tramite'],
        'status' => $request['status'],
        'user_id' => $user->id,
        'cliente_id' => $request['cliente'],

        ]);

         return response()->json(['mensaje' => 'solicitud registrada con exito '],201);

    }

    public function show($id)
    {
        $solicitud = Solicitud::find($id);

        if (is_null($solicitud)) {

            return response()->json(['mensaje'=> 'solicitud no encontrada']);

        }
               $cliente =  $solicitud->cliente;
                $clien =  $cliente->user;
                $solicitud->user;
                     $solicitud->tramite;

        return response()->json(['solicitud'=> $solicitud, 'cliente' => $clien],200);

    }



    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);

        $solicitud->delete();

        return response()->json(['mensaje'=> 'solicitud eliminada']);
    }
}
