<?php

/* DBZ VIEW */

class View {

    public function __construct () { }

    // menu list of table link
    public static function MenuTable ($db_name, $array_table) {
      $menu = "<div>DB : ".$db_name;

      foreach ($array_table as $K => $TABLE) {
        $menu .= " <a href='?T=".$TABLE[0]."'>[ ".strtoupper($TABLE[0])." ]</a>";
      }

      $menu .= "</div>";

      return $menu;
    }

    public static function AfficheTable($array_cont){
      $page = "<div>";

      foreach ($array_cont as $K => $TABLE) {
        foreach ($TABLE as $key => $value) {
          $page .=strtoupper($value)." ";
        }
        $page .=  "<br>";
      }

      $page .= "</div>";

      return $page;
    }

    // html final rendering
    public static function HTML ($title, $contener) {
      echo "<html>
      <head>
        <title>".$title."</title>
        <link rel='stylesheet' type='text/css' href='Fichiers/css/style.css' />
      </head>
      <body>
        <img src='Fichiers/images/logo.png' /><br /><hr />
        </hr>".$contener."<br>
      </body>
      </html>";
    }

}

?>
