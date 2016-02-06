<?php

/* DBZ PDO CONNEXION */

class Pdo_Connexion
{

	public $_cnx = null;

	public function __construct($ini_file)
	{
		if(file_exists($ini_file))	$this->_cnx = $this->LoadIni ($ini_file);
	}

	// db connexion vars stored inifile
	private function LoadIni($file)
	{
		$ini_array = parse_ini_file($file);
		if ((isset($ini_array['USER_db']) && !empty($ini_array['USER_db']))
		&& (isset($ini_array['PASS_db']) && !empty($ini_array['PASS_db']))
		&& (isset($ini_array['HOST_db']) && !empty($ini_array['HOST_db'])))
		{
			try
			{
				$dbh = new PDO("mysql:host=".$ini_array['HOST_db'], $ini_array['USER_db'], $ini_array['PASS_db'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
				return $dbh;
			}
			catch(PDOException $e)
			{
				echo "Connexion à la base de données impossible.";
				die();
			}
		}
	}
}

?>
