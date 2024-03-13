<?php
class systemDB extends SQLite3
{
   function __construct()
   {
      $this->open('nnew.db');
   }
}

// 2. Open Database 
$db = new systemDB();
if (!$db) {
   echo $db->lastErrorMsg();
} else {
   //  echo "Opened database successfully<br>";
}
