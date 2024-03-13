<?php
class acadSystemDB extends SQLite3
{
   function __construct()
   {
      $this->open('../../system/nnew.db');
   }
}

// 2. Open Database 
$db = new acadSystemDB();
if (!$db) {
   echo $db->lastErrorMsg();
} else {
   echo "Opened database successfully<br>";
}
