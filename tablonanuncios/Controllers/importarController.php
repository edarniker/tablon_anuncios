<?php

namespace Controllers;

class ImportarController {
    private static $mensaje;

    public static function _importListAlumnos($file, $nivel) {

        self::$mensaje = "guardado";
//obtenemos el archivo .csv
        $tipo = $file ['type'];
//        echo $a=$_FILES['id']['size'];
        $tamanio = $file['size'];
        $archivotmp = $file['tmp_name'];
//cargamos el archivo

        $lineas = file($archivotmp);
        if ($lineas) {
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
            $i = 0;

//Recorremos el bucle para leer línea por línea
            foreach ($lineas as $linea_num => $linea) {
                //abrimos bucle
                /* si es diferente a 0 significa que no se encuentra en la primera línea 
                  (con los títulos de las columnas) y por lo tanto puede leerla */
                if ($i != 0) {
                    //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
                    /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
                      leyendo hasta que encuentre un ; */
                    $datos = explode(";", $linea);
                    //Almacenamos los datos que vamos leyendo en una variable
                    $dni = trim($datos[0]);
                    $nombre = trim($datos[1]);
                    $primerApe = trim($datos[2]);
                    $segundoApe = trim($datos[3]);
                    $mail = trim($datos[4]);
                    $nivel = trim($nivel);
                    $curso = trim($datos[5]);
                    $jornada = trim($datos[6]);
                    if(self::_addAlumnos($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel, $curso, $jornada, $i)){
                      return false;
                    }
                }


              $i++;
                //cerramos bucle
            }
            return self::$mensaje;
        }
    }

    public static function _comprobarImagenes(array $files = null) {

        $cantidad = count($files["tmp_name"]);
        $validar = false;
        for ($i = 0; $i < $cantidad; $i++) {
            $files['type'][$i];
            //Comprobamos si el fichero es una imagen
            if ($files['type'][$i] != 'image/png' && $files['type'][$i] != 'image/jpeg') {
                $validar .= " <p style='color:red'> el archivo " . $files['name'][$i] . " no es del tipo de imagen permitida</p>";
            } else if ($files['size'][$i] > 1024 * 1024) {
                $validar .= $files['name'] . " <p style='color:red'> el archivo " + $file['name'][$i] + " supera el maximo permitido 1MB</p>";
            }
        }
        return $validar;
    }

    public static function _comprobarPdf(array $files = null) {

        $cantidad = count($files["tmp_name"]);
        $validar = false;
        for ($i = 0; $i < $cantidad; $i++) {
            $files['type'][$i];
            //Comprobamos si el fichero es una imagen
            if ($_FILES['pdf']['type'][$i] != 'application/pdf') {
                $validar .= " <p style='color:red'> el archivo " . $files['name'][$i] . " no es del tipo de imagen permitida</p>";
            } else if ($files['size'][$i] > 1024 * 1024) {
                $validar .= $files['name'] . " <p style='color:red'> el archivo " + $file['name'][$i] + " supera el maximo permitido 1MB</p>";
            }
        }
        return $validar;
    }

    public static function _import($id, $url, $files, $tipoFichero, $mail) {

        $cantidad = count($files["tmp_name"]);
        for ($i = 0; $i < $cantidad; $i++) {
            $archivo = explode(".", $files["name"][$i]);
            $name = basename($archivo[0]);
            $name = $name . "-" . uniqid() . "." . $archivo[1];
            //Subimos el fichero al servidor                
            if (move_uploaded_file($files["tmp_name"][$i], $url . $name)) {

                if (!AnunciosController::_guardarFicheros($id, $name, $tipoFichero, $i + 1, $mail)) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }
    
    

    public static function _deleteimport($id,$mail,$files,$tabla) {
        
     
        foreach ($files AS $key=>$url) {            
            //Eliminamos el fichero al servidor                
            if (unlink($url)) {                
                if (!AnunciosController::_deleteFicheros($id, $mail,$tabla,$key)) {
                    return false;
                }
            } else {
                return false;
            }
        }
        return true;
    }
    
    
    
    private static function _addAlumnos($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel, $curso, $jornada, $i) {

      
        if (!UsuariosController::_getExits($dni)) {
            if (!UsuariosController::_agregarUsuario($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel)) {
                self::$mensaje = "error linea " . $i . "alumno " . $dni;
                return false;
            } else {
                if (!AlumnosController::_agregarAlumno($mail, $curso, $jornada)) {
                    UsuariosController::_eliminarUsuario($dni);
                    self::$mensaje = "errro linea" . $i . " curso o jornada no existe ";
                    return false;
                }
            }
        } else {
            self::$mensaje = "existe";
        }
        return true;
    }
    
    public static function _importPublico($id, $url, $files, $tipoFichero) {
     
        $cantidad = count($files["tmp_name"]);
        for ($i = 0; $i < $cantidad; $i++) {
            $archivo = explode(".", $files["name"][$i]);
            $name = basename($archivo[0]);
            $name = $name . "-" . uniqid() . "." . $archivo[1];
            //Subimos el fichero al servidor                
          
                if (AnunciosController::_guardarFicherosPublicos($id, $name, $tipoFichero, $i + 1)) {
                    return move_uploaded_file($files["tmp_name"][$i], $url . $name);  
                 
                }
            
        }
        return false;
    }

}
