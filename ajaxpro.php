<?php

   require('php_action/db_connect.php');
   $sql = "SELECT * FROM product
         WHERE brand_id LIKE '%".$_GET['id']."%'"; 
   //WHERE brand_id LIKE '%".$_GET['id']."%'"; 
   $result = $connect->query($sql);
   $data= array();
   while($row = $result->fetch_assoc()){
       $data[] = array(
            'id' => $row['product_id'],'name' => $row['product_name']
            );
        }
        //$json[$row['id']] = $row['product_name'];
  

   $out = array_values($data);
   echo json_encode($out);
?>