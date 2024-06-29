<?php
    date_default_timezone_set('Asia/Kathmandu');

    $database = mysqli_connect('127.0.0.1','root','','localshop');
    if(!$database){
        die("Connection Failed". mysqli_connect_error());
    }
?>