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
  public function List_Donnee($table)
  {
    $sql = "select * FROM ".$table;
    $res = $this->_pdo->query($sql);
    $data = $res->fetchAll(PDO::FETCH_ASSOC);
    $data['PRIMARY'] = $this->Get_PK($table);
    //var_dump($data);
    return $data;
  }

  public function Suppr_Donnee($table, $id)
  {
    $PK = $this->Get_PK($table);
    $sql = 'DELETE FROM '.$table.' WHERE '.$PK.' = :id';
    $req = $this->_pdo->prepare($sql);
    $req->execute([":id" => $id]);
    return $req->rowCount();
  }

  public function Get_PK($table)
  {
    $sql = 'show index from '.$table.' where Key_name = "PRIMARY"';
    $req = $this->_pdo->prepare($sql);
    $req->execute();
    $data = $req->fetch(PDO::FETCH_ASSOC);
    return $data['Column_name'];
  }
}

?>
