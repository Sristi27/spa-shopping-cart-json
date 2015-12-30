<?php

require_once 'config.php'; 

if(!mysql_connect(DB_HOST,DB_USERNAME,"system"))
{
     die('oops connection problem ! --> '.mysql_error());
}
if(!mysql_select_db(DB_NAME))
{
     die('oops database selection problem ! --> '.mysql_error());
}
?>