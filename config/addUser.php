<?php
    include "database.php";

    if(isset($_POST['btn-submit'])) {
        $sql = mysqli_query($database, "INSERT INTO `customers` VALUES ('','$_POST[customerId]','$_POST[firstName]','$_POST[lastName]','$_POST[address]','$_POST[phoneNumber]')");
        if($sql){
            header('Location: /localshop/index.php');
        }
    }

    $customerSql = "SELECT id, customer_id FROM `customers` ORDER BY customer_id DESC LIMIT 1";
    $executeSql = mysqli_query($database, $customerSql);
    
    $uniqueCustomerId;
    $customerIdPrim;
    
    if($executeSql){
        $rowCount = mysqli_num_rows($executeSql);
        if($rowCount > 0){
            $res = mysqli_fetch_assoc($executeSql);
            $lastCustomerID = $res['customer_id'];
            $lastId = $res['id'];

            $numericPart = (int)substr($lastCustomerID, 3); // Assuming 'SH-' prefix
            $newNumericPart = $numericPart + 1;
            $uniqueCustomerId = 'SH-' . str_pad($newNumericPart, 2, '0', STR_PAD_LEFT); // SH-01, SH-02, etc.
            $customerIdPrim = $lastId + 1;
        } else{
            $customerIdPrim = 1;
            $uniqueCustomerId = "SH-01";
        }
    }
?>