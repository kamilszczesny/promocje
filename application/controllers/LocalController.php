<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LocalController
 *
 * @author Kamil
 */
class Application_Controller_LocalController extends Zend_Controller_Action{
    public function mapArrayToObject($array, $object){
        foreach($array as $key=>$item){
            if(property_exists($object,$key)){
                echo(gettype($object->$key));
            }
        }
    }
}

?>
