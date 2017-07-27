<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php $ns = 1; ?>
<?php include_once 'inc/sidebar.php' ?>


<content>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<?php

if(isset($_SESSION['rid']) && isset($_SESSION['rest'])){
	createThumbnail("Restaurant Panel", $_SESSION['rest']['restaurant.name'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL);
	?>
	<table id="example" class="display stripe" cellspacing="0" width="100%" style="border:1px solid #000;font-size:12px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Time</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Time</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Order</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
        	
            <?php
            $arr = getRecords("SELECT * FROM orders WHERE rid=".$_SESSION['rid']." ORDER BY `orders`.`ot` DESC");


            foreach ($arr as $val) {
            	?>
            	<tr id = "oi-<?php echo $val['orders.id']; ?>">
            		<td><?php echo $val['orders.id']; ?></td>
            		<td><?php echo date('M j Y g:i A', strtotime($val['orders.ot'])); ?></td>
	                <td><?php $val['orders.phone'] ?></td>
	                <td><?php $val['orders.address'] ?></td>
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
	                
	                <td><span class="act mouse-clickable" onclick="acton(<?php echo $val['orders.id']; ?>)">
	                	<?php 
	                	$ra = intval($val['orders.status']);
	                	if($ra === 0){
	                		echo "Mark as Recieved";
	                	}else if($ra === 1){
	                		echo "On the way";
	                	}else if($ra === 2){
	                		echo "Payment Recieved";
	                	}else{
	                		echo "Order Completed";
	                	}


	                	 ?>	

	                </span> | <span class="res"></span></td>
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
    $('#example').DataTable({ "order": [[ 0, "desc" ]] });
} );
</script>
<script type="text/javascript">
function acton(id){
	var p = document.getElementById("oi-"+id);

	var xmlhttp = new XMLHttpRequest();
	
	var o;
	var nxt;

	var t = p.getElementsByClassName("act")[0].innerText.trim();
	if(t == "Mark as Recieved"){
		o = 1;
	}else if(t == "On the way"){
		o = 2;
	}else if(t == "Payment Recieved"){
		o = 3;
	}else{
		return;
	}

	var str = "op=4&id="+encodeURIComponent(id)+"&o="+o;

	xmlhttp.onreadystatechange = function() {
    	if (xmlhttp.readyState == 4) {
            
            if(xmlhttp.status == 200){
                if(xmlhttp.responseText.trim() == "1"){
				p.getElementsByClassName("res")[0].innerHTML = "Successful";
				var t = p.getElementsByClassName("act")[0].innerText.trim();
				if(t == "Mark as Recieved"){
					p.getElementsByClassName("act")[0].innerHTML = "On the way";
				}else if(t == "On the way"){
					p.getElementsByClassName("act")[0].innerHTML = "Payment Recieved";
				}else if(t == "Payment Recieved"){
					p.getElementsByClassName("act")[0].innerHTML = "Order Completed";
				}
                }else{
                     p.getElementsByClassName("res")[0].innerHTML = "Failed";
                    console.log(xmlhttp.responseText);
                }
            }else{
                p.getElementsByClassName("res")[0].innerHTML = "Failed";
                console.log(xmlhttp.status);
            }
            
        }
    };
	xmlhttp.open("POST", "inc/ajax.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xmlhttp.send(str);
}


</script>
</content>


<?php include_once 'inc/footer.php' ?>
