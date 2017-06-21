<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Config;

/**
 * Description of Hash
 *
 * @author Edward
 */
class Hash {
    //put your code here
    
    /**
     * 
     * @param type $algoritmo
     * @param type $data
     * @param type $key
     * @return type
     */
    public static function getHash($algoritmo,$data,$key){
      $hash= hash_init($algoritmo,HASH_HMAC,$key);
      hash_update($hash,$data);
      return hash_final($hash);
    }
}
