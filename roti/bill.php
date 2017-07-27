<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php $ns = 1; ?>
<?php include_once 'inc/sidebar.php' ?>


<content>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<?php

if(isset($_SESSION['uid']) && isset($_SESSION['user']) && isset($_GET['id'])){
	createThumbnail("User Panel", $_SESSION['user']['user.name'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);
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
            $arr = getRecords("SELECT * FROM orders, order_detail, menu_item WHERE uid=".$_SESSION['uid']." AND orders.id = order_detail.oid AND menu_item.id = order_detail.mid AND orders.id=".$_GET['id']);

            $i = 1;
            $total = 0;
            $tmp;
            foreach ($arr as $val) {
            	?>
            	<tr id = "oi-<?php echo $val['orders.id']; ?>">
            		<td><?php echo $i; ?></td>
            		<td><?php echo $val['menu_item.name']." | ".$val['menu_item.price'];; ?></td>
            		<td><?php echo $val['order_detail.qty']; ?></td>
            		<td><?php $tmp = $val['menu_item.price']*$val['order_detail.qty']; echo $tmp; $total += $tmp; ?></td>
            		
            	</tr>
            	<?php
            	$i++;
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th>Total: </th>
                <th><?php echo $total; ?></th>
            </tr>
        </tfoot>
    </table>
	<?php
}else{
	header("LOCATION: rest.php");
}

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</content>


<?php include_once 'inc/footer.php' ?>
