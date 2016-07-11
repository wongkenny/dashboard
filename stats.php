<?php
include 'config/functions.php';

$request=$_GET['request']; //Fetch data from dashboard.php

switch($request){
    case 'trip': 
     echo fetch_trip_number();
        break;
    
    case 'reservation': 
     echo fetch_reservation_number();
        break;
    
    case 'hotel': 
     echo fetch_hotel_number();
        break;
    
    case 'user': 
     echo fetch_user_number();    
        break;
    
    default:
        echo '0';
}
