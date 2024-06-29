<?php
    include_once "database.php";
        
    $jsonData = $_GET['data'];
    $data = json_decode($jsonData, true);
    
    if($data){
        $customerNumber = $data['data']['customerNumber'];
        $items = $data['data']['items'];

        $numberQuery = mysqli_query($database, "SELECT * from `customers` WHERE phonenumber = {$customerNumber}");

        if(mysqli_num_rows($numberQuery) > 0){
            echo "Record Founded";

            date_default_timezone_set('Asia/Kathmandu');
            $currentTimestamp = date('Y-m-d h:i:s');

            foreach($items as $item){
                $itemName = $item['itemName'];
                $itemQuantity = $item['itemQuantity'];
                $itemPrice = $item['itemPrice'];

                $addItems = mysqli_query($database,"INSERT INTO `items` VALUES('{$itemName}','{$itemQuantity}','{$itemPrice}','{$currentTimestamp}','{$customerNumber}')");
                if($addItems){
                    header("Location: /localshop/index.php");
                }   
               
            }
        } else{
            header('Location: /localshop/index.php');
            echo "No Records Found";
        }

        
    }
?>