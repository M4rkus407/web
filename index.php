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
$main_tmpl->set('content', 'Lehe sisu');
//Kontrollin  antud objekti sisu
echo '<pre>';
print_r($main_tmpl);
echo '</pre>';
?>