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
class UsuariosModel extends \Config\Model {

    //put your code here


    public static function getUsuarioLoginM($mail) {


        try {
            self::singleton_conexion();
            $sql = "SELECT mail,nombre,primer_apellido,segundo_apellido FROM usuarios WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetchAll();
            if (!is_null($consulta)) {
                return $usuario = $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en getUsuarioLoginM" . $exc->getMessage();
            die();
        }
    }

    public static function getJornadaIdNivelM($tipo, $mail) {
        try {
            self::singleton_conexion();

            if ($tipo == PROFESORES_VALIDADORES) {
                $tipo = PROFESORES;
            }
            $sql = "SELECT cod_jornada AS jornada FROM " . $tipo . " WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            self::$dbh->cerrar_conexion();
            echo $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta)) {
                return $jornada = $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en getJornadaIdNivelM " . $exc->getMessage();
            die();
        }
    }

    public static function getMailM($nombre, $apellido) {
        try {
            self::singleton_conexion();
            $sql = "SELECT mail FROM usuarios WHERE nombre=? AND primer_apellido=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $nombre);
            $query->bindParam(2, $apellido);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta)) {
                return $mail = $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en getJornadaIdNivelM " . $exc->getMessage();
            die();
        }
    }

    public static function addUsuarioM($dni, $nombre, $primerApe, $segundoApe, $mail, $nivel) {

        try {
            self::singleton_conexion();
            $sql = "INSERT INTO usuarios VALUES(?,?,?,?,?,?)";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            $query->bindParam(2, $nivel, \PDO::PARAM_INT);
            $query->bindParam(3, $dni, \PDO::PARAM_STR);
            $query->bindParam(4, $nombre, \PDO::PARAM_STR);
            $query->bindParam(5, $primerApe, \PDO::PARAM_STR);
            $query->bindParam(6, $segundoApe, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addUsuario" . $exc->getMessage();
            die();
        }
    }

    public static function getExistsM($dni) {
        try {
            self::singleton_conexion();
            $sql = "SELECT mail FROM usuarios WHERE identificacion=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $dni);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en getJornadaIdNivelM " . $exc->getMessage();
            die();
        }
    }

    public static function eliminarUsuarioM($dni) {
        try {
            self::singleton_conexion();
            $sql = "DELETE FROM usuarios WHERE identificacion=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $dni, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en eliminarUsuarioM " . $exc->getMessage();
            die();
        }
    }

    public static function getUsuarioNivelM($dni, $mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT nivel FROM usuarios WHERE identificacion=? AND mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $dni);
            $query->bindParam(2, $mail);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta)) {
                return $mail = $consulta[0];
            }
        } catch (Exception $exc) {
            echo "Error en getUsuarioNivel " . $exc->getMessage();
            die();
        }
    }

}
