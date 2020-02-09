<?php

namespace App\Http\Controllers;

use App\Solicitud;
use Illuminate\Http\Request;

class AdminController extends Controller
{
  	public function vista(){

  		return view('admin');

  	}

  	public function filtroporusuario($id){

  		   $solicitud = Solicitud::orderBy('id', 'desc')->where('user_id',$id)->paginate(5);

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

    public function registro(Request $request){

        return $request->all();

    }
}
