<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */

// configuration
require_once("Config/config.script.php");

// connexion db
require_once("Classes/pdo.connexion.class.php");
$PDO = new Pdo_Connexion ($CONFIG['DB_INI_FILE']);

// model class
require_once("Classes/model.class.php");
$MODEL = new Model ($PDO->CNX);

// view class
require_once("Classes/view.class.php");

// html output increment
$OUTPUT = NULL;

// list DB menu
$OUTPUT .= View::MenuDB ($MODEL->List_DB());

// set the menu based on tables
if (isset($_GET['DB'])) {
	$OUTPUT .= View::MenuTable ($MODEL->Name_DB(), $MODEL->List_Table());
	if (isset($_GET['TB'])) {
		$OUTPUT .= View::MenuField ($_GET['TB'], $MODEL->List_Field($_GET['TB']));
		}
	}

// output echo screen rendering 
View::HTML($CONFIG['MODULE_NAME'], $OUTPUT);

?>