<?php 

/* DBZ MODELE KAMEHAMEHA */

class Model
{
  
  private $_pdo = NULL;
  
  public function __construct($pdo)
  {
    $this->_pdo = $pdo;
  }

  // Use selected db
  public function Use_BDD($bdd)
  {
    $sql = "USE ".$bdd;
    $req = $this->_pdo->prepare($sql);
    $req->execute();
  }
  
  // db name
  public function Name_DB()
  {
    $sql = "select database()";
    $req = $this->_pdo->prepare($sql);
    return $req->fetchColumn();
  }

  // list table
  public function List_Base()
  {
    $sql = "show databases";
    $res = $this->_pdo->prepare($sql);
    $res->execute();
    return $res->fetchAll();
  }
  
  // list table
  public function List_Table()
  {
    $sql = "show tables";
    $res = $this->_pdo->prepare($sql);
    $res->execute();
    return $res->fetchAll();
  }

  // List donnee
  public function List_Donnee()
  {
    $sql = "select * FROM ".$_GET['T'];
    $res = $this->_pdo->query($sql);
    return $res->fetchAll(PDO::FETCH_ASSOC);
  }
}

?>
