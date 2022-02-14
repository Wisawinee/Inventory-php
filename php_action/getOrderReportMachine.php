<?php 

require_once 'core.php';

if($_POST) {
 
        $categoryname = $_POST['categoryName'];
        
        echo "<div class='panel-heading'>
                    <i class='glyphicon glyphicon-check'></i>	Report detail Part by Part type
            </div><BR>";
        
	//$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1";
        $sql = "SELECT product_name, REPLACE(product_image, '../', '') product_image, quantity, rate FROM store.product_explode where categories_id = '$categoryname' and active = 1 "; 
        
	$query = $connect->query($sql);
        
	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>List Part</th>
			<th>Image Part</th>
                        <th>Quantity in Store</th>
			<th>Pirce per unit</th>
		</tr>

		<tr>';
		
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center><a href="./'.$result['product_image'].'" target="_blank">ดูภาพ</a></center></td>
                                <td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
			</tr>';	
		}
                
		$table .= '
		</tr>

	</table>
	';	

	echo $table;

}

?>