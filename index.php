<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 15.03.2017
 * Time: 13:08
 */
// võtame konfiguratsiooni kasutusele
require_once 'conf.php';
// pea lehe sisu
echo '<h1>Veebiprogrammeerimise esileht</h1>';

//Valmistame peatemplate objekti
$main_tmpl = new template('main');

//require language control
require_once('lang.php');


//create and output menu
//import menu file


//Valmistame paarid malli_element => väärtus
$main_tmpl->set('user', $sess->user_data['username']);
$main_tmpl->set('title', tr('Pealeht'));
//$main_tmpl->set('lang_bar', LANG_ID);
$main_tmpl->set('menu', tr('Lehe peamenüü'));
//Kustsume menüü tööle testimiseks
require_once 'menu.php';
//Tõstsime vaikimisi väljundi default tegevuse sisse
require_once 'act.php';
$main_tmpl->set('site_title', 'Veebiprogrammeerimise kursus');
//Kontrollin  antud objekti sisu
echo $main_tmpl->parse();
//uuendame sessiooni andmed
$sess->flush();
?>