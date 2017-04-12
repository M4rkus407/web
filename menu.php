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
//Menüü sql lause
$sql = 'SELECT content_id, title FROM content WHERE '.'parent_id='.fixDb(0).' AND show_in_menu='.fixDb(1);
//Saame päringu tulemuse
$res = $db->getArray($sql);
//Kontrollin tulemuse sisu
if($res != false) {
    foreach ($res as $page) {
        //nimetame menüüs väljastatava elemendi
        $item->set('name', $page['title']);
        //loome antud menüü elemendi lingi
        $link = $http->getLink(array('page_id' => $page['content_id']));
        //Lisame antud lingi menüüsse
        $item->set('link', $link);
        //Lisame valmis lingi menüü objekti sisse
        $menu->add('items', $item->parse());
    }
}










//Kontrollime  objekti olemasolu ja sisu
$main_tmpl->add('menu', $menu->parse()); //Kui soovime pidevat asendamist, siis on vaja kasutada SET, ADD'i asemel
?>