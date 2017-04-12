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
    
    var $aie = array('lang_id');

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
    } //add to link lõpp

    //teeme link'i valmis algus
    function getLink($add = array(), $aie =array(), $not = array()){
        $link = '';
        foreach ($add as $name=>$val){
            $this->addToLink($link, $name, $val);
        }
        //juhul kui antud element juba meie lehel ette defineeritud
        foreach ($aie as $name){
            $val = $this->get($name);
            if($val != false){
                $this->addToLink($link, $name, $val);
            }
        }
        //Juhul kui antud objektis see väärtus juba määratud
        foreach ($this->aie as $name){
            $val =  $this->get($name);
            //kontroll
            if($val != false and !in_array($name, $not)){
                $this->addToLink($link, $name, $val);
            }
        }

        if($link != ''){
            $link = $this->baseUrl.'?'.$link;
        } else {
            $link = $this->baseUrl;
        }
        return $link;
    }//Lingi valmistamise lõpp
} //Klassi lõpp