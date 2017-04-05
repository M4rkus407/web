<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 5.04.2017
 * Time: 9:03
 */
$act = $http->get('act'); //Küsime hetkel valitud tegevust
//Koostame otsitava faili nime failisüsteemi jaoks
$fn = ACTS_DIR.str_replace('.', '/', $act).'.php';
//Kui selline fail olemas ja lugemiseks lubatud
if (file_exists($fn) and is_file($fn) and is_readable($fn)) {
    //Loeme sisu
    require_once $fn;
    } else {
        $fn = ACTS_DIR.DEFAULT_ACT.'.php'; //Koostame vaikimisi oleva faili nime
        $http->set('act', DEFAULT_ACT); //paneme act väärtuseks default- act=default
        require_once  $fn;
}
?>

