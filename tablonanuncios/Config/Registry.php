<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;

/**
 * Description of Registry
 *
 * @author Edward
 */
class Registry {

    //put your code here

    private static $instancia;
    private $dbh;
    private $obj;

    private $contador;
    //No se puede instaciar la clase
    private function __construct() {
        $this->contador =0;
    }

    public static function singleton() {
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

   
    public function __clone() {
        trigger_error("Operación Invalida: No puedes clonar una instancia de " . get_class($this) . " class.", E_USER_ERROR);
    }

    public function __wakeup() {
        trigger_error("No puedes deserializar una instancia de " . get_class($this) . " class.");
    }

    public function __sleep() {
        trigger_error("No puedes serializar una instancia de " . get_class($this) . " class.");
    }

    /**
     * 
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value) {        
        $this->dbh[$name] = $value;
    }

    /**
     * 
     * @param type $name
     * @return boolean
     */
    public function __get($name) {
          
        if (isset($this->dbh[$name])) {
            return $this->dbh[$name];
        }
        return false;
    }

    /**
     * 
     * @param type $obj
     * @return type
     */
    public static function objControllerRegistry($obj) {     
       return Registry::singleton()->$obj=new $obj;
    
       
        
        
    }
    
}

$registry = Registry::singleton();
$registry->request = new Request();
$registry->view = new View($registry->request);

