<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 29.03.2017
 * Time: 14:47
 */
function fixUrl($val){
    return urldecode($val);
}
function fixDb($val){
    return '"'.addslashes($val).'"';
}
?>