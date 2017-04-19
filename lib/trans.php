<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 19.04.2017
 * Time: 8:37
 */
function tr($txt){
    static $trans = false;
    if(LANG_ID == DEFAULT_LANG){
        return $txt;
    }
    //Kui ei ole, siis otsin vajaliku lang faili
    if($trans === false){
        $fn = LANG_DIR.'lang_'.LANG_ID.'.php';
        if(file_exists($fn) and is_file($fn) and is_readable($fn)){
            require_once($fn);
            $trans = $_trans;
        }
        else{
            $trans = array();
        }
    }
    if (isset($trans[$txt])){
        return $trans[$txt];
    }
    //juhul kui vastust ei ole, siis tagastatakse algtekst
    return $txt;
}
?>