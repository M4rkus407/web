<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 22.03.2017
 * Time: 15:26
 */
//Loome menüü mallide objektid
$menu = new template('menu.menu');
$item = new template('menu.item');
//Lisame sisu
//nimetame menüüs väljastatava elemendi

$item->set('name', 'esimene');
//loome antud menüü elemendi lingi
$link = $http->getLink(array('act'=>'first'));
//Lisame antud lingi menüüsse
$item->set('link', $link);
//Lisame valmis lingi menüü objekti sisse
$menu->set('items', $item->parse());
//
$item->set('name', 'teine');
$link = $http->getLink(array('act'=>'second'));
$item->set('link', $link);
$menu->add('items', $item->parse());

//Kontrollime  objekti olemasolu ja sisu
$main_tmpl->add('menu', $menu->parse()); //Kui soovime pidevat asendamist, siis on vaja kasutada SET, ADD'i asemel
?>