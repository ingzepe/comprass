<?php

/*
 * © 2016 - 2016 by Grupo Promass. Todos los derechos reservados
 * http://www.grupopromass.com/
 */

namespace Seguridad\Model;

/**
 * Description of capacidades
 *
 * @author Enrique Zepeda Cruz
 *  Created on 26-feb-2016, 13:23:26 
 */
class capacidades {

    public $id;
    public $artist;
    public $title;

    public function exchangeArray($data) {
        $this->id = (!empty($data['ID_USUARIO'])) ? $data['ID_USUARIO'] : null;
        $this->artist = (!empty($data['NOMBRE'])) ? $data['NOMBRE'] : null;
        $this->title = (!empty($data['ACTIVO'])) ? $data['ACTIVO'] : null;
    }

    public function toArray() {
//        return $this->_data;
    }
    
     function getJsonData(){
        $var = get_object_vars($this);
        foreach($var as &$value){
           if(is_object($value) && method_exists($value,'getJsonData')){
              $value = $value->getJsonData();
           }
        }
        return $var;
     }

}
