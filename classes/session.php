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

    //Sessiooni loomine algus
    function createSession($user = false){
        //Kui kasutaja on anonüüme
        if($user == false){
            //Tekitame andmed session tabeli jaoks - algus
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonymous'
            );
        }//Anonüümne kasutaja lõpp
        //Unikaalse sessiooni id loomine
        $sid = md5(uniqid(time().mt_rand(1, 1000), true));
        //päring sessiooni andmete salvestamiseks andmebaasi
        $sql ='INSERT INTO session SET'.
            'sid='.fixDb($sid).', '.
            'user_id='.fixDb($user['user_id']).', '.
            'user_data='.fixDb(serialize($user)).', '.
            'login_ip='.fixDb(REMOTE_ADDR).', '.
            'created=NOW()';
        //Sisestame päringu andmebaasi
        $this->db->query($sql);
        //määrame sid ka antud klassi muutujale var $sid
        $this->sid =$sid;
        //paneme antud väärtuse ka veebi - lehtede vahel kasutamiseks
        $this->http->set('sid', $sid);


    }//Sessiooni loomine lõpp
}//Klassi lõpp