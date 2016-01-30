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
  
  // list table
  public function List_Table () {
    $SQL = "show tables";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }

  //list all values
  public function List_Values($table){
    $SQL = "select * from :table";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute([":table" => $table]);
    return $RES->fetchAll();
  }
  
}

?>
