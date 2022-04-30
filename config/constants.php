<?php 
define("servername","localhost");
define("username","root");
define("password","");
define("dbname","worldtime_db");

$conn=mysqli_connect(servername,username,password,dbname);

if(mysqli_connect_error()){
    echo "There is an connection error!";
}
session_start();
?>