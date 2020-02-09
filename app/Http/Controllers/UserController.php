<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
      $user =  User::where('rol_id',2)->get();
        $user->toJson();
      return $user;
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
        //obtenemos los datos del usuario logeado
        $user = Auth::user();

        // que pasa si es administrador
        //significa que solo pude registrar a los encargados
        if ($user->rol_id === 1) {

                $avatar = $request['avatar'];
                $usuario = $request['usuario'];
                $rol = 2;

        }else{

             //si no es el admin es un usuario encargado registrando a un usuario por una cita
            $avatar = null;
            $usuario = null;
            $rol = 3;

        }

     $usuario =  User::create([

        'name' => $request['name'] ,
        'apellido' => $request['apellido'] ,
        'usuario' => $usuario ,
        'ci' => $request['ci'] ,
        'avatar' => $avatar,
        'email' => $request['email'] ,
        'password' => bcrypt($request['password']),
        'rol_id' => $rol,

        ]);

     if ($user->rol_id === 1) {

         return response()->json(['mensaje' => 'se ah registrado con exito'],201);

     }

        return response()->json($usuario,201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user)) {

            response()->json(['mensaje'=>'el usuario no se encuentra registrado'],404);

        }

        $user->rol;
        $user->solicitudes;

       return response()->json($user,200);
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
        $user = User::find($id);

        if (is_null($user)) {

            response()->json(['mensaje'=>'el usuario no se encuentra registrado'],404);

        }

        $user->update(

        'name' => $request['name'],
        'apellido' => $request['apellido'],
        'usuario' => $request['user'],
        'ci' => $request['ci'],
        'avatar' => $filename,
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'rol_id' => 2,

        );
         return response()->json(['mensaje'=>'se ah actualizado con exito'],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $user = User::find($id);

        if (is_null($user)) {

            return response()->json(['mensaje'=> 'usuario no existe'],404);
        }

        $user->delete();

        return response()->json(['mensaje'=>'usuario eliminado con exito'],200);
    }
}
