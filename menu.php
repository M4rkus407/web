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
$item->set('name', 'esimene');
$menu->set('items', $item->parse());
$item->set('name', 'teine');
$menu->add('items', $item->parse());
//Kontrollime  objekti olemasolu ja sisu
echo '<pre>';
print_r($menu);
print_r($item);
echo '<pre>';
?>