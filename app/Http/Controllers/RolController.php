<?php

namespace App\Http\Controllers;

use App\Rol;
use App\User;
use Illuminate\Http\Request;

class RolController extends Controller
{

    public function index()
    {

         $rol = Rol::orderBy('id', 'desc')->where('id' ,  '!=' , 1)->paginate(5);

        return [

            'paginate' => [

                'total' => $rol->total(),
                'current_page' => $rol->currentPage(),
                'per_page' => $rol->perPage(),
                'last_page' => $rol->lastPage(),
                'from' => $rol->firstItem(),
                'to' => $rol->lastPage(),

            ],

           'rol' => $rol

        ];
    }


    public function store(Request $request)
    {
        Rol::create([

            'rol' => $request['rol'],

        ]);

        return response()->json(['mensaje' => 'rol creqdo con exito'],201);

    }


    public function show($id)
    {
        $rol = Rol::find($id);

        if (is_null($rol)) {

            return response()->json(['mensaje'=>'rol no encontrado'],404);

        }

        if ($rol->id === 1) {
           return response()->json(['mensaje'=>'acceso denegado']);
        }

        $usuarios = User::orderBy('id', 'desc')->where('rol_id',$rol->id)->paginate(5);

              return [

            'paginate' => [

                'total' => $usuarios->total(),
                'current_page' => $usuarios->currentPage(),
                'per_page' => $usuarios->perPage(),
                'last_page' => $usuarios->lastPage(),
                'from' => $usuarios->firstItem(),
                'to' => $usuarios->lastPage(),

            ],

           'usuarios' => $usuarios

        ];
    }


    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);

        if (is_null($rol)) {

            return response()->json(['mensaje'=>'rol no encontrado'],404);

        }

        $rol->update($request->all());

        return response()->json(['mensaje'=>' rol actualizado con exito '], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $rol = Rol::find($id);

        if (is_null($rol)) {

            return response()->json(['mensaje'=>'rol no encontrado'],404);

        }

            $rol->delete();

         return response()->json(['mensaje'=>' eliminado con exito '], 200);

    }
}
