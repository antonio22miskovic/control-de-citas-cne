<?php

namespace App\Http\Controllers;

use App\Solicitud;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function estadisticas(){

    	$year = Solicitud::whereYear('fecha',2021)->count();
    	$enero = Solicitud::whereMonth('fecha',1)->whereYear('fecha',2021)->count();
    	$febrero = Solicitud::whereMonth('fecha',2)->whereYear('fecha',2021)->count();
    	$marzo = Solicitud::whereMonth('fecha',3)->whereYear('fecha',2021)->count();
    	$abril = Solicitud::whereMonth('fecha',4)->whereYear('fecha',2021)->count();
    	$mayo = Solicitud::whereMonth('fecha',5)->whereYear('fecha',2021)->count();
    	$junio = Solicitud::whereMonth('fecha',6)->whereYear('fecha',2021)->count();
    	$julio = Solicitud::whereMonth('fecha',7)->whereYear('fecha',2021)->count();
    	$agosto = Solicitud::whereMonth('fecha',8)->whereYear('fecha',2021)->count();
    	$septiembre = Solicitud::whereMonth('fecha',9)->whereYear('fecha',2021)->count();
    	$octubre = Solicitud::whereMonth('fecha',10)->whereYear('fecha',2021)->count();
    	$noviembre = Solicitud::whereMonth('fecha',11)->whereYear('fecha',2021)->count();
    	$diciembre = Solicitud::whereMonth('fecha',12)->whereYear('fecha',2021)->count();



    	$atendidoyear = Solicitud::where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidoenero = Solicitud::whereMonth('fecha',1)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidofebrero = Solicitud::whereMonth('fecha',2)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidomarzo = Solicitud::whereMonth('fecha',3)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidoabril = Solicitud::whereMonth('fecha',4)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidomayo = Solicitud::whereMonth('fecha',5)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidojunio = Solicitud::whereMonth('fecha',6)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidojulio = Solicitud::whereMonth('fecha',7)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidoagosto = Solicitud::whereMonth('fecha',8)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidoseptiembre = Solicitud::whereMonth('fecha',9)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidooctubre = Solicitud::whereMonth('fecha',10)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidonoviembre = Solicitud::whereMonth('fecha',11)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$atendidodiciembre = Solicitud::whereMonth('fecha',12)->where('status','atendido')->whereYear('fecha',2021)->count();



    	$pendienteyear = Solicitud::where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendienteenero = Solicitud::whereMonth('fecha',1)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientefebrero = Solicitud::whereMonth('fecha',2)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientemarzo = Solicitud::whereMonth('fecha',3)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendienteabril = Solicitud::whereMonth('fecha',4)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientemayo = Solicitud::whereMonth('fecha',5)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientejunio = Solicitud::whereMonth('fecha',6)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientejulio = Solicitud::whereMonth('fecha',7)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendienteagosto = Solicitud::whereMonth('fecha',8)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendienteseptiembre = Solicitud::whereMonth('fecha',9)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendienteoctubre = Solicitud::whereMonth('fecha',10)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientenoviembre = Solicitud::whereMonth('fecha',11)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$pendientediciembre = Solicitud::whereMonth('fecha',12)->where('status','pendiente')->whereYear('fecha',2021)->count();



    return [
    		'total' => [
    			'year' => $year,
    			'enero' => $enero,
    			'febrero'=> $febrero,
    			'marzo' => $marzo,
    			'abril' => $abril,
    			'mayo' => $mayo,
    			'junio' => $junio,
    			'julio'  => $julio,
    			'agosto' => $agosto,
    			'septiembre' =>$septiembre,
    			'octubre' => $octubre,
    			'noviembre' => $noviembre,
    			'diciembre' => $diciembre,
    			],
    		'atendidos' => [

    			'atendidoyear' => $atendidoyear,
    			'atendidoenero' => $atendidoenero,
    			'atendidofebrero'=> $atendidofebrero,
    			'atendidomarzo' => $atendidomarzo,
    			'atendidoabril' => $atendidoabril,
    			'atendidomayo' => $atendidomayo,
    			'atendidojunio' => $atendidojunio,
    			'atendidojulio'  => $atendidojulio,
    			'atendidoagosto' => $atendidoagosto,
    			'atendidoseptiembre' =>$atendidoseptiembre,
    			'atendidooctubre' => $atendidooctubre,
    			'atendidonoviembre' => $atendidonoviembre,
    			'atendidodiciembre' => $atendidodiciembre,

    			],
    		'pendientes' => [
    			'pendienteyear'	=> $pendienteyear,
    			'pendienteenero' => $pendienteenero,
    			'pendientefebrero'=> $pendientefebrero,
    			'pendientemarzo' => $pendientemarzo,
    			'pendienteabril' => $pendienteabril,
    			'pendientemayo' => $pendientemayo,
    			'pendientejunio' => $pendientejunio,
    			'pendientejulio'  => $pendientejulio,
    			'pendienteagosto' => $pendienteagosto,
    			'pendienteseptiembre' =>$pendienteseptiembre,
    			'pendienteoctubre' => $pendienteoctubre,
    			'pendientenoviembre' => $pendientenoviembre,
    			'pendientediciembre' => $pendientediciembre,

    			]

    		];

    }

    public function listadousuarios(){

    $listado = User::where('rol_id',2)->get();

    	$listado->toJson();

    	return $listado;
    }

    public function estadisticauser($id){

    	$useryear = Solicitud::whereYear('fecha',2021)->where('user_id',$id)->count();
    	$userenero = Solicitud::whereMonth('fecha',1)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userfebrero = Solicitud::whereMonth('fecha',2)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$usermarzo = Solicitud::whereMonth('fecha',3)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userabril = Solicitud::whereMonth('fecha',4)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$usermayo = Solicitud::whereMonth('fecha',5)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userjunio = Solicitud::whereMonth('fecha',6)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userjulio = Solicitud::whereMonth('fecha',7)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$useragosto = Solicitud::whereMonth('fecha',8)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userseptiembre = Solicitud::whereMonth('fecha',9)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$useroctubre = Solicitud::whereMonth('fecha',10)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$usernoviembre = Solicitud::whereMonth('fecha',11)->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userdiciembre = Solicitud::whereMonth('fecha',12)->where('user_id',$id)->whereYear('fecha',2021)->count();



    	$useratendidoyear = Solicitud::where('status','atendido')->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$useratendidoenero = Solicitud::whereMonth('fecha',1)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidofebrero = Solicitud::whereMonth('fecha',2)->where('status','atendido')->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$useratendidomarzo = Solicitud::whereMonth('fecha',3)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidoabril = Solicitud::whereMonth('fecha',4)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidomayo = Solicitud::whereMonth('fecha',5)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidojunio = Solicitud::whereMonth('fecha',6)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidojulio = Solicitud::whereMonth('fecha',7)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidoagosto = Solicitud::whereMonth('fecha',8)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidoseptiembre = Solicitud::whereMonth('fecha',9)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidooctubre = Solicitud::whereMonth('fecha',10)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidonoviembre = Solicitud::whereMonth('fecha',11)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();
    	$useratendidodiciembre = Solicitud::whereMonth('fecha',12)->where('user_id',$id)->where('status','atendido')->whereYear('fecha',2021)->count();


    	$userpendienteyear = Solicitud::where('status','pendiente')->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userpendienteenero = Solicitud::whereMonth('fecha',1)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientefebrero = Solicitud::whereMonth('fecha',2)->where('status','pendiente')->where('user_id',$id)->whereYear('fecha',2021)->count();
    	$userpendientemarzo = Solicitud::whereMonth('fecha',3)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendienteabril = Solicitud::whereMonth('fecha',4)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientemayo = Solicitud::whereMonth('fecha',5)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientejunio = Solicitud::whereMonth('fecha',6)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientejulio = Solicitud::whereMonth('fecha',7)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendienteagosto = Solicitud::whereMonth('fecha',8)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendienteseptiembre = Solicitud::whereMonth('fecha',9)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendienteoctubre = Solicitud::whereMonth('fecha',10)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientenoviembre = Solicitud::whereMonth('fecha',11)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();
    	$userpendientediciembre = Solicitud::whereMonth('fecha',12)->where('user_id',$id)->where('status','pendiente')->whereYear('fecha',2021)->count();

    	  return [
    		'usertotal' => [

    			'useryear' => $useryear,
    			'userenero' => $userenero,
    			'userfebrero'=> $userfebrero,
    			'usermarzo' => $usermarzo,
    			'userabril' => $userabril,
    			'usermayo' => $usermayo,
    			'userjunio' => $userjunio,
    			'userjulio'  => $userjulio,
    			'useragosto' => $useragosto,
    			'userseptiembre' =>$userseptiembre,
    			'useroctubre' => $useroctubre,
    			'usernoviembre' => $usernoviembre,
    			'userdiciembre' => $userdiciembre,
    			],

    		'useratendidos' => [

    			'useratendidoyear' => $useratendidoyear,
    			'useratendidoenero' => $useratendidoenero,
    			'useratendidofebrero'=> $useratendidofebrero,
    			'useratendidomarzo' => $useratendidomarzo,
    			'useratendidoabril' => $useratendidoabril,
    			'useratendidomayo' => $useratendidomayo,
    			'useratendidojunio' => $useratendidojunio,
    			'useratendidojulio'  => $useratendidojulio,
    			'useratendidoagosto' => $useratendidoagosto,
    			'useratendidoseptiembre' =>$useratendidoseptiembre,
    			'useratendidooctubre' => $useratendidooctubre,
    			'useratendidonoviembre' => $useratendidonoviembre,
    			'useratendidodiciembre' => $useratendidodiciembre,

    			],
    		'userpendientes' => [
    			'userpendienteyear'	=> $userpendienteyear,
    			'userpendienteenero' => $userpendienteenero,
    			'userpendientefebrero'=> $userpendientefebrero,
    			'userpendientemarzo' => $userpendientemarzo,
    			'userpendienteabril' => $userpendienteabril,
    			'userpendientemayo' => $userpendientemayo,
    			'userpendientejunio' => $userpendientejunio,
    			'userpendientejulio'  => $userpendientejulio,
    			'userpendienteagosto' => $userpendienteagosto,
    			'userpendienteseptiembre' =>$userpendienteseptiembre,
    			'userpendienteoctubre' => $userpendienteoctubre,
    			'userpendientenoviembre' => $userpendientenoviembre,
    			'userpendientediciembre' => $userpendientediciembre,

    			]

    		];

    }

}
