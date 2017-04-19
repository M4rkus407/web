<?php

/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 19.04.2017
 * Time: 8:53
 */
class session
{//Klassi algus
    //Klassi muutujad
    var $sid = false; //Sessiooni  id
    var $vars = array(); //Sessiooni ajal tekkivad andmed
    var $http = false; //objekt veebiandmete kasutamiseks
    var $db = false; //objekt andmebaasi kasutamiseks
    //Kui anonüümne lubatud ei ole - var $anonymous = false;
    var $anonymous = true; //anonüümne kasutaja on lubatud

    //Klassi muutujad lõpp
    //Konstruktor algus
    function __construct(&$http, &$db){
        $this->http = &$http;
        $this->db = &$db;
    }//Konstruktor lõpp
}//Klassi lõpp