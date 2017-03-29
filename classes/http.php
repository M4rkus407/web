<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 29.03.2017
 * Time: 13:45
 */
class http
{ //Klassi algus
    //Klassi muutujad
    var $vars = array(); //hhtp päringute andmed
    var $server = array(); //serveri masina andmed
    //Klassi meetodid
    //Paneme paika algandmed
    function init(){
        $this->vars = array_merge($_GET, $_POST, $_FILES);
        $this->server = $_SERVER;
    }//Init
} //Klassi lõpp
?>