<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of usuariosModel
 *
 * @author Edward
 */
class JornadasModel extends \Config\Model {

    //put your code here

 

   

    public static function getJornadaNombreM($codigo) {
        try {
            self::singleton_conexion();
            $sql = "SELECT nombre FROM  jornadas WHERE codigo=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $codigo, \PDO::PARAM_STR);            
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta)) {
                return $$codigo = $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en getJornadaIdNivelM " . $exc->getMessage();
            die();
        }
    }

    public static function getJornadaCodM($nombre) {
        try {
            self::singleton_conexion();
            $sql = "SELECT codigo FROM  jornadas WHERE nombre=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $nombre, \PDO::PARAM_STR);            
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta)) {
                return $nombre= $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en getJornadaIdNivelM " . $exc->getMessage();
            die();
        }
    }
    
    public static function getJornadasM() {
        try {
            self::singleton_conexion();
            $sql = "SELECT @rownum:=@rownum+1 AS id,nombre FROM (SELECT @rownum:=0) r,jornadas";
            $query = self::$dbh->preparar($sql);                   
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos=null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en getJornadas" . $exc->getMessage();
            die();
        }
    }
 
    

}
