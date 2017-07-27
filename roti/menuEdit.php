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
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </tfoot>
        <tbody>
        	<tr id = "mi-add">
        		<td contenteditable="true" class="name"></td>
        		<td contenteditable="true" class="category"></td>
        		<td contenteditable="true" class="price"></td>
        		<td contenteditable="true" class="description"></td>
        		<td><span class="mouse-clickable" onclick="meadd();">Add</span> | <span class="res"></span></td>
        	</tr>
            <?php
            $arr = getRecords("SELECT * FROM menu_item WHERE rid=".$_SESSION['rid']);


            foreach ($arr as $val) {
            	?>
            	<tr id = "mi-<?php echo $val['menu_item.id']; ?>">
            		<td contenteditable="true" class="name"><?php echo $val['menu_item.name']; ?></td>
            		<td contenteditable="true" class="category"><?php echo $val['menu_item.category']; ?></td>
            		<td contenteditable="true" class="price"><?php echo $val['menu_item.price']; ?></td>
            		<td contenteditable="true" class="description"><?php echo $val['menu_item.description']; ?></td>
            		<td><span class="mouse-clickable span-op" onclick="meop(<?php echo $val['menu_item.id']; ?>, 1);">Save</span> | <span class="mouse-clickable span-op" onclick="meop(<?php echo $val['menu_item.id']; ?>, -1);">Remove</span> | <span class="res"></span></td>
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
    $('#example').DataTable();
} );
</script>
<script type="text/javascript">
function meop(id, o){
	var p = document.getElementById("mi-"+id);

	var name = p.getElementsByClassName("name")[0].innerText.trim();

	var cat = p.getElementsByClassName("category")[0].innerText.trim();

	var pri = p.getElementsByClassName("price")[0].innerText.trim();

	var desc = p.getElementsByClassName("description")[0].innerText.trim();

	var xmlhttp = new XMLHttpRequest();
	

	if(o == 1){

        var str = "op=1&id="+encodeURIComponent(id)+"&name="+encodeURIComponent(name)+"&cat="+encodeURIComponent(cat)+"&desc="+encodeURIComponent(desc)+"&price="+encodeURIComponent(pri);
        xmlhttp.onreadystatechange = function() {
        	if (xmlhttp.readyState == 4) {
	            
	            if(xmlhttp.status == 200){
	                if(xmlhttp.responseText.trim() == "1"){
	                    p.getElementsByClassName("res")[0].innerHTML = "Edit Successful";
	                }else{
	                    p.getElementsByClassName("res")[0].innerHTML = "Edit Failed";
	                    console.log(xmlhttp.responseText);
	                }
	            }else{
	                p.getElementsByClassName("res")[0].innerHTML = "Edit Failed";
	                console.log(xmlhttp.status);
	            }
	            
	        }
	    };
	}else if(o == -1){

		var str = "op=2&id="+encodeURIComponent(id);
		xmlhttp.onreadystatechange = function() {
        	if (xmlhttp.readyState == 4) {
	            
	            if(xmlhttp.status == 200){
	                if(xmlhttp.responseText.trim() == "1"){
	                     p.getElementsByClassName("res")[0].innerHTML = "Deletion Successful";
	                     p.getElementsByClassName("span-op")[0].style.display = "none";
	                     p.getElementsByClassName("span-op")[1].style.display = "none";
	                }else{
	                     p.getElementsByClassName("res")[0].innerHTML = "Deletion Failed";
	                    console.log(xmlhttp.responseText);
	                }
	            }else{
	                p.getElementsByClassName("res")[0].innerHTML = "Deletion Failed";
	                console.log(xmlhttp.status);
	            }
	            
	        }
	    };

	}
	xmlhttp.open("POST", "inc/ajax.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	xmlhttp.send(str);
}

function meadd(){
	var p = document.getElementById("mi-add");

	var name = p.getElementsByClassName("name")[0].innerText.trim();

	var cat = p.getElementsByClassName("category")[0].innerText.trim();

	var pri = p.getElementsByClassName("price")[0].innerText.trim();

	var desc = p.getElementsByClassName("description")[0].innerText.trim();

	var xmlhttp = new XMLHttpRequest();
	

	
    var str = "op=3&name="+encodeURIComponent(name)+"&cat="+encodeURIComponent(cat)+"&desc="+encodeURIComponent(desc)+"&price="+encodeURIComponent(pri);
    xmlhttp.onreadystatechange = function() {
    	if (xmlhttp.readyState == 4) {
            
            if(xmlhttp.status == 200){
                if(xmlhttp.responseText.trim() == "1"){
                    p.getElementsByClassName("res")[0].innerHTML = "Add Successful";
                }else{
                    p.getElementsByClassName("res")[0].innerHTML = "Add Failed";
                    console.log(xmlhttp.responseText);
                }
            }else{
                p.getElementsByClassName("res")[0].innerHTML = "Add Failed";
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
