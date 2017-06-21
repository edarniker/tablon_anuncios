<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of loginModel
 *
 * @author Edward
 */
class LoginModel extends \Config\Model {

    //put your code here
//    public function __construct() {
//        parent::singleton_conexion();
//    }

    public static function exitsLoginM($mail, $pass) {

        try {
            self::singleton_conexion();
            $sql = "SELECT n.id,n.tipo  FROM login INNER JOIN nivel AS n ON login.nivel= n.id WHERE mail=? and contrasena=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->bindParam(2, $pass);
            self::$dbh->cerrar_conexion();
            $query->execute();
            return $consulta = $query->fetch(\PDO::FETCH_ASSOC);

////            $query->bindParam(2, md5($pass));
        } catch (Exception $exc) {
            echo "Error en exitsLoginM" . $exc->getMessage();
            die();
        }
    }

    public static function verificarLoginM($mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT mail FROM login WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en verificarUsuarioM" . $exc->getMessage();
            die();
        }
    }

    public static function getLoginM($mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT mail,codigo FROM login WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            return $datos = $query->fetch();
//            while ($fila =) {
//                $datos[$fila["id"]] = $fila["nombre"];
//            }
//            return $datos;
        } catch (Exception $exc) {
            echo "Error en verificarUsuarioM" . $exc->getMessage();
            die();
        }
    }

    public static function addLoginM($mail, $nivel, $pass, $codigo) {
        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO login(mail,nivel,contrasena,estado,codigo) VALUES(?,?,?,false,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            $query->bindParam(2, $nivel, \PDO::PARAM_INT);
            $query->bindParam(3, $pass, \PDO::PARAM_STR);
            $query->bindParam(4, $codigo, \PDO::PARAM_INT);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

//    public function getUsuarioM($mail, $codigo) {
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT * FROM login WHERE mail=? AND codigo=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail, \PDO::PARAM_STR);
//            $query->bindParam(2, $codigo, \PDO::PARAM_STR);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en getUsuarioM" . $exc->getMessage();
//            die();
//        }
//    }

    public function activarLoginM($mail, $codigo) {
        try {
            self::singleton_conexion();
            $sql = "UPDATE login set estado=1 WHERE mail=? AND codigo=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            $query->bindParam(2, $codigo, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en getActivarUsuarioM" . $exc->getMessage();
            die();
        }
    }


}
