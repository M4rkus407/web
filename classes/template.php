<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 22.03.2017
 * Time: 12:11
 */
class template
{ //Klassi algus
    // template klassi omadused-muutujad
    var $file = ''; //html mall faili nimi
    var $content = false; //html mall faili sisu
    var $vars = ''; //html vaate sisu- reaalsed väärtused
    //Klassi tegevused- meetodid- funktsioonid
    //Loeme sisu html malli failist
    function readFile($f){
        $this->content = file_get_contents($f);
    }//ReadFile'i lõpp
}//Klassi lõpp