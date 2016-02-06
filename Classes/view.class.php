<?php 

/* DBZ VIEW */

class View
{  
  public function __construct (){}

  // menu list of db link
  public static function MenuBase($array_base)
  {
    $menu = "<div>Liste Base de donnée : ";
    
    foreach ($array_base as $K => $base)
    {
      $menu .= " <a href='?B=".$base[0]."'>[ ".strtoupper($base[0])." ]</a>";
    }
    
    $menu .= "</div>";
    
    return $menu;
  }

  // menu list of table link
  public static function MenuTable($db_name, $array_table)
  {
    $menu = "<div>DB : ".$db_name;
    
    foreach ($array_table as $K => $table)
    {
      $menu .= " <a href='?B=".$db_name."&T=".$table[0]."'>[ ".strtoupper($table[0])." ]</a>";
    }
    
    $menu .= "</div>";
    
    return $menu;
  }

  // list of data from table
  public static function MenuDonnee($db_name, $table, $array_donnee)
  {
    $head = '<tr>';
    $body = "";
    foreach($array_donnee as $num_ligne => $ligne)
    {
      if($num_ligne !== "PRIMARY")
      {
        $body .= '<tr>';
        foreach($ligne as $k => $v)
        {
            $head .= ($num_ligne == 0)? '<th>'.$k.'</th>' : "";
            $body .= '<td>'.$v.'</td>';
        }
        $id = $ligne[$array_donnee['PRIMARY']];
        $head .= ($num_ligne == 0)? '<th>Supprimer</th>' : "";
        $body .= '<td><a href="?B='.$db_name.'&T='.$table.'&I='.$id.'&A=S">X</a></td>';
        $body .= '</tr>';
      }
    }
    $head .= '</tr>';

    $menu = '<table><thead>'.$head.'</head><tbody>'.$body.'</tbody></table>';
    return $menu;
  }
  
  // html final rendering
  public static function HTML($title, $contener)
  {
    echo "<html>
    <head>
      <title>".$title."</title>
      <link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
    </head>
    <body>
      <img src='Fichiers/images/logo.jpg' /><br /><hr />
      </hr>".$contener."
    </body>
    </html>";
  }
}

?>
