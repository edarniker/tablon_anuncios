<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Models;

/**
 * Description of alumnosModel
 *
 * @author Edward
 */
class AlumnosModel extends \Config\Model {

    public static function getAlumnoM($mail) {



        try {
            self::singleton_conexion();
            $sql = "SELECT * FROM alumnos WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->execute();
            $consulta = $query->fetch(\PDO::FETCH_ASSOC);
            self::$dbh->cerrar_conexion();
            if ($consulta != null) {
                $datos['cod_curso'] = $consulta["cod_curso"];
            }
////            $query->bindParam(2, md5($pass));
            return $datos;
        } catch (Exception $exc) {
            echo "Error en exitsLoginM" . $exc->getMessage();
            die();
        }
        return null;
//    }
    }

    public static function getCursoAlumnoM($mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT cod_curso FROM alumnos WHERE mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->execute();
            self::$dbh->cerrar_conexion();
            $consulta = $query->fetch();
            if ($consulta != null) {
                $consulta = $consulta[0];
            }
            return $consulta;
        } catch (Exception $exc) {
            echo "Error en exitsLoginM" . $exc->getMessage();
            die();
        }
        return null;
//    }
    }

    public static function addAlumnoM($mail, $curso, $jornada) {

        try {
            self::singleton_conexion();
            $sql = "INSERT INTO alumnos VALUES(?,?,?)";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->bindParam(2, $curso);
            $query->bindParam(3, $jornada);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAlumnoM" . $exc->getMessage();
            die();
        }
        return null;
//    }
    }

    public static function StrSQLSubCategoriaMM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre FROM (SELECT @rownum:=0) R, "
                . "(SELECT m.nombre FROM materias AS m "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                . "INNER JOIN cursos AS c ON m_c.cod_curso=c.codigo "
                . "INNER JOIN alumnos AS a ON c.codigo=a.cod_curso "
                . "WHERE a.mail=? ORDER BY m.nombre)AS T";
    }

    public static function StrSQLSubCategoriaIM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre "
                . "FROM (SELECT @rownum:=0) R, "
                . "(SELECT nombre FROM jornadas )AS T";
    }

    public static function StrSQLPubliRegisCM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT a.cod_curso FROM alumnos AS a ";
        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1 ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1 AND u.mail IN(SELECT mail FROM " . $subcategoria . ")";
        }
        return $sql;
    }

    public static function StrSQLPubliRegisMM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m.nombre FROM materias AS m "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                . "INNER JOIN cursos AS c ON m_c.cod_curso=c.codigo "
                . "INNER JOIN alumnos AS a ON c.codigo=a.cod_curso ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE a.mail=?)AND cod_jornada=? AND f_c.id_categoria=2 ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND f_c.nombre_subcategoria=? ";
        }
        return $sql;
    }

    public static function StrSQLPubliRegisIM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT nombre FROM jornadas)";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=10 ";
            } else {
                $sql .= "AND f_c.id_categoria=10 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "AND f_c.id_categoria=10 AND f_c.nombre_subcategoria=? ";
        }
        return $sql;
    }
    
    

    public static function StrSQLPubliCursoM($subcategoria = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria,p.fecha_publicacion FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT a.cod_curso FROM alumnos AS a ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1  ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=1 AND u.mail IN(SELECT mail FROM " . $subcategoria . ")";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliMateriaM($subcategoria = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria,p.fecha_publicacion FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m.nombre FROM materias AS m "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                . "INNER JOIN cursos AS c ON m_c.cod_curso=c.codigo "
                . "INNER JOIN alumnos AS a ON c.codigo=a.cod_curso ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND f_c.nombre_subcategoria=? ";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliInstitutoM($subcategoria = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria,p.fecha_publicacion FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT nombre FROM jornadas)";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=10 ";
            } else {
                $sql .= "AND f_c.id_categoria=10  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "AND f_c.id_categoria=10 AND f_c.nombre_subcategoria=? ";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    private static function StrSQLOrden($sql, $orden) {

        switch ($orden) {
            case 'fechaReciente':
                $sql .= "ORDER BY p.fecha_publicacion DESC, p.id_anuncio DESC LIMIT ?,?";

                break;
            case 'fechaAntigua':
                $sql .= "ORDER BY p.fecha_publicacion ASC LIMIT ?,?";

                break;
            case 'titulo':
                $sql .= "ORDER BY titulo ASC LIMIT ?,?";

                break;
            case 'nombre':
                $sql .= "ORDER BY nombre ASC LIMIT ?,?";

                break;
        }
        return $sql;
    }

}
