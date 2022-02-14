<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$productId = $_POST['productId'];
	$productName 		= $_POST['editProductName']; 
  $quantity 			= $_POST['editQuantity'];
  $rate 					= $_POST['editRate'];
  $brandName 			= $_POST['editBrandName'];
  //$categoryName 	= $_POST['editCategoryName'];
   foreach ($_POST['editCategoryName'] as $subject)  
  {
    $categoryName .= "''" . $subject . "'',"; 
  }
  //$categoryName = str_replace($categoryName,"Array","");
  //$categoryName = substr($categoryName, 5);
  $categoryName = substr($categoryName, 0, -1);
  
  $productStatus 	= $_POST['editProductStatus'];

        if (strpos( $categoryName, ',' ) == 0)
        {
           $categoryName = str_replace("'","",$categoryName); 
        }
				
	$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = $productId ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
