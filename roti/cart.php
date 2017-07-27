<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php include_once 'inc/sidebar.php' ?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

<content>

<?php
createThumbnail('Cart', '' , " heading cover", "alt static opaque", "images/navigation-bg.png", "","","",NULL);
$mi_arr = [];
$qty_arr = [];
$rid_arr = [];
$i = 0;
foreach ($_COOKIE as $key => $value) {
	$a = substr($key, 0, 3);
	if($a === "mi_"){
		$b = intval(substr($key,3));
		$mi_arr[$i] = $b;
		$qty_arr[$b] = $value;
		$rid_arr[$b] = 0;
		$i++;
	}
}

$ce = 0;
if($i == 0) $ce = 1;

$mis = join(',',$mi_arr);


if(!$ce){
?>


<table id="example" class="display stripe" cellspacing="0" width="100%" style="border:1px solid #000;font-size:12px;">
	<thead>
	    <tr>
	        <th>S.no.</th>
	        <th>Name</th>
	        <th>Quantity</th>
	        <th>Total Price</th>
	    </tr>
	</thead>

	<tbody>
		
	    <?php
	    $arr = getRecords("SELECT * FROM menu_item WHERE id IN ( $mis );");

	    $i = 1;
	    $total = 0;
	    $tmp;
	    foreach ($arr as $val) {
	    	?>
	    	<tr id = "bi-<?php echo $val['menu_item.id']; ?>">
	    		<td><?php echo $i; ?></td>
	    		<td><?php echo $val['menu_item.name']." | ".$val['menu_item.price'];; ?></td>
	    		<td><?php echo $qty_arr[intval($val['menu_item.id'])]; ?></td>
	    		<td><?php $tmp = $val['menu_item.price']*$qty_arr[intval($val['menu_item.id'])]; echo $tmp; $total += $tmp; $rid_arr[intval($val['menu_item.id'])] = $val['menu_item.rid']; ?></td>
	    		
	    	</tr>
	    	<?php
	    	$i++;
	    }
	    ?>
	</tbody>
	<tfoot>
	    <tr>
	        <th><span onclick="clearCart();">Clear Cart</span></th>
	        <th></th>
	        <th>Total: </th>
	        <th><?php echo $total; ?></th>
	    </tr>
	</tfoot>
</table>


<?php

$ins = [];
$inc = [];
foreach($rid_arr as $key=>$value){
	if(!isset($inc[$value])){
		$inc[$value] = 0;
		$ins[$value] = [];
		$ins[$value][0] = $key;
	}else{
		$ins[$value][$inc[$value]] = $key;
	}
	$inc[$value]++;

}


if(isset($_SESSION['uid']) && isset($_SESSION['user'])){
		createThumbnail("Fill the form to confirm Order (Checkout)", "", "ltr cover sub-heading indi", "static", "", "","","",NULL);
	
$err = 0;
$reg = 1;
if(isset($_POST['op'])){
	if($_POST['op'] === "checkout"){
		if(isset($_POST['address']) && isset($_POST['phone'])){
			if($_POST['address'] == ''){
				$err = 1;
			}
			if($_POST['phone'] == ''){
				$err = 1;
			}
			$tf = 0;
			
			if($err == 0){
				foreach($ins as $key=>$val){
					
					if(getRecord('INSERT INTO orders (uid, rid, phone, address) values ('.$_SESSION['uid'].','.$key.',"'.$_POST['phone'].'","'.$_POST['address'].'")')){

							$last_id = mysqli_insert_id($GLOBALS['con']);
							foreach($val as $k=>$v){
								if(getRecord('INSERT INTO order_detail (mid, qty, oid) values ('.$v.','.$qty_arr[$v].','.$last_id.')')){



								}else{
									$reg = 0;
								}
							}

							
						}else{
							$reg = 0;
							$err = 2;
						}
					
					
				}
				if($reg == 0){
					echo 'Fatal Error in confirming order!';
				}else{
					header("LOCATION: clearcart.php?redir=1");
				}

			}


		}
	}

}



	?>

	<form action="cart.php" method="POST">
		
		<input type="text" placeholder="phone" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; else echo $_SESSION['user']['user.phone']; ?>"> <?php if($err >= 1 && $_POST['phone'] == ''){ echo '<font color="red">*</font>'; } ?>

		<br><input type="text" placeholder="address" name="address" value="<?php if(isset($_POST['address'])) echo $_POST['address']; else echo $_SESSION['user']['user.address']; ?>"> <?php if($err >= 1 && $_POST['address'] == ''){ echo '<font color="red">*</font>'; } ?>

		
		
		<br><input type="submit" value="checkout" name="op">

	</form>

	<?php

}else{
	createThumbnail("Click here to proceed (Next step - Login)", "", "mouse mouse-clickable ltr cover sub-heading indi", "static", "", "","","","user.php?redir=1");
}
}else{
	createThumbnail("Cart Empty - Back", "", "mouse mouse-clickable ltr cover sub-heading indi", "static", "", "","","","index.php");
}

?>



</content>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );

function clearCart(){
	window.open("clearcart.php","_self");
}
</script>

<?php include_once 'inc/footer.php' ?>