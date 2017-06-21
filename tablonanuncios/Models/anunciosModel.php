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
class AnunciosModel extends \Config\Model {

    //put your code here




    public static function getIdLastUserM($mail) {

        try {
            self::singleton_conexion();
            $sql = "SELECT id FROM anuncios WHERE mail=? ORDER BY id DESC LIMIT 1";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if ($consulta[0] != null) {
                return $consulta[0];
            }
        } catch (Exception $exc) {
            echo "Error en getIdLastUser " . $exc->getMessage();
            die();
        }
    }

    public static function addAnuncioM($id, $mail, $titulo, $descripcion, $fechaPublicacion, $autorizado) {
        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  anuncios(id,mail,titulo,descripcion,fecha_creacion,fecha_publicacion,autorizado) VALUES(?,?,?,?,now(),?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $titulo);
            $query->bindParam(4, $descripcion);
            $query->bindParam(5, $fechaPublicacion);
            $query->bindParam(6, $autorizado);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

    public static function addAnuncioJornadaM($id, $mail, $jornada) {
        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO filtro_jornadas(id_anuncio,mail_usuario,cod_jornada) VALUES(?,?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $jornada);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioJornadaM " . $exc->getMessage();
            die();
        }
    }

//    public static function addAnuncioFiltroM($id,$mail,$categoria,$numSubcategoria,$nombreSubcategoria,$jornada){         
//           try {              
//            self::singleton_conexion();
//             $sql= self::strFiltroAnuncio($categoria);
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id);
//            $query->bindParam(2, $mail);
//            $query->bindParam(3, $nombre);
//            $query->bindParam(4, $jornada);                   
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en addAnuncioFiltroCursoM " . $exc->getMessage();
//            die();
//        }
//    }
//    private static function strFiltroAnuncio($categoria){
//        $sql="";
//        if($categoria!=CURSOS_PROFESORES){
//               $sql = 'INSERT INTO  filtros_'.$categoria.'(id_anuncio,mail_usuario,cod_'.$categoria.',cod_jornada) VALUES(?,?,?,?)';
//        }else{
//             $categoria= str_replace (" ","_",$categoria);
//             $sql = 'INSERT INTO  filtros_'.$categoria.'(id_anuncio,mail_profesor,cod_'.CURSOS.',cod_jornada) VALUES(?,?,?,?)';
//        }
//        return $sql;
//    }
//     public static function addAnuncioFiltroMateriaM($id,$mail,$materia,$jornada){         
//           try {              
//            self::singleton_conexion();
//            $sql = 'INSERT INTO  filtros_materias(id_anuncio,mail_usuario,cod_materia,cod_jornada) VALUES(?,?,?,?)';
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id);
//            $query->bindParam(2, $mail);
//            $query->bindParam(3, $materia);
//            $query->bindParam(4, $jornada);                   
//            self::$dbh->cerrar_conexion();
//            return $query->execute();
//        } catch (Exception $exc) {
//            echo "Error en ddAnuncioFiltroMateriaM " . $exc->getMessage();
//            die();
//        }
//    }

    public static function addAnuncioFiltroM($id, $mail, $idcategoria, $numSubcategoria, $nomSubcategoria = null) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  filtro_categoria(id_anuncio,mail_usuario,id_categoria,num_subanuncios,nombre_subcategoria) VALUES(?,?,?,?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $idcategoria);
            $query->bindParam(4, $numSubcategoria);
            $query->bindParam(5, $nomSubcategoria);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioFiltroM" . $exc->getMessage();
            die();
        }
    }

    public static function addAnuncioFicheroM($id, $name, $f, $num, $mail) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  anuncios_' . $f . '(id_anuncio,mail_usuario,numero,nombre) VALUES(?,?,?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $num);
            $query->bindParam(4, $name);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioFicheroM " . $exc->getMessage();
            die();
        }
    }

