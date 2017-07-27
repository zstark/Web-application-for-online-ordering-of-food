<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php $ns = 1; ?>
<?php include_once 'inc/sidebar.php' ?>


<content>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<?php

if(isset($_SESSION['aid']) && isset($_SESSION['admin'])){
	createThumbnail("Admin Panel", $_SESSION['admin']['admin.username'], " heading cover", "alt", "images/navigation-bg.png", "","","",NULL,"admin.php");
	?>
	<table id="example" class="display stripe" cellspacing="0" width="100%" style="border:1px solid #000;font-size:12px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>DOJ</th>
               
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>DOJ</th>
               
            </tr>
        </tfoot>
        <tbody>
        	
            <?php
            $arr = getRecords("SELECT * FROM user");


            foreach ($arr as $val) {
            	?>
            	<tr id = "oi-<?php echo $val['user.id']; ?>">
            		<td><?php echo $val['user.id']; ?></td>
            		<td><?php echo $val['user.name']; ?></td>
	                <td><?php echo $val['user.phone']; ?></td>
	                <td><?php echo $val['user.address']; ?></td>
	                <td><?php echo $val['user.email']; ?></td>
	                <td><?php echo $val['user.doj']; ?></td>
	                
	              
            	</tr>
            	<?php
            }
            ?>
        </tbody>
    </table>
	<?php
}else{
	header("LOCATION: admin.php");
}

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
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
