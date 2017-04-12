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



?>