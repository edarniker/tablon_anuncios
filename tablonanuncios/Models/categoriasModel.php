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
class CategoriasModel extends \Config\Model {

    //put your code here


    public static function listarCategoriasM($id) {

        try {
            self::singleton_conexion();
            $sql = "SELECT c.id,c.nombre FROM acceso_categorias AS ac INNER JOIN categorias AS c ON ac.id_categoria=c.id WHERE id_nivel=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            self::$dbh->cerrar_conexion(); // 
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriasPublicoM() {

        try {
            self::singleton_conexion();
            $sql = "SELECT id,nombre FROM categorias_publicas";
            $query = self::$dbh->preparar($sql);
            self::$dbh->cerrar_conexion();
            $datos = null;
            $query->execute();
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategoriasPublico" . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriasIndexM($id) {

        try {
            self::singleton_conexion();
            $sql = "SELECT c.nombre FROM acceso_categorias AS ac INNER JOIN categorias AS c ON ac.id_categoria=c.id WHERE id_nivel=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            self::$dbh->cerrar_conexion(); // 
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["nombre"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriaCursosAdministrativosM($sql,$jornada) {
       
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $jornada);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["codigo"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

 

    public static function listarCategoriaMateriaM($sql, $mail) {

        try {

            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->execute();
            self::$dbh->cerrar_conexion();
//            $datos = $query->fetch(\PDO::FETCH_ASSOC);
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriaDepartamentoM($sql, $mail = null) {
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            if (!is_null($mail)) {
                $query->bindParam(1, $mail);
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
//            $datos = $query->fetch(\PDO::FETCH_ASSOC);
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriaDepartamentoAdministrativosM($sql, $jornada) {
        try {
            self::singleton_conexion();      
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $jornada, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategoriaDepartamentoAdministrativosM" . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriaInstitutoM($sql) {
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["nombre"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function listarCategoriaGruposM($sql, $jornada) {
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $jornada, \PDO::PARAM_STR);
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["cod_grupo"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategoriaGruposM " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }
    
     public static function listarCategoriaCursosM($sql, $jornada) {
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $jornada, \PDO::PARAM_STR);
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["cod_curso"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarCategoriaCursosM " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function getIDCategoriaM($nombre) {
        try {
            self::singleton_conexion();
            $sql = "SELECT id FROM categorias WHERE nombre=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $nombre);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function getNombreCategoriaM($id) {
        try {
            self::singleton_conexion();
            $sql = "SELECT nombre FROM categorias WHERE id=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function getIDCategoriaPublicoM($nombre) {
        try {
            self::singleton_conexion();
            $sql = "SELECT id FROM categorias_publicas WHERE nombre=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $nombre);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return null;
        } catch (Exception $exc) {
            echo "Error en listarSubCategorias " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

}
