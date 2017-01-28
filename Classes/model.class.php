<?php 

/* DBZ MODELE KAMEHAMEHA */

class Model {
  
  private $PDO = NULL;
  
  public function __construct ($pdo) {
    $this->PDO = $pdo;
  }
  
  // db name
  public function Name_DB () {
    return $this->PDO->Query('select database()')->fetchColumn();
  }
  
  // db list
  public function List_DB () {
	$SQL = "show databases";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }
  
  // table list
  public function List_Table () {
    $SQL = "show tables";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }
  // field list
  public function List_Field ($table) {
    $SQL = "show columns from ".$table;
    $RES = $this->PDO->prepare($SQL);
	$RES->execute();
    return $RES->fetchAll();
  }
  
}

?>