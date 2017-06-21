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
class AdministrativosModel extends \Config\Model {

//    public static function getAlumnoM($mail) {
//
//
//
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT * FROM alumnos WHERE mail=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->execute();
//            $consulta = $query->fetch(\PDO::FETCH_ASSOC);
//            self::$dbh->cerrar_conexion();
//            if ($consulta != null) {
//                $datos['cod_curso'] = $consulta["cod_curso"];
//            }
//////            $query->bindParam(2, md5($pass));
//            return $datos;
//        } catch (Exception $exc) {
//            echo "Error en exitsLoginM" . $exc->getMessage();
//            die();
//        }
//        return null;
////    }
//    }
//
//    public static function getCursoAlumnoM($mail) {
//        try {
//            self::singleton_conexion();
//            $sql = "SELECT cod_curso FROM alumnos WHERE mail=?";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->execute();
//            self::$dbh->cerrar_conexion();
//            $consulta = $query->fetch();
//            if ($consulta != null) {
//                $consulta = $consulta[0];
//            }
//            return $consulta;
//        } catch (Exception $exc) {
//            echo "Error en exitsLoginM" . $exc->getMessage();
//            die();
//        }
//        return null;
////    }
//    }
//
//    public static function addAlumnoM($mail, $curso, $jornada) {
//
//        try {
//            self::singleton_conexion();
//            $sql = "INSERT INTO alumnos VALUES(?,?,?)";
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->bindParam(2, $curso);
//            $query->bindParam(3, $jornada);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAlumnoM" . $exc->getMessage();
//            die();
//        }
//        return null;
////    }
//    }

