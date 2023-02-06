<?php
include('dbcon.php');


mysql_query("grant create any table to 'localhost','root'") or die(mysql_error());

?>