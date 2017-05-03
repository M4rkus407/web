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

    //saame kätte veebis olevad andmed nagu $_POST või $_GET emulatsioon
    //tegelikult need andmed on kas lingi kaudu saadud
    function get($name){
        //Kui vastava sisuga element eksisteerib andmete massiivis
        if($this->vars[$name]){
            return $this->vars[$name];
        }
        //muidu tagastame tühja väärtuse
        return false;
    }//GET

    //Lisame vajalikud väärtused veebi kujul nimi=väärtus
    function set($name, $val){
        $this->vars[$name] = $val;
    }//SET

    //Eemaldame ebavajalikud andmed veebist algus
    function del($name){
        if(isset($this->vars[$name])){
            unset($this->vars[$name]);
        }
    }//Eemaldame ebavajalikud andmed veebist algus lõpp
    
    //Suunamine algus
    function redirect($url = false){
       global $sess;
        $sess->flush();
        //Kui $url on false suunatakse pealehele
        if($url == false){
            $url = $this->getLink();
        }
        $url = str_replace('&amp;', '&', $url);
        header('Location: '.$url);
        exit;
    }//Suunamise lõpp
    
} //Klassi lõpp
?>