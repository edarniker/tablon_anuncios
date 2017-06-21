<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paginador
 *
 * @author Edward
 */

namespace Libs;
class Paginador {

    //put your code here
    private $datos;
    private $paginacion;

    public function __construct() {
        $this->datos = array();
        $this->paginacion = array();
    }

    public function paginar($registros, $pagina = false, $limite = false) {
        $adjacents=2;
        $paginacion = array();
        $paginacion['ajD']=0;
        $paginacion['ajI']=0;
        
        
        if ($limite && is_numeric($limite)) {
            $limite = $limite;
        } else {
            $limite= 3;
        }
       
        if ($pagina && is_numeric($pagina)) {
            $pagina = $pagina;          
            $inicio = ($pagina - 1) * $limite;
        } else {
            $pagina = 1;
            $inicio = 0;
        }
       
        
      
        
        $total = ceil($registros/ $limite);
//        $this->datos = array_slice($qwery, $inicio, $limite);
     
     
       
        $paginacion['actual'] =(int) $pagina;
//        $paginacion['total'] = $total;
        if ($pagina > 1) {
            $paginacion['primero'] = 1;
            $paginacion['anterior'] = $pagina - 1;
        } else {
            $paginacion['primero'] = '';
            $paginacion['anterior'] = '';
        }

        if ($pagina < $total) {
            $paginacion['ultimo'] = $total;
            $paginacion['siguiente'] = $pagina + 1;
        } else {
            $paginacion['ultimo'] = '';
            $paginacion['siguiente'] = '';
        }
        $paginacion['pmin'] = ($pagina>$adjacents) ? ($pagina-$adjacents) : 1;     
	$paginacion['pmax'] = ($pagina<($total-$adjacents)) ? ($pagina+$adjacents) : $total;
       
        
          $paginacion['avD']= intval(($total-$pagina)/2)+$pagina;
           $paginacion['avI']=intval(($pagina)/2);
//        if($pagina>$total/2){
//            $paginacion['avD']=intval($total/4*3)+1;
//        }elseif ($pagina<$total/2) {
//            $paginacion['avD']=intval($total/4*3)-1;
//        }
////        $paginacion['avD']=($pagina>$total/2)?(intval($total/4*3))+1:
////        $paginacion['avI']=($pagina>$total/2) ? ;
//        $paginacion['avD']= intval($total/2+$paginacion['avI'])+1;
        
        if($pagina>($adjacents+1)) {
           
//		$out.= "<li><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	}
	// interval
	if($pagina>($adjacents+2)) {           
            $paginacion['ajI']=$pagina-$adjacents-1;
            
	}
        if($pagina<($total-$adjacents-1)) {
            $paginacion['ajD']=$pagina+$adjacents+1;
          
	}

      
        
	// last

	if($pagina<($total-$adjacents)) {
//		$out.= "<li><a href='javascript:void(0);' onclick='load($tpages)'>$tpages</a></li>";
	}
        
        
       
        $this->paginacion = $paginacion;
        
//        $this->getRangoPagination($limite,$total);
        $this->datos['inicio']=$inicio;
        $this->datos['limite']=$limite;
        $this->datos['paginacion']= $this->paginacion;
//        $this->datos['inicio']=getRangoPagination($limite);
        
        
        return $this->datos;
    }

//    private function getRangoPagination($limite,$total) {
//      
//        $totalPaginas =$total;
//        $paginaSeleccionada = $this->paginacion['actual'];
//        $rango = ceil($limite / 2);
//       
//        $paginas = array();
//        $rangoDerecho = $totalPaginas - $paginaSeleccionada;
//        if ($rangoDerecho < $rango) {
//            $resto = $rango - $rangoDerecho;
//        } else {
//            $resto = 0;
//        }
//        
//      
//        $rangoIzquierdo = $paginaSeleccionada - ($rango + $resto);        
//        for ($i = $paginaSeleccionada; $i > $rangoIzquierdo; $i--) {
//            if ($i == 0) {               
//                break;
//            }
//           
//            $paginas[] = $i;
//        }
//        
//      
//        
//        sort($paginas);
//         
//        if ($paginaSeleccionada < $rango) {
//            $rangoDerecho = $limite;
//        } else {
//            $rangoDerecho = $paginaSeleccionada + $rango;
//        }
//        
//        
//        for ($i = $paginaSeleccionada + 1; $i <= $rangoDerecho; $i++) {
//            if ($i > $totalPaginas) {
//                
//                break;
//            }
//            $paginas[] = $i;
//        }
//       
////        print_r($paginas);
////        echo $rangoDerecho;
////        echo $rango;
////        echo $resto;
////      
////          echo $rangoIzquierdo;
//        
////        echo $totalPaginas;
//        
//          $this->paginacion['rango'] = $paginas;
//        return $this->paginacion;
//    }
//
//    public function getView($vista,$link=false){
//       
//        $rutaView=ROOT.'Views'.DS.'_paginador'. DS.$vista.'.php';
//        if($link)
//            $link= BASE_URL.$link.'/';
//        
//        if(is_readable($rutaView)){
//            ob_start();
//            include $rutaView;
//            $contenido= ob_get_contents();
//            ob_end_clean();
//             return $contenido;
//        }
//        throw new \Exception('Error en paginacion');
//    }
    
    
//     public function comprobarPagina($registros, $pagina = false, $limite = false){        
//       
//        
//        if ($limite && is_numeric($limite)) {
//            $limite = $limite;
//        } else {
//            $limite= 3;
//        }
//       
//        if ($pagina && is_numeric($pagina)) {
//            $pagina = $pagina;          
//            $inicio = ($pagina - 1) * $limite;
//        } else {
//            $pagina = 1;
//            $inicio = 0;
//        }
//        $total = ceil($registros/ $limite);
//        return $total;
//    }
}