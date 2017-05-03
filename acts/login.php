<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 3.05.2017
 * Time: 9:09
 */
//Loome sisselogimisvormi objekti
$login = new template('login');

$error = $sess->get('error');
$login->set('error', $error);

//paneme reaalsed väärtused template elementidele
$login->set('kasutajanimi', 'Kasutaja');
$login->set('parool', 'Parool');
$login->set('nupp', 'Logi sisse');

//Loome lingi sisselogimisvormi töötlemiseks
$link = $http->getLink(array('act' => 'login_do'));
$login->set('link', $link);

//paneme sisu template sisse
$main_tmpl->set('content', $login->parse());