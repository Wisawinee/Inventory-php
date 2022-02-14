<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate'];
	//$date = DateTime::createFromFormat('m/d/Y',$startDate);
        $timestamp=strtotime($startDate);
        $dateConvert=date('Y-m-d', $timestamp);
        
	$start_date = $dateConvert;

	$endDate = $_POST['endDate'];
	//$format = DateTime::createFromFormat('m/d/Y',$endDate);
        $timestamp=strtotime($endDate);
        $dateConvert=date('Y-m-d', $timestamp);
        
	$end_date = $dateConvert;

        $department = $_POST['DepartmentName'];
        $categoryname = $_POST['categoryName'];
        
	//$sql = "SELECT * FROM orders WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_status = 1";
        $sql = "SELECT a.order_date,a.client_name,d.categories_name,b.quantity,c.product_name FROM orders a, order_item b, product c, categories d
                WHERE a.order_date >= '$start_date' 
                AND a.order_date <= '$end_date' 
                and a.order_status = 1
                and a.order_id = b.order_id
                and b.product_id = c.product_id
                and b.category_id = d.categories_id
                and d.categories_id like '$categoryname'  and a.client_name like '$department' "; 
        
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Date of List Withdraw</th>
			<th>Department</th>
                        <th>Part Type</th>
			<th>List Withdraw</th>
			<th>Quantity</th>
		</tr>

		<tr>';
		$totalAmount = "";
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['client_name'].'</center></td>
                                <td><center>'.$result['categories_name'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
			</tr>';	
			$totalAmount += $result['grand_total'];
		}
		$table .= '
		</tr>
<!--
		<tr>
			<td colspan="3"><center>ราคารวมทั้งหมด</center></td>
			<td><center>'.$totalAmount.'</center></td>
		</tr>
                -->
	</table>
	';	

	echo $table;

}

?>