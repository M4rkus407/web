<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 29.03.2017
 * Time: 14:22
 */
class linkobject extends http
{ //Klassi algus
    //Klassi muutujad- omadused
    var $baseUrl = false;
    var $delim = '&amp;';
    var $eq = '=';
    var $protocol = 'http://';

    //Klassi meetodid
    //Klassi konstruktor algus
    function __construct(){
        parent::__construct();//Kutsume tööle http konstruktori
        //Loome põhi link'i
        $this->baseUrl = $this->protocol.HTTP_HOST.SCRIPT_NAME;
    }//Konstruktori lõpp

    //Andmete paarikoostamine kujul
    //nimi=väärtus&nimi=väärtus jne
    function addToLink(&$link, $name, $val){
        if($link != ''){
            $link = $link.$this->delim;
        }
        $link = $link.fixUrl($name).$this->eq.fixUrl($val);
        echo $link;
    } //add to link lõpp
} //Klassi lõpp