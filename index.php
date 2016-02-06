<?php 

/* DBZ FRONTAL CONTROLLER
** MVC CMS for database management */

// configuration
require_once("Config/config.script.php");

// connection db
require_once("Classes/pdo.connexion.class.php");
$pdo = new Pdo_Connexion($config['DB_INI_FILE']);

// model class
require_once("Classes/model.class.php");
$model = new Model($pdo->_cnx);

// view class
require_once("Classes/view.class.php");

// html output increment
$output = NULL;

// set the menu based on tables
if(count($_GET) >= 1)
{
	$ordre = ["", "B", "T", "I", "A"];
	$lien = "";
	for($i=0; $i != count($_GET); $i++)
	{
		if($i != 0)
		{
			$lien .= "&";
			$lien .= $ordre[$i]."=".$_GET[$ordre[$i]];
		}
	}
	echo '<a href="index.php?'.$lien.'">Retour</a><br/>';
}

if(isset($_GET['B']) || isset($_GET['T']))
{
	$model->Use_BDD($_GET['B']);
}
if(isset($_GET['A']))
{
	if($_GET['A'] == "S")
	{
		$model->Suppr_Donnee($_GET['T'], $_GET['I']);
		header("Location: index.php?B=".$_GET['B']."&T=".$_GET['T']);
	}
}
elseif(isset($_GET['T']))
{
	$output .= View::MenuDonnee($_GET['B'], $_GET['T'], $model->List_Donnee($_GET['T']));
}
elseif(isset($_GET['B']))
{
	$output .= View::MenuTable($_GET['B'], $model->List_Table());
}
else
{
	$output .= View::MenuBase($model->List_Base());
}




// output echo screen rendering 
View::HTML($config['MODULE_NAME'], $output);

?>
