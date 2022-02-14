<?php
if(!empty($_POST['country'])){
   require('php_action/db_connect.php');
   $countryId = $_POST['country'];
   
   $sql = 'SELECT product_explode.product_id, CONCAT(categories.categories_name,CHAR(9),CHAR(9),\'>>> \',product_explode.product_name) as product_name  
FROM product_explode
INNER JOIN categories ON product_explode.brand_id = categories.categories_id
WHERE active = 1 
AND status = 1 
AND quantity ! = 0
AND brand_id = '.$countryId.' order by product_name asc';
  
   $result = $connect->query($sql);
   $data= array();
   echo '<option value="">~~เลือกประเภทอะไหล่~~</option>';
   while($row = $result->fetch_assoc()){
       $data[] = array(
            'id' => $row['product_id'],'name' => $row['product_name']
            );
            //echo "<option>Select State...</option>";
            echo "<option value='".$row['product_id']."' id='changeProduct".$row['product_id']."'>".$row['product_name']."</option>";
        }
        //$json[$row['id']] = $row['product_name'];
  

   $out = array_values($data);
   echo json_encode($out);
   
}

?>