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

    //Klassi konstruktor
    function  __construct(){
        $this->init();
        $this->initCont();
    }

    //Paneme paika algandmed
    function init(){
        $this->vars = array_merge($_GET, $_POST, $_FILES);
        $this->server = $_SERVER;
    }//Init

    //defineerime vajalikud konstandid
    function initCont(){
        $consts = array('REMOTE_ADDR', 'HTTP_HOST', 'PHP_SELF', 'SCRIPT_NAME');
        foreach ($consts as $const){
            if(!defined($const) and isset($this->server[$const])){
                define($const, $this->server[$const]);
            }
        }
    }//INIT CONST

} //Klassi lõpp
?>