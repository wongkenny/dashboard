<?php

function dbconnect(){
$servername='localhost';
$username='root';
$password='';
$database='trip planner';

$con=new mysqli($servername,$username,$password,$database);

if($con->connect_error){
    die("connection error".$con->connect_error);
}else{
    return $con;
}
}

