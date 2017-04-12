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
define('LIB_DIR', 'lib/'); //Lib kataloogi nime konstant
define('ACTS_DIR', 'acts/'); //acts kataloogi nime konstant
define('DEFAULT_ACT', 'default'); //vaikimisi tegevuse  faili nime konstant
define('DEFAULT_LANG', 'et'); //vaikimisi keele konstant
define('LANG_DIR', 'lang/');

//Võtame kasutusse vajlikud abi failid
require_once LIB_DIR.'utils.php';
require_once 'db_conf.php';

//Võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';
require_once CLASSES_DIR.'linkobject.php';
require_once CLASSES_DIR.'mysql.php';

//Loome vajalikud objektid
$http = new linkobject();
$db = new mysql(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Language support
//sites used langs
$siteLangs = array(
    'et' => 'estonian',
    'en' => 'english',
    'ru' => 'russian',
);
//get lang_id form url
$lang_id = $http->get('lang_id');
if(!isset($siteLangs[$lang_id])){
    //if such lang id is not supported
    $lang_id = DEFAULT_LANG;
    $http->set('lang_id', $lang_id);
}
define('LANG_ID', $lang_id);

$lang_id = DEFAULT_LANG;
$http->set('lang_id', $lang_id);


?>