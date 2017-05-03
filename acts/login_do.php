<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 3.05.2017
 * Time: 9:38
 */
//Võtame vormi poolt edastatud andmed
$username = $http->get('kasutaja');
$passwd = $http->get('parool');

//koostame päringu
$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDb($username).
    ' AND password='.fixDb(md5($passwd));
$res = $db->getArray($sql);

//Teeme päringu tulemuse kontrolli
if($res == false){
    //Loome veateate ja paneme selle sessiooni
    $sess->set('error', 'Probleem sisselogimisega');
    //Siis tuleb kasutaja suunata tagasi sisselogimisvormi
    $link = $http->getLink(array('act' => 'login'));
    $http->redirect($link);
} else {
    //Siis tuleb avada kasutaja sessioon
    $sess->createSession($res[0]);
    //Tuleb suunata kasutajad pealehele
    //Kui ma väljastan kasutajaandmed sessiooni kontrolliks
    $http->redirect();
}