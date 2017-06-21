<?php

namespace Config;

/* El patron singleton puede ser muy util en php porque gracias a el
  con una unica instacia del objeto podemos acceder a el las veces que
 * necesitemos, eso significa que no haremos usi innecesario de recursos
 * ya que no estaremos creando nuevos  objetos cada vez que lo necesitemos */

class Conexion {

    private static $instancia;
    private  $dbh;

    //usaremos $this-> dbh porque es un valor no statico.
    //usaremos self::$instancia para valores estaticos.

     private function __construct() {
        //Un constructo privado evita la construccion de un nuevo objeto
        //con lo que evitamos consumir recursos del sistema innecesarios.
        //Esto es lo que se conoce como patro Singleton. Pero es importante
        //que este netidi sea privado, al igual que las propiedades.

        try {

              $host = "localhost";
            $database = "tablon_anuncios";
            $usuario = "dwes";
            $password = "1234";

            $this->dbh = new \PDO("mysql:host=$host;dbname=$database", $usuario, $password);
            

//            $this->dbh = new \PDO(
//                    "mysql:host=" . DB_HOST .
//                    ";dbname=" . DB_NAME, DB_USER, DB_PASS);
//

            if ($this->dbh) {
                //Para evitar problemas de ñ y acentos
                $this->dbh->exec("SET CHARACTER SET utf8");
                //Se puede hacer tambien:
                $this->dbh->query("SET NAMES 'utf8'");
            } else {
                echo "Error en la conexion con el servidor";
            }
//             throw new Exception('Error de conexiooooooooooooooooooon');
        } catch (PDOException $e) {
            echo "Error en la conexion.class.php!: " . $e->getMessage();
            die();
        }
    }

    protected static function singleton_conexion() {
        /* Aqui preguntamos si la instancia de la conexion no ha sido
          creada anteriormente en caso de que haya sido creada
         * no la volemos a crear y devolvemos el atributo $instancia
         * tal y como esta actualmente         */
        if (!isset(self::$instancia)) {
            /* __CLASS__ es una constante magica predefinida de php
              se pueden ver todas las constantes en */
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    //Evita que el objeto se puede clonar
    protected function __clone() {
        trigger_error('La clonacion de este objeto no está permitida', E_USER_ERROR);
    }

    protected function cerrar_conexion() {
        $this->dbh = null;
        self::$instancia = null;
    }

    protected function preparar($sql) {
        return $this->dbh->prepare($sql);
    }

    protected function lastID() {
        return $this->dbh->lastInsertId();
    }

   
}
?>

