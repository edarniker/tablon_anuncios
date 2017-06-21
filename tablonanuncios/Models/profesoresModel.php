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
class ProfesoresModel extends \Config\Model {

    public static function getCursos($mail) {



        try {
            self::singleton_conexion();
            $sql = "SELECT @rownum:=@rownum+1 AS id, m_c.cod_curso "
                    . "FROM (SELECT @rownum:=0) r, materias_profesores AS m_p "
                    . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                    . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                    . "WHERE mail_profesor=? GROUP BY m_c.cod_curso ORDER BY m_c.cod_curso";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            self::$dbh->cerrar_conexion();
            $query->execute();
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["id"]] = $fila["cod_curso"];
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en exitsLoginM" . $exc->getMessage();
            die();
        }
        return null;
//    }
    }

    public static function StrSQLSubCategoriaCM() {
        return $sql = "SELECT @rownum:=@rownum+1 AS id, cod_curso "
                . "FROM (SELECT @rownum:=0) r, "
                . "(SELECT m_c.cod_curso FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                . "WHERE mail_profesor=? "
                . "GROUP BY m_c.cod_curso ORDER BY m_c.cod_curso)AS T";
    }

    public static function StrSQLSubCategoriaMM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre FROM (SELECT @rownum:=0) R, "
                . "(SELECT m.nombre FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
                . "WHERE mail_profesor=? "
                . "GROUP BY m.nombre ORDER BY m.nombre)AS T";
    }

    public static function StrSQLSubCategoriaDM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre FROM (SELECT @rownum:=0) R, "
                . "(SELECT d.nombre FROM profesores_departamento AS p_d "
                . "INNER JOIN departamentos AS d ON p_d.cod_departamento=d.codigo "
                . "WHERE P_D.mail_profesor=?) AS T ";
    }

    public static function StrSQLSubCategoriaTDM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre FROM (SELECT @rownum:=0) R, "
                . "(SELECT d.nombre FROM profesores_departamento AS p_d "
                . "INNER JOIN departamentos AS d ON p_d.cod_departamento=d.codigo "
                . "GROUP BY d.nombre ORDER BY d.nombre) AS T";
    }

    public static function StrSQLSubCategoriaJM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre "
                . "FROM (SELECT @rownum:=0) R, "
                . "(SELECT nombre FROM jornadas )AS T";
    }
    
    

    public static function StrSQLPubliRegisCM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m_c.cod_curso FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";


        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1)";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1  AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {

            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1 AND m_c.cod_curso=?)";
        }
        return $sql;
    }

    public static function StrSQLPubliRegisCPM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m_c.cod_curso FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5)";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {
            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND m_c.cod_curso=? )";
        }
        return $sql;
    }

    /**
     * funcion que devuelve el String de la consulta profesores materia anuncios
     * @param type $subcategoria
     * @return string sql
     */
    public static function StrSQLPubliRegisMM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m.nombre FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2) ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2 AND m.nombre=?) ";
        }
        return $sql;
    }

    public static function StrSQLPubliRegisDM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT d.nombre FROM departamentos AS d "
                . "INNER JOIN profesores_departamento AS p_d ON d.codigo=p_d.cod_departamento "
                . "INNER JOIN profesores AS p ON p_d.mail_profesor=p.mail ";
        ;
        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND id_categoria=3) ";
            } else {
                $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND id_categoria=3 AND (titulo REGEXP ? OR descripcion REGEXP ?)";
            }
        } else {
            $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND id_categoria=3 AND d.nombre=?) ";
        }
        return $sql;
    }

    public static function StrSQLPubliRegisTDM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT d.nombre FROM departamentos AS d "
                . "INNER JOIN profesores_departamento AS p_d ON d.codigo=p_d.cod_departamento "
                . "INNER JOIN profesores AS p ON p_d.mail_profesor=p.mail ";


        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE cod_jornada=?  AND id_categoria=4) ";
            } else {
                $sql .= "WHERE cod_jornada=?  AND id_categoria=4) AND (titulo REGEXP ? OR descripcion REGEXP ?)";
            }
        } else {
            $sql .= "WHERE cod_jornada=?  AND id_categoria=4 AND d.nombre=?)";
        }
        return $sql;
    }

     public static function StrSQLPubliRegisPM($subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT nombre FROM jornadas)";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6 ";
            } else {
                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6 AND cod_jornada=? ";
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
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m_c.cod_curso FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";
        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1) ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1 AND (titulo REGEXP ? OR descripcion REGEXP ?)) ";
            }
        } else {

            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=1 AND m_c.cod_curso=?) ";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliCursoProfesoresM($subcategoria = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m_c.cod_curso FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5) ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?)) ";
            }
        } else {
            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND m_c.cod_curso=?) ";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliMateriaM($subcategoria = null, $orden = null, $buscar = null) {

        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT m.nombre FROM materias_profesores AS m_p "
                . "INNER JOIN materias AS m ON m_p.cod_materia=m.codigo "
                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2) ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2 AND (titulo REGEXP ? OR descripcion REGEXP ?)";
            }
        } else {
            $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=2 AND m.nombre=?) ";
        }

        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliDepartamentoM($subcategoria = null, $orden = null, $buscar = null) {

        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON f_c.mail_usuario=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT d.nombre FROM departamentos AS d "
                . "INNER JOIN profesores_departamento AS p_d ON d.codigo=p_d.cod_departamento "
                . "INNER JOIN profesores AS p ON p_d.mail_profesor=p.mail ";


        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=3) ";
            } else {
                $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=3 AND (titulo REGEXP ? OR descripcion REGEXP ?)";
            }
        } else {
            $sql .= "WHERE p_d.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=3 AND d.nombre=?) ";
        }


        return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliDepartamentoAllM($subcategoria = null, $orden = null, $buscar = null) {

        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON f_c.mail_usuario=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT d.nombre FROM departamentos AS d "
                . "INNER JOIN profesores_departamento AS p_d ON d.codigo=p_d.cod_departamento "
                . "INNER JOIN profesores AS p ON p_d.mail_profesor=p.mail ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "WHERE cod_jornada=? AND f_c.id_categoria=4) ";
            } else {
                $sql .= "WHERE cod_jornada=? AND f_c.id_categoria=4) AND (titulo REGEXP ? OR descripcion REGEXP ?)";
            }
        } else {
            $sql .= "WHERE cod_jornada=? AND f_c.id_categoria=4 AND d.nombre=?) ";
        }



        return self::StrSQLOrden($sql, $orden);
    }
    
    public static function StrSQLPubliProfesoresM($subcategoria = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT nombre FROM jornadas) ";

        if (is_null($subcategoria)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6  ";
            } else {
                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=6 AND cod_jornada=? ";
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
                $sql .= "ORDER BY titulo LIMIT ?,?";

                break;
            case 'nombre':
                $sql .= "ORDER BY nombre LIMIT ?,?";

                break;
        }
        return $sql;
    }

}
