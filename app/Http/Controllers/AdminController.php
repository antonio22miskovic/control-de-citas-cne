<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
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

      $exploded = explode(',', $request->avatar);
      $decoded =base64_decode($exploded[1]);

      if (str_contains($exploded[0], 'jpeg')) {

          $extension = 'jpg';

      }else{

          $extension = 'png';

      }

        $filename = str_random().'.'.$extension;

        $path = public_path().'/img/'.$filename;

        file_put_contents($path, $decoded);

         User::create([

        'name' => $request['name'],
        'apellido' => $request['apellido'],
        'usuario' => $request['user'],
        'ci' => $request['ci'],
        'avatar' => $filename,
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'rol_id' => 2,

        ]);

        return response()->json('registro exitoso');

    }
}