    public static function StrSQLSubCategoriaGM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, cod_grupo FROM (SELECT @rownum:=0) R, 
            (SELECT cod_grupo FROM jornada_grupos  WHERE cod_jornada=?) AS T";
    }

    public static function StrSQLSubCategoriaCM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, codigo FROM (SELECT @rownum:=0) R,"
                . "(SELECT c.codigo FROM cursos AS c INNER JOIN grupos AS g ON c.cod_grupo=g.codigo "
                . "INNER JOIN jornada_grupos AS j_g ON g.codigo=j_g.cod_grupo "
                . "WHERE cod_jornada=? )AS T";
    }

    public static function StrSQLSubCategoriaDM() {
        return $sql = "SELECT @rownum:=@rownum+1 as id, nombre FROM (SELECT @rownum:=0) R, "
                . "(SELECT d.nombre FROM jornadas_departamentos AS j_d "
                . "INNER JOIN departamentos AS d ON j_d.cod_departamento=d.codigo "
                . "WHERE j_d.cod_jornada=?) AS T";
    }

    public static function StrSQLPubliRegisGM($jornada = null, $subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT cod_grupo FROM jornada_grupos)";

        if (is_null($subcategoria) && empty($jornada)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=8";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=8 AND cod_jornada=? ";

                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }
        return $sql;
    }

    public static function StrSQLPubliRegisDM($jornada = null, $subcategoria = null, $buscar = null) {

        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN (SELECT nombre FROM jornadas_departamentos AS j_d "
                . "INNER JOIN departamentos AS d ON j_d.cod_departamento=d.codigo)" ;

        if (is_null($subcategoria) && empty($jornada)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=9";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=9 AND cod_jornada=? ";

                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }
        return $sql;
    }

    public static function StrSQLPubliRegisCM($jornada=null,$subcategoria = null, $buscar = null) {
        $sql = "SELECT COUNT(*) FROM publicaciones AS p INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN (SELECT c.codigo FROM cursos AS c "
                . "INNER JOIN grupos AS g ON c.cod_grupo=g.codigo "
                . "INNER JOIN jornada_grupos AS j_g ON g.codigo=j_g.cod_grupo) ";
                
       if (is_null($subcategoria) && empty($jornada)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=7 ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=7 AND cod_jornada=? ";

                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }
        return $sql;
    }

//    public static function StrSQLPubliRegisMM($subcategoria = null, $buscar = null) {
//        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
//                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
//                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
//                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
//                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
//                . "WHERE f_c.nombre_subcategoria IN "
//                . "(SELECT m.nombre FROM materias AS m "
//                . "INNER JOIN materias_cursos AS m_c ON m.codigo=m_c.cod_materia "
//                . "INNER JOIN cursos AS c ON m_c.cod_curso=c.codigo "
//                . "INNER JOIN alumnos AS a ON c.codigo=a.cod_curso ";
//
//        if (is_null($subcategoria)) {
//            if (is_null($buscar)) {
//                $sql .= "WHERE a.mail=?)AND cod_jornada=? AND f_c.id_categoria=2 ";
//            } else {
//                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
//            }
//        } else {
//            $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND f_c.nombre_subcategoria=? ";
//        }
//        return $sql;
//    }

//
//    public static function StrSQLPubliRegisIM($subcategoria = null, $buscar = null) {
//        $sql = "SELECT COUNT(*) FROM publicaciones AS p "
//                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
//                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
//                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
//                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
//                . "WHERE f_c.nombre_subcategoria IN "
//                . "(SELECT nombre FROM jornadas)";
//
//        if (is_null($subcategoria)) {
//            if (is_null($buscar)) {
//                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7 ";
//            } else {
//                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
//            }
//        } else {
//            $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7 AND cod_jornada=? ";
//        }
//        return $sql;
//    }
//    
//    
//
    public static function StrSQLPubliCursoM($subcategoria = null,$jornada=null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail WHERE f_c.nombre_subcategoria IN (SELECT c.codigo FROM cursos AS c "
                . "INNER JOIN grupos AS g ON c.cod_grupo=g.codigo "
                . "INNER JOIN jornada_grupos AS j_g ON g.codigo=j_g.cod_grupo) ";

       if (is_null($subcategoria) && empty($jornada)) {
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=7 ";
            } else {
                $sql .= "WHERE m_p.mail_profesor=? AND cod_jornada=? AND f_c.id_categoria=5 AND (titulo REGEXP ? OR descripcion REGEXP ?))";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=7 AND cod_jornada=? ";

                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }
      return self::StrSQLOrden($sql, $orden);
    }

    public static function StrSQLPubliGruposM($subcategoria = null, $jornada = null, $orden = null, $buscar = null) {
        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "WHERE f_c.nombre_subcategoria IN "
                . "(SELECT cod_grupo FROM jornada_grupos)";
           
        if (is_null($subcategoria) && empty($jornada)) {
            
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=8 ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=8 AND cod_jornada=? ";
                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }

        return self::StrSQLOrden($sql, $orden);
    }
    
     public static function StrSQLPubliDepartamentosM($subcategoria = null, $jornada = null, $orden = null, $buscar = null) {
       $sql= "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                . "WHERE f_c.nombre_subcategoria IN (SELECT nombre FROM jornadas_departamentos AS j_d "
                . "INNER JOIN departamentos AS d ON j_d.cod_departamento=d.codigo)";
                
           
        if (is_null($subcategoria) && empty($jornada)) {
            
            if (is_null($buscar)) {
                $sql .= "AND f_c.id_categoria=9 ";
            } else {
                $sql .= "WHERE a.mail=?) AND cod_jornada=? AND f_c.id_categoria=2 AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
            }
        } else {
            if (!empty($jornada)) {
                $sql .= "AND f_c.id_categoria=9 AND cod_jornada=? ";
                if (!is_null($subcategoria)) {
                    $sql .= "AND f_c.nombre_subcategoria=? ";
                }
            }
        }

        return self::StrSQLOrden($sql, $orden);
    }
    
    
//
//    public static function StrSQLPubliInstitutoM($subcategoria = null, $orden = null, $buscar = null) {
//        $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
//                . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
//                . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
//                . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
//                . "INNER JOIN usuarios AS u ON a.mail=u.mail "
//                . "WHERE f_c.nombre_subcategoria IN "
//                . "(SELECT nombre FROM jornadas)";
//
//        if (is_null($subcategoria)) {
//            if (is_null($buscar)) {
//                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7  ";
//            } else {
//                $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7  AND (titulo REGEXP ? OR descripcion REGEXP ?) ";
//            }
//        } else {
//            $sql .= "AND f_c.nombre_subcategoria=? AND f_c.id_categoria=7 AND cod_jornada=? ";
//        }
//
//       
//    }

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
