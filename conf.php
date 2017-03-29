<?php
/**
 * Created by PhpStorm.
 * User: markus.reimann
 * Date: 15.03.2017
 * Time: 15:25
 */
// defineerime vajalikud konstandid
define('CLASSES_DIR', 'classes/'); //classes kataloogi konstant
define('TMPL_DIR', 'tmpl/'); // tmpl kataloogi konstant

//Võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';

//Loome vajalikud objektid
$http = new http();
//Testime http objekti tööd

echo REMOTE_ADDR
?>