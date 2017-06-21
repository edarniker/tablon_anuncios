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
class PublicacionesModel extends \Config\Model {

    //put your code here






    public static function addPublicacionM($id, $mail) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  publicaciones(id_anuncio,mail_usuario,fecha_publicacion) VALUES(?,?,now())';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

//    public static function addPublicacionCursoM($id, $mail) {
//
//        try {
//            self::singleton_conexion();
//            $sql = 'INSERT INTO  publicaciones_curso(id_anuncio,mail_usuario,fecha_publicacion) VALUES(?,?,now())';
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id);
//            $query->bindParam(2, $mail);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAnuncio.php " . $exc->getMessage();
//            die();
//        }
//    }

    public static function exitsPublicacionM() {
        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  publicaciones_curso(id_anuncio,mail_usuario,fecha_publicacion) VALUES(?,?,now())';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

//    public static function addAnuncioAlumno($mail, $titulo, $descripcion) {
//        try {
//            self::singleton_conexion();
//            $sql = 'INSERT INTO  anuncios_alumnos(id,mail,titulo,descripcion,fecha_creacion) VALUES(null,?,?,?,now())';
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $mail);
//            $query->bindParam(2, $titulo);
//            $query->bindParam(3, $descripcion);
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAnuncio.php " . $exc->getMessage();
//            die();
//        }
//    }
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

    public static function CountPublicacionesM($sql, $jornada, $categoria, $tipo, $mail = null, $subcategoria = null, $buscar = null) {

        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            $query = self::_countPublicacionesOtrasM($query, $mail, $jornada, $categoria, $tipo, $subcategoria, $buscar);
            $query->execute();
            self::$dbh->cerrar_conexion();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return $consulta = 0;
        } catch (Exception $exc) {
            echo "Error en CountAnunciosPorMail " . $exc->getMessage();
            die();
        }
    }

    public static function CountPublicacionesAdministrativosM($sql, $categoria, $jornada = null, $subcategoria = null, $buscar = null) {


        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            if (!empty($jornada)) {
                $query->bindParam(1, $jornada, \PDO::PARAM_STR);
                if (!is_null($subcategoria)) {
                    $query->bindParam(2, $subcategoria, \PDO::PARAM_STR);
                }
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return $consulta = 0;
        } catch (Exception $exc) {
            echo "Error en CountAnunciosPorMail " . $exc->getMessage();
            die();
        }
    }

