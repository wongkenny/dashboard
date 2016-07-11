<?php
include_once 'database.php';

function fetch_user_full_name($sessionname){
    $con=dbconnect();
    $sql="select fullname from registration where username ='$sessionname' limit 1";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['fullname'];
    }
}

function fetch_user_registered_date($sessionname){
    $con=dbconnect();
    $sql="select registered_date from registration where username ='$sessionname' limit 1";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        $month=date('F Y',strtotime($row['registered_date']));
        return $month;
    }
}

function fetch_trip_number(){
    $con=dbconnect();
    $sql="SELECT count(`name`) as total FROM `markers`";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['total'];
    }
}

function fetch_reservation_number(){
    $con=dbconnect();
    $sql="SELECT count(`reservation_id`) as total FROM `reservation`";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['total'];
    }
}

function fetch_hotel_number(){
    $con=dbconnect();
    $sql="SELECT count(`hotel_id`) as total FROM `hotel`";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['total'];
    }
}

function fetch_user_number(){
    $con=dbconnect();
    $sql="SELECT count(`registration_id`) as total FROM `registration`";
    $result=$con->query($sql);
    if($result->num_rows > 0){
        $row=$result->fetch_assoc();
        return $row['total'];
    }
}