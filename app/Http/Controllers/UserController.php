<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        //obtenemos los datos del usuario logeado
        $user = Auth::user();

           //significa que solo pude registrar a los encargados
        if ($user->rol_id === 1) {
                // si el admin registra al encargado sin foto
                $rol = 2;
        }else{

            $rol = 3;

        }


         $user = User::orderBy('id', 'desc')->where('rol_id',$rol)->paginate(5);

        return [

            'paginate' => [

                'total' => $user->total(),
                'current_page' => $user->currentPage(),
                'per_page' => $user->perPage(),
                'last_page' => $user->lastPage(),
                'from' => $user->firstItem(),
                'to' => $user->lastPage(),

            ],
           'user' => $user
        ];
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
                // si el admin registra al encargado sin foto
                if ($request['avatar'] === null) {
                        // se asigna una foto por defecto
                        $avatar = 'defect.jpg';

                }

                $avatar = $request['avatar'];

                $rol = 2;

        }else{

             //si no es el admin es un usuario encargado registrando a un usuario por una cita
            $avatar = null;
            $rol = 3;

        }

        User::create([

        'name' => $request['name'] ,
        'apellido' => $request['apellido'] ,
        'usuario' => $request['usuario'] ,
        'ci' => $request['ci'] ,
        'avatar' => $avatar,
        'email' => $request['email'] ,
        'password' => bcrypt($request['password']),
        'rol_id' => $rol,

        ]);

        return response()->json(['mensaje' => 'se ah registrado con exito'],201);

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

        $user->update($request->all());
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
