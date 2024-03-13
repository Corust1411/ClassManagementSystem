<?php
class pageDB extends SQLite3
{
   function __construct()
   {
      $this->open('../system/nnew.db');
   }
}

// 2. Open Database 
$db = new pageDB();
if (!$db) {
   echo $db->lastErrorMsg();
} else {
   // echo "Opened database successfully<br>";
}
