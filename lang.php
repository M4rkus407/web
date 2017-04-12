<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 12.04.2017
 * Time: 11:55
 */
//defineerime eraldaja template abil
$sep = new Template('lang.sep');
$sep = $sep->parse();
$count = 0;
//Kõik keeled on meil confis keelemassiivis kujul - et=>nimi
foreach ($siteLangs as $lang_id => $lang_name){
    //suurendame keele eraldajate joonistamiseks
    $count++;
    //kui tegu on aktiivse keelega, kasutame aktiivset malli
    if($lang_id == LANG_ID){
        $item = new Template('lang.item');
    }
    //muidu tavaline mall
    else{
        $item = new Template('lang.item');
    }
    //Keelte vahel clickimiseks oleks vaja tekitada link, mille sisse lähevad
    //add massiivina keel, aie massiivina tegevus, menüü element,
    //not massiivina keelevalik
    $link = $http->getLink(array('lang_id'=>$lang_id), array('act', 'page_id'), array('lang_id'));
    $item->set('link', $link);
    $item->set('name', $lang_name);
    $tmpl->add('lang_bar', $this->parse());

    //keele eraldamiseks paneme separaatori, aga viimase keele pärast me separaatorit ei pane
    if($count < count($siteLangs)){
        $tmpl->add('lang_bar', $sep);
    }

}