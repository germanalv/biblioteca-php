<?php
/* Conexxion a BD */
function connDB(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "biblioteca";
    return new mysqli($dbhost, $dbuser, $dbpass, $dbname);
}



?>