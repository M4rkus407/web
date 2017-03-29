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
define('LIB_DIR', 'lib/');

//Võtame kasutusse vajlikud abi failid
require_once LIB_DIR.'utils.php';

//Võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';
require_once CLASSES_DIR.'linkobject.php';

//Loome vajalikud objektid
$http = new linkobject();
//Testime link objekti tööd

echo $http->baseUrl.'<br />';
echo $http->getLink(array('kasutaja'=>'admin', 'pass'=>'qwerty'));
//echo '<pre>';
//print_r($http)
//echo '</pre>';
?>