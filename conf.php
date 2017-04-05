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
define('ACTS_DIR', 'acts/'); //acts kataloogi nime konstant
define('DEFINE_ACT', 'default'); //vaikimisi tegevuse  faili nime konstant

//Võtame kasutusse vajlikud abi failid
require_once LIB_DIR.'utils.php';

//Võtame kasutusele vajalikud failid
require_once CLASSES_DIR.'template.php';
require_once CLASSES_DIR.'http.php';
require_once CLASSES_DIR.'linkobject.php';

//Loome vajalikud objektid
$http = new linkobject();

?>