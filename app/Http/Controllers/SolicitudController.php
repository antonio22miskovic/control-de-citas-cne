<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
}
