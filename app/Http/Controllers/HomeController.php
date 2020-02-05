<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function buscar($ci){

        $user  = User::where('ci',$ci)->where('rol_id',3)->first();

        if (is_null($user)) {

           return response()->json(1);
        }

        return $user;
    }

    public function id($ci){

        $id = User::where('ci',$ci)->first();

        return $id;
    }

    public function notificacion(){

      return  Notificacion::all();

    }


    public function perfil()
    {
        $auth = Auth::user();

        return $auth ;
    }

}