//    private static function _countPublicacionesInstitutoM($query, $jornada, $categoria, $subcategoria = null, $buscar = null) {
//        if ($categoria !== ALLDEPARTAMENTOS) {
//            $query->bindParam(1, $jornada);
//            if (!is_null($buscar)) {
//                $query->bindParam(2, $buscar);
//                $query->bindParam(3, $buscar);
//            }
//        } else {
//            $query->bindParam(1, $jornada);
//            if (!is_null($buscar)) {
//                $query->bindParam(2, $buscar);
//                $query->bindParam(3, $buscar);
//            }
//        }
//        if (!is_null($subcategoria) && $categoria != CURSOS) {
//            $query->bindParam(3, $subcategoria, \PDO::PARAM_STR);
//        }
//
//        return $query;
//    }

    private static function _countPublicacionesOtrasM($query, $mail, $jornada, $categoria, $tipo, $subcategoria = null, $buscar = null) {

        if (!is_null($mail)) {
            $query->bindParam(1, $mail);
            $query->bindParam(2, $jornada);
            if (!is_null($buscar)) {
                $query->bindParam(3, $buscar);
                $query->bindParam(4, $buscar);
            }
            if (!is_null($subcategoria) && ($categoria != CURSO || $tipo != ALUMNOS)) {

                $query->bindParam(3, $subcategoria, \PDO::PARAM_STR);
            }
        } else {
            if (!is_null($jornada)) {
                $query->bindParam(1, $jornada);
                if (!is_null($buscar)) {
                    $query->bindParam(2, $buscar);
                    $query->bindParam(3, $buscar);
                }
                if (!is_null($subcategoria) && ($categoria != CURSOS || $tipo != ALUMNOS)) {
                    $query->bindParam(2, $subcategoria, \PDO::PARAM_STR);
                }
            } else {
                if (!is_null($buscar)) {
                    $query->bindParam(1, $buscar);
                    $query->bindParam(2, $buscar);
                }

                if (!is_null($subcategoria)) {
                    $query->bindParam(1, $subcategoria, \PDO::PARAM_STR);
                }
            }
        }


        return $query;
    }

    public static function listarAnunciosPorCategoriaPagM($sql, $jornada, $inicio, $fin, $tipo, $mail = null, $subcategoria = null, $categoria) {

        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            if (!is_null($mail)) {
                $query->bindParam(1, $mail, \PDO::PARAM_STR);
                $query->bindParam(2, $jornada, \PDO::PARAM_STR);
                if (!is_null($subcategoria) && ($categoria != CURSO || $tipo != ALUMNOS)) {
                    $query->bindParam(3, $subcategoria, \PDO::PARAM_STR);
                    $query->bindParam(4, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(5, $fin, \PDO::PARAM_INT);
                } else {
                    $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(4, $fin, \PDO::PARAM_INT);
                }
//               $query=self::_consultaMailNuLL($query,$jornada, $inicio, $fin, $mail = null, $subcategoria = null);
            } else {
                if (!is_null($jornada)) {
                    $query->bindParam(1, $jornada, \PDO::PARAM_STR);
                    if (!is_null($subcategoria) && ($categoria != CURSO || $tipo != ALUMNOS)) {
                        $query->bindParam(2, $subcategoria, \PDO::PARAM_STR);
                        $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(4, $fin, \PDO::PARAM_INT);
                    } else {
                        $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(3, $fin, \PDO::PARAM_INT);
                    }
                } else {
                    if (!is_null($subcategoria)) {
                        $query->bindParam(1, $subcategoria, \PDO::PARAM_STR);
                        $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(3, $fin, \PDO::PARAM_INT);
                    } else {
                        $query->bindParam(1, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(2, $fin, \PDO::PARAM_INT);
                    }
                }
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos[++$inicio] = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en anunciosModel.php " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorCategoriaAdministrativosPagM($sql, $categoria, $inicio, $fin, $jornada = null, $subcategoria = null) {
        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            if (empty($jornada)) {
                $query->bindParam(1, $inicio, \PDO::PARAM_INT);
                $query->bindParam(2, $fin, \PDO::PARAM_INT);
            } else {
                if (is_null($subcategoria)) {
                    $query->bindParam(1, $jornada, \PDO::PARAM_INT);
                    $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(3, $fin, \PDO::PARAM_INT);
                } else {
                    $query->bindParam(1, $jornada, \PDO::PARAM_INT);
                    $query->bindParam(2, $subcategoria, \PDO::PARAM_INT);
                    $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(4, $fin, \PDO::PARAM_INT);
                }
            }

            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos[++$inicio] = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en anunciosModel.php " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorCategoriaPagBuscarM($sql, $jornada, $inicio, $fin, $tipo, $mail = null, $buscar = null) {

        try {
            self::singleton_conexion();
            $query = self::$dbh->preparar($sql);
            if (!is_null($mail)) {
                $query->bindParam(1, $mail, \PDO::PARAM_STR);
                $query->bindParam(2, $jornada, \PDO::PARAM_STR);
                if (is_null($buscar)) {
                    $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(4, $fin, \PDO::PARAM_INT);
                } else {
                    $query->bindParam(3, $buscar);
                    $query->bindParam(4, $buscar);
                    $query->bindParam(5, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(6, $fin, \PDO::PARAM_INT);
                }
//               $query=self::_consultaMailNuLL($query,$jornada, $inicio, $fin, $mail = null, $subcategoria = null);
            } else {
                if (!is_null($jornada)) {
                    $query->bindParam(1, $jornada, \PDO::PARAM_STR);
                    if (is_null($buscar)) {
                        $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(3, $fin, \PDO::PARAM_INT);
                    } else {
                        $query->bindParam(2, $buscar);
                        $query->bindParam(3, $buscar);
                        $query->bindParam(4, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(5, $fin, \PDO::PARAM_INT);
                    }
                }else{
                        $query->bindParam(1, $buscar);
                        $query->bindParam(2, $buscar);
                        $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                        $query->bindParam(4, $fin, \PDO::PARAM_INT);
                }
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos[++$inicio] = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en anunciosModel.php " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorCategoriaPublicoPagBuscarM($categoria, $inicio, $fin, $buscar = null) {

        try {
            self::singleton_conexion();
            $sql = "SELECT titulo,descripcion FROM publicaciones_publico AS p_p "
                    . "INNER JOIN anuncios_publico AS a_p ON p_p.id_anuncio=a_p.id "
                    . "INNER JOIN categorias_publicas AS c_p ON a_p.id_categoria=c_p.id "
                    . "WHERE a_p.id_categoria=? ORDER BY p_p.fecha_publicacion";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $categoria, \PDO::PARAM_STR);
            if (is_null($buscar)) {
                $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                $query->bindParam(3, $fin, \PDO::PARAM_INT);
            } else {
                $query->bindParam(2, $buscar);
                $query->bindParam(3, $buscar);
                $query->bindParam(4, $inicio, \PDO::PARAM_INT);
                $query->bindParam(5, $fin, \PDO::PARAM_INT);
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos[++$inicio] = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en listarAnunciosPorCategoriaPublicoPagBuscarM" . $exc->getMessage();
            die();
        }
    }

//   
//    private static function _consultaMailNuLL($query, $jornada, $inicio, $fin, $mail = null, $subcategoria = null) {
//        $query->bindParam(1, $mail, \PDO::PARAM_STR);
//        $query->bindParam(2, $jornada, \PDO::PARAM_STR);
//        if (is_null($subcategoria)) {
//            $query->bindParam(3, $inicio, \PDO::PARAM_INT);
//            $query->bindParam(4, $fin, \PDO::PARAM_INT);
//        } else {
//            $query->bindParam(3, $subcategoria, \PDO::PARAM_STR);
//            $query->bindParam(4, $inicio, \PDO::PARAM_INT);
//            $query->bindParam(5, $fin, \PDO::PARAM_INT);
//        }
//        return $query;
//    }

    public static function verLineaPublicacionM($id, $mail, $subcategoria) {
//        echo $id;
        echo $mail;
        echo $subcategoria;
        try {
            self::singleton_conexion();
            $sql = "SELECT p.id_anuncio,titulo,descripcion,nombre,primer_apellido,f_c.nombre_subcategoria FROM publicaciones AS p "
                    . "INNER JOIN anuncios AS a ON p.id_anuncio=a.id AND p.mail_usuario=a.mail "
                    . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                    . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                    . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                    . "WHERE p.id_anuncio=? AND p.mail_usuario=? AND f_c.nombre_subcategoria=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $subcategoria);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos = null;
            if ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en verLineaPublicacionM" . $exc->getMessage();
            die();
        }
    }

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


    public static function addPublicacionPublicoM($id, $fechaPublicacion) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  publicaciones_publico  VALUES(?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $fechaPublicacion, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addPublicacionPublicoM " . $exc->getMessage();
            die();
        }
    }

    public static function CountPublicacionesPublicoM($categoria, $subcategoria = null, $buscar = null) {

        try {
            self::singleton_conexion();
            $sql = "SELECT COUNT(*)FROM publicaciones_publico AS p_p "
                    . "INNER JOIN anuncios_publico AS a_p ON p_p.id_anuncio=a_p.id "
                    . "INNER JOIN categorias_publicas AS c_p ON a_p.id_categoria=c_p.id "
                    . "WHERE visible=true AND c_p.nombre=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $categoria);
            if (!is_null($buscar)) {
                $query->bindParam(2, $buscar);
                $query->bindParam(3, $buscar);
            }
            if (!is_null($subcategoria)) {
                $query->bindParam(3, $subcategoria, \PDO::PARAM_STR);
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $consulta = $query->fetch();
            if ($consulta[0] != null) {
                return $consulta[0];
            }
            return $consulta;
        } catch (Exception $exc) {
            echo "Error en CountAnunciosPorMail " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorCategoriaPublicoM($categoria, $inicio, $fin, $subcategoria = null, $buscar = null) {

        try {
            self::singleton_conexion();
            $sql = "SELECT titulo,descripcion,p_p.fecha_publicacion,'Albarregas' FROM publicaciones_publico AS p_p "
                    . "INNER JOIN anuncios_publico AS a_p ON p_p.id_anuncio=a_p.id "
                    . "INNER JOIN categorias_publicas AS c_p ON a_p.id_categoria=c_p.id "
                    . "WHERE visible=true AND c_p.nombre=?";
            $sql = self::StrSQLOrden($sql, "fechaReciente");
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $categoria, \PDO::PARAM_STR);
            if (is_null($buscar)) {
                $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                $query->bindParam(3, $fin, \PDO::PARAM_INT);
            } else {
                $query->bindParam(2, $buscar);
                $query->bindParam(3, $buscar);
                $query->bindParam(4, $inicio, \PDO::PARAM_INT);
                $query->bindParam(5, $fin, \PDO::PARAM_INT);
            }

            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_NUM)) {
                $datos[++$inicio] = $fila;
            }
            return $datos;
        } catch (Exception $exc) {
            echo "Error en anunciosModel.php " . $exc->getMessage();
            die();
        }
    }

    private static function StrSQLOrden($sql, $orden) {

        switch ($orden) {
            case 'fechaReciente':
                $sql .= "ORDER BY p_p.fecha_publicacion DESC, p_p.id_anuncio DESC LIMIT ?,?";

                break;
            case 'fechaAntigua':
                $sql .= "ORDER BY p_p.fecha_publicacion ASC LIMIT ?,?";

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
