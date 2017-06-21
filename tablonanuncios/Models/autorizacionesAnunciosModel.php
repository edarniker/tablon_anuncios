<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of anunciosModel
 *
 * @author Edward
 */
class AutorizacionesAnunciosModel extends \Config\Model {

    //put your code here




  
    public static function addAutorizacion($id, $mailAlu,$mail) {
        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  autorizaciones_alumnos(id_anuncio,mail_alumno,mail_profesor,fecha_autorizacion) VALUES(?,?,?,NOW())';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mailAlu);   
            $query->bindParam(3, $mail);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en  addAutorizacion" . $exc->getMessage();
            die();
        }
    }

//    public static function addAnuncioAlumno($mail, $titulo, $descripcion,$categoria) {
//        try {
//            self::singleton_conexion();
//            $sql = 'INSERT INTO  anuncios_alumnos(id,mail,titulo,descripcion,nombre_categoria,fecha_creacion) VALUES(null,?,?,?,?,now())';
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->bindParam(2, $titulo);
//            $query->bindParam(3, $descripcion);
//            $query->bindParam(3, $categoria);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAnuncio.php " . $exc->getMessage();
//            die();
//        }
//    }
//
//    public static function listarAnuncios() {
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT * FROM anuncios";
//            $query = self::$dbh->preparar($sql);
//            $query->execute();
//            self::$dbh->cerrar_conexion();
//            while ($fila = $query->fetch()) {
//                $datos[$fila['id']] = $fila;
//            }
//
//            return $datos;
////            while ($fila = mysqli_fetch_array($resultados))
////		{
////			$datos[$fila['id']]=$fila;																
////		}
////		header('Content-Type: application/json');
////		echo json_encode($datos);
//        } catch (Exception $exc) {
//            echo "Error en anuncios.php " . $exc->getMessage();
//            throw new customException("Error en addAnuncio.php ");
//            die();
//        }
//    }
//
//    public static function CountAnunciosPorMail($mail) {
//
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT count(*) FROM anuncios WHERE mail=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->execute();
//            self::$dbh->cerrar_conexion();
//            $consulta = $query->fetch();           
//            if ($consulta[0] != null) {
//                return $consulta[0];
//            }
//            return $consulta;
//            
//            
//            } catch (Exception $exc) {
//            echo "Error en CountAnunciosPorMail " . $exc->getMessage();
//            die();
//        }
//    }
//
//    public static function listarAnunciosPorMailPag($mail, $inicio, $fin) {
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT id,titulo,descripcion,fecha_creacion FROM anuncios WHERE mail=? ORDER BY id DESC LIMIT ?,?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail, \PDO::PARAM_STR);
//            $query->bindParam(2, $inicio, \PDO::PARAM_INT);
//            $query->bindParam(3, $fin, \PDO::PARAM_INT);
//            $query->execute();
//            self::$dbh->cerrar_conexion();
//            $datos = null;
//            $query->setFetchMode(\PDO::FETCH_NUM);
//
//            while ($fila = $query->fetch()) {
//                $datos[++$inicio] = $fila;
//            }
//
//            return $datos;
//        } catch (Exception $exc) {
//            echo "Error en anunciosModel.php " . $exc->getMessage();
//            die();
//        }
//    }
//
//    public static function listarAnuncioPorId($tipo, $id) {
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT titulo,descripcion,fecha_creacion FROM anuncios_" . $tipo . " WHERE id=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id, \PDO::PARAM_INT);
//            $query->execute();
//            self::$dbh->cerrar_conexion();
//            $datos = null;
//
//            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
//                $datos = $fila;
//            }
//
//            return $datos;
//        } catch (Exception $exc) {
//            echo "Error en anunciosModel.php " . $exc->getMessage();
//            die();
//        }
//    }
//
//    public static function editarAnuncioAlumno($id, $titulo, $descripcion) {
//        try {
//            self::singleton_conexion();
//            $sql = 'UPDATE  anuncios_alumnos SET titulo=?,descripcion=?,fecha_creacion=now() WHERE id=?';
//            $query = self::$dbh->preparar($sql);
//            ;
//            $query->bindParam(1, $titulo, \PDO::PARAM_STR);
//            $query->bindParam(2, $descripcion, \PDO::PARAM_STR);
//            $query->bindParam(3, $id, \PDO::PARAM_INT);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAnuncio.php " . $exc->getMessage();
//            die();
//        }
//    }
//
//    public static function eliminarAnuncioPorId($tipo, $id) {
//        try {
//            self::singleton_conexion();
//            $sql = "DELETE FROM anuncios_" . $tipo . " WHERE id=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id, \PDO::PARAM_INT);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en anunciosModel.php " . $exc->getMessage();
//            die();
//        }
//      
//    }

}
