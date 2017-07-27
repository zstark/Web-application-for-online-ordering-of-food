<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php $ns = 1; ?>
<?php include_once 'inc/sidebar.php' ?>


<content>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<?php

if(isset($_SESSION['uid']) && isset($_SESSION['user'])){
	createThumbnail("User Panel", $_SESSION['user']['user.name'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);
	?>
	<table id="example" class="display stripe" cellspacing="0" width="100%" style="border:1px solid #000;font-size:12px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Time</th>
                <th>Restaurant</th>
                <th>Order</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Time</th>
                <th>Restaurant</th>
                <th>Order</th>
                <th>Actions</th>
                <th>Status</th>
            </tr>
        </tfoot>
        <tbody>
        	
            <?php
            $arr = getRecords("SELECT * FROM orders, restaurant WHERE uid=".$_SESSION['uid']." AND orders.rid = restaurant.id");


            foreach ($arr as $val) {
            	?>
            	<tr id = "oi-<?php echo $val['orders.id']; ?>">
            		<td><?php echo $val['orders.id']; ?></td>
            		<td><?php echo date('M j Y g:i A', strtotime($val['orders.ot'])); ?></td>
            		<td><?php echo $val['restaurant.name']." | ".$val['restaurant.phone'];; ?></td>
	                <td><?php 
	                	$ar = getRecords("SELECT * FROM order_detail, menu_item WHERE oid=".$val['orders.id']." AND mid = menu_item.id");
	                	
	                		?>
	                		<ul>
	                			<?php foreach($ar as $va){ ?>
	                			<li> <?php echo $va['menu_item.name']." - ".$va['order_detail.qty']; ?>
	                			<?php } ?>
	                		</ul>
	                		<?php
	                	
	                ?></td>
	                
	                <td>

	                <span class="act mouse-clickable" onclick="window.open('bill.php?id=<?php echo $val['orders.id']; ?>');">
	                	Generate Bill
	                </span>
                    </td>
                    <td>
                        <?php 
                            $ra = intval($val['orders.status']);
                            if($ra === 0){
                                echo "Order Placed - waiting for restaurant";
                            }else if($ra === 1){
                                echo "Order Recieved";
                            }else if($ra === 2){
                                echo "On the way";
                            }else{
                                echo "Payment Recieved<br>Order Completed.";
                            }


                         ?> 
                    </td>
            	</tr>
            	<?php
            }
            ?>
        </tbody>
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
    $('#example').DataTable({ "order": [[ 5, "asc" ], [ 0, "desc" ]] });
} );
</script>

</content>


<?php include_once 'inc/footer.php' ?>