//    public static function addAnuncioAlumno($mail) {
//        try {
//            $id= self::getIdLastUser($mail);
//            self::singleton_conexion();
//            $sql = 'INSERT INTO  anuncios_alumnos(id,mail,autorizado,revisado) VALUES(?,?,0,0)';
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

    public static function listarAnuncios() {
        try {
            self::singleton_conexion();
            $sql = "SELECT * FROM anuncios";
            $query = self::$dbh->preparar($sql);
            $query->execute();
            self::$dbh->cerrar_conexion();
            while ($fila = $query->fetch()) {
                $datos[$fila['id']] = $fila;
            }

            return $datos;
//            while ($fila = mysqli_fetch_array($resultados))
//		{
//			$datos[$fila['id']]=$fila;																
//		}
//		header('Content-Type: application/json');
//		echo json_encode($datos);
        } catch (Exception $exc) {
            echo "Error en anuncios.php " . $exc->getMessage();
            throw new customException("Error en addAnuncio.php ");
            die();
        }
    }

    public static function countAnunciosRegisM($mail, $categoria = null, $subCategoria = null) {

        try {
            self::singleton_conexion();
            $sql = self::StrSQLCountRegis($categoria, $subCategoria);
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);
            if (!empty($categoria)) {
                $query->bindParam(2, $categoria, \PDO::PARAM_INT);
                if (!is_null($subCategoria)) {
                    $query->bindParam(3, $subCategoria, \PDO::PARAM_STR);
                }
            }


            self::$dbh->cerrar_conexion();
            $query->execute();
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

    public static function CountAnunciosPorNoAutorizado($categoria = null) {

        try {
            self::singleton_conexion();
            $sql = "SELECT COUNT(DISTINCT id) FROM anuncios AS a "
                    . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                    . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                    . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                    . "WHERE u.mail IN "
                    . "(SELECT mail FROM alumnos) AND a.autorizado=0 ";
            if (!is_null($categoria)) {
                $sql .= "AND f_c.id_categoria=? ";
            }
            $query = self::$dbh->preparar($sql);
            if (!is_null($categoria)) {
                $query->bindParam(1, $categoria, \PDO::PARAM_INT);
            }
            self::$dbh->cerrar_conexion();
            $query->execute();

            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return $consulta;
        } catch (Exception $exc) {
            echo "Error en CountAnunciosPorNoAutorizado " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorMailPag($mail, $inicio, $fin, $orden, $categoria = null, $subCategoria = null) {

        try {
            self::singleton_conexion();
            $sql = self::StrSQLlistarAnuncio($orden, $categoria, $subCategoria);
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail, \PDO::PARAM_STR);

            if (!empty($categoria)) {
                $query->bindParam(2, $categoria, \PDO::PARAM_INT);
                if (!is_null($subCategoria)) {
                    $query->bindParam(3, $subCategoria, \PDO::PARAM_STR);
                    $query->bindParam(4, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(5, $fin, \PDO::PARAM_INT);
                } else {
                    $query->bindParam(3, $inicio, \PDO::PARAM_INT);
                    $query->bindParam(4, $fin, \PDO::PARAM_INT);
                }
            } else {
                $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                $query->bindParam(3, $fin, \PDO::PARAM_INT);
            }
            $query->execute();
            self::$dbh->cerrar_conexion();
            $datos = null;
            $query->setFetchMode(\PDO::FETCH_NUM);

            while ($fila = $query->fetch()) {
                $datos[++$inicio] = $fila;
            }

            return $datos;
        } catch (Exception $exc) {
            echo "Error en anunciosModel.php " . $exc->getMessage();
            die();
        }
    }

    public static function listarAnunciosPorAutorizadoPag($orden, $inicio, $fin, $categoria = null) {

        try {
            self::singleton_conexion();
            $sql = "SELECT a.id,a.mail, titulo,descripcion,fecha_creacion,nombre,primer_apellido,cod_curso "
                    . "FROM anuncios AS a "
                    . "INNER JOIN filtro_jornadas AS f_j ON f_j.id_anuncio=a.id AND f_j.mail_usuario=a.mail "
                    . "INNER JOIN filtro_categoria AS f_c ON f_c.id_anuncio=a.id AND f_c.mail_usuario=a.mail "
                    . "INNER JOIN usuarios AS u ON a.mail=u.mail "
                    . "INNER JOIN alumnos AS al ON u.mail=al.mail "
                    . "WHERE u.mail IN (SELECT mail FROM alumnos) AND a.autorizado=0 ";
            if (!is_null($categoria)) {
                $sql .= "AND f_c.id_categoria=? ";
            }
            $sql .= "GROUP BY id ";
            $sql = self::StrSQLOrden($sql, $orden);
            $query = self::$dbh->preparar($sql);
            if (is_null($categoria)) {
                $query->bindParam(1, $inicio, \PDO::PARAM_INT);
                $query->bindParam(2, $fin, \PDO::PARAM_INT);
            } else {
                $query->bindParam(1, $categoria, \PDO::PARAM_INT);
                $query->bindParam(2, $inicio, \PDO::PARAM_INT);
                $query->bindParam(3, $fin, \PDO::PARAM_INT);
            }

            self::$dbh->cerrar_conexion();
            $query->execute();
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

    public static function listarAnuncioPorIdMailM($id, $mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT id,titulo,descripcion,fecha_publicacion,autorizado,id_categoria,nombre_subcategoria "
                    . "FROM anuncios AS a "
                    . "INNER JOIN filtro_categoria AS f_c ON a.id=f_c.id_anuncio AND a.mail=f_c.mail_usuario "
                    . "WHERE id=? AND mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $inicio = 0;
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

    public static function verLineaCategoriaAnuncioM($id, $mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT id_categoria,nombre_subcategoria "
                    . "FROM anuncios AS a "
                    . "INNER JOIN filtro_categoria AS f_c ON a.id=f_c.id_anuncio AND a.mail=f_c.mail_usuario "
                    . "WHERE id=? AND mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $inicio = 0;
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

    public static function editarAnuncioM($id, $mail, $titulo, $descripcion, $fechaPublicacion, $autorizado) {

        try {
            self::singleton_conexion();
            $sql = 'UPDATE  anuncios SET titulo=?,descripcion=?,fecha_creacion=now(),fecha_publicacion=? ,autorizado=? WHERE id=? AND mail=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $titulo, \PDO::PARAM_STR);
            $query->bindParam(2, $descripcion, \PDO::PARAM_STR);
            $query->bindParam(3, $fechaPublicacion, \PDO::PARAM_STR);
            $query->bindParam(4, $autorizado, \PDO::PARAM_BOOL);
            $query->bindParam(5, $id, \PDO::PARAM_INT);
            $query->bindParam(6, $mail);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

    public static function editarAnuncioAlumnoRevisar($id, $mail) {
        try {
            self::singleton_conexion();
            $sql = 'UPDATE  anuncios_alumnos SET revisado=1 WHERE id=? AND mail=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncio.php " . $exc->getMessage();
            die();
        }
    }

    public static function eliminarAnuncioM($id, $mail) {
        try {
            self::singleton_conexion();
            $sql = "DELETE FROM anuncios  WHERE id=? AND mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en eliminarAnuncioM.php " . $exc->getMessage();
            die();
        }
    }

    public static function eliminarAnuncioFiltroM($id, $mail) {

        try {
            self::singleton_conexion();
            $sql = "DELETE FROM filtro_categoria  WHERE id_anuncio=? AND mail_usuario=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioFiltroM" . $exc->getMessage();
            die();
        }
    }

    public static function eliminarFicherosM($id, $mail, $f, $num) {

        try {
            self::singleton_conexion();
            $sql = 'DELETE FROM  anuncios_' . $f . ' WHERE id_anuncio=? AND mail_usuario=? AND numero=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $mail);
            $query->bindParam(3, $num);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en eliminarFicherosM " . $exc->getMessage();
            die();
        }
    }

    public static function getCategoriaAnuncioM($id, $mail) {
        try {
            self::singleton_conexion();
            $sql = "SELECT id_categoria FROM anuncios AS a "
                    . "INNER JOIN filtro_categoria AS f_c "
                    . "ON a.id=f_c.id_anuncio AND a.mail=f_c.mail_usuario "
                    . "WHERE a.id=? AND a.mail=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }

            return null;
        } catch (Exception $exc) {
            echo "Error en verLineaPublicacionM" . $exc->getMessage();
            die();
        }
    }

    public static function getFicherosM($f, $id, $mail) {
        try {
            self::singleton_conexion();
            $sql = 'SELECT numero,nombre FROM anuncios_' . $f .'  WHERE id_anuncio=? AND mail_usuario=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            $query->bindParam(2, $mail, \PDO::PARAM_STR);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["numero"]] = $fila['nombre'];
            }

            return $datos;
        } catch (Exception $exc) {
            echo "Error en verLineaPublicacionM" . $exc->getMessage();
            die();
        }
    }

    private static function StrSQLCountRegis($categoria = null, $subCategoria = null) {
        $sql = "SELECT COUNT(*) "
                . "FROM anuncios AS a "
                . "INNER JOIN filtro_categoria AS f_c ON a.id=f_c.id_anuncio AND a.mail=f_c.mail_usuario "
                . "WHERE mail=? ";
        if (!empty($categoria)) {
            $sql .= "AND f_c.id_categoria=? ";
            if (!is_null($subCategoria)) {
                $sql .= "AND f_c.nombre_subcategoria=? ";
            }
        }

        return $sql;
    }

    private static function StrSQLlistarAnuncio($orden, $categoria = null, $subCategoria = null) {
        $sql = "SELECT id,titulo,descripcion,fecha_creacion,fecha_publicacion "
                . "FROM anuncios AS a "
                . "INNER JOIN filtro_categoria AS f_c ON a.id=f_c.id_anuncio AND a.mail=f_c.mail_usuario "
                . "WHERE mail=? ";
        if (!empty($categoria)) {
            $sql .= "AND f_c.id_categoria=? ";
            if (!is_null($subCategoria)) {
                $sql .= "AND f_c.nombre_subcategoria=? ";
            }
        }

        return self::StrSQLOrden($sql, $orden);
    }

    private static function StrSQLOrden($sql, $orden) {

        switch ($orden) {
            case 'fechaReciente':
                $sql .= "ORDER BY fecha_creacion DESC, id DESC LIMIT ?,?";
                break;
            case 'fechaAntigua':
                $sql .= "ORDER BY fecha_creacion ASC LIMIT ?,?";
                break;
            case 'fechaPublica':
                $sql .= "ORDER BY fecha_publicacion DESC, id DESC LIMIT ?,?";
                break;
            case 'titulo':
                $sql .= "ORDER BY titulo ASC LIMIT ?,?";
                break;
            case 'nombre':
                $sql .= "ORDER BY descripcion ASC LIMIT ?,?";
                break;
        }
        return $sql;
    }

    public static function addAnuncioPublicoM($mail, $categoria, $titulo, $descripcion, $fechaPublicacion) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  anuncios_publico(mail,id_categoria,titulo,descripcion,fecha_creacion,fecha_publicacion,visible) VALUES(?,?,?,?,now(),?,true)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            $query->bindParam(2, $categoria);
            $query->bindParam(3, $titulo);
            $query->bindParam(4, $descripcion);
            $query->bindParam(5, $fechaPublicacion);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioPublicoM" . $exc->getMessage();
            die();
        }
    }

    public static function addAnuncioFicheroPublicoM($id, $name, $f, $num) {

        try {
            self::singleton_conexion();
            $sql = 'INSERT INTO  anuncios_' . $f . '_publico(id_anuncio,numero,nombre) VALUES(?,?,?)';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(2, $num);
            $query->bindParam(3, $name);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en addAnuncioFicheroPublicoM " . $exc->getMessage();
            die();
        }
    }

    public static function getIdLastAnuncioM() {

        try {
            self::singleton_conexion();
            $sql = "SELECT id FROM anuncios_publico ORDER BY id DESC LIMIT 1";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $mail);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if ($consulta[0] != null) {
                return $consulta[0];
            }
        } catch (Exception $exc) {
            echo "Error en getIdLastUser " . $exc->getMessage();
            die();
        }
    }
    
//    public static function getFicherosPublicosM($f, $id, $mail) {
//        try {
//            self::singleton_conexion();
//            $sql = 'SELECT numero,nombre FROM anuncios_' . $f . '_ publico WHERE id_anuncio=?';
//            $query = self::$dbh->preparar($sql);
//            $query->bindParam(1, $id, \PDO::PARAM_INT);
//            self::$dbh->cerrar_conexion();
//            $query->execute();
//            $datos = null;
//            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
//                $datos[$fila["numero"]] = $fila['nombre'];
//            }
//
//            return $datos;
//        } catch (Exception $exc) {
//            echo "Error en verLineaPublicacionM" . $exc->getMessage();
//            die();
//        }
//    }
    
    

    public static function getFicherosPublicosM($f, $id, $mail) {
        try {
            self::singleton_conexion();
            $sql = 'SELECT numero,nombre FROM anuncios_' . $f . '_ publico WHERE id_anuncio=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id, \PDO::PARAM_INT);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $datos = null;
            while ($fila = $query->fetch(\PDO::FETCH_ASSOC)) {
                $datos[$fila["numero"]] = $fila['nombre'];
            }

            return $datos;
        } catch (Exception $exc) {
            echo "Error en verLineaPublicacionM" . $exc->getMessage();
            die();
        }
    }

    public static function eliminarFicherosPublicosM($id, $f, $num) {

        try {
            self::singleton_conexion();
            $sql = 'DELETE FROM  anuncios_' . $f . '_publico WHERE id_anuncio=? AND mail_usuario=? AND numero=?';
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            $query->bindParam(3, $num);
            self::$dbh->cerrar_conexion();
            return $query->execute();
        } catch (Exception $exc) {
            echo "Error en eliminarFicherosM " . $exc->getMessage();
            die();
        }
    }

    
    public static function contarAnuncioM($id){
          try {
            self::singleton_conexion();
            $sql =  "SELECT COUNT(*) FROM filtro_categoria where id_anuncio=?";
            $query = self::$dbh->preparar($sql);
            $query->bindParam(1, $id);
            self::$dbh->cerrar_conexion();
            $query->execute();
            $consulta = $query->fetch();
            if (!is_null($consulta[0])) {
                return $consulta[0];
            }
            return $consulta;
        } catch (Exception $exc) {
            echo "Error en getIdLastUser " . $exc->getMessage();
            die();
        }
    }
}
