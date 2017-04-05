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
//Valmistame paarid malli_element => väärtus
$main_tmpl->set('user', 'Kasutajanimi');
$main_tmpl->set('title', 'Pealeht');
$main_tmpl->set('lang_bar', 'Keeleriba');
$main_tmpl->set('menu', 'Lehe peamenüü');
//Kustsume menüü tööle testimiseks
require_once 'menu.php';
//Tõstsime vaikimisi väljundi default tegevuse sisse
require_once 'act.php';
$main_tmpl->set('site_title', 'Veebiprogrammeerimise kursus');
//Kontrollin  antud objekti sisu
echo $main_tmpl->parse();
//kutsume menüü tööle testimiseks

?>