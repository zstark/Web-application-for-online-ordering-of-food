<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php include_once 'inc/sidebar.php' ?>


<content>

<?php

if(!isset($_GET['id'])) header("LOCATION: index.php");

$mid = $_GET['id'];

$res = getRecord('*','restaurant','id='.$mid);


createThumbnail($res['restaurant.name'], $res['restaurant.phone'] , " heading cover", "alt", "images/navigation-bg.png", "","","",NULL,"mhead");

?>

<div class="clear-fix" style="height:20px;">&nbsp;</div>

<?php

$arr = getRecords('*','menu_item','rid='.$mid.' ORDER BY category DESC');
$cat = "";

foreach ($arr as $value){
	if($cat !== $value['menu_item.category']){
		$cat = $value['menu_item.category'];
		createThumbnail($cat, "", "ltr cover sub-heading", "static", "", "","","",NULL);
	}
	createThumbnail($value['menu_item.name'], 'Rs. '.$value['menu_item.price']." | ".$value['menu_item.description'], "mi ltr cover sub-heading border border-none background background-none", "static", "", "","width:90%","",NULL,'mi_'.$value['menu_item.id']);
	
}


$rel = getRecords('*','restaurant,tag_r,tag_r AS tr','restaurant.id=tag_r.rid AND tr.rid = '.$mid.' AND restaurant.id != '.$mid.' AND tr.id = tag_r.id LIMIT 5');

createThumbnail('Proceed to Cart', "", "mouse mouse-clickable large sub-heading indi", "static", "", "","","right: 85px;","cart.php");

createThumbnail('Related Restaurants', "", "ltr cover sub-heading", "static transparent", "", "","","",NULL);
foreach ($rel as $value){
	//var_dump($value);
	createThumbnail($value['restaurant.name'],'info info','mouse mouse-clickable','',$value['restaurant.url'],'','','','menu.php?id='.$value['restaurant.id'],'r_'.$value['restaurant.id']);
}
    
if(count($rel) == 0){
	echo "-";
}
    
?>




</content>

<style type="text/css">
.amt-val{
	font-weight: 100;
}
.amt-op{
	font-size: 11px;
	font-weight: 100;
}
.mi-op{
	margin-right:10px;
	margin-top:15px;
}
</style>

<div class="hidden" id="mi-add">
	<div class="right mi-op">
		<span class="amt-op amt-plus fa fa-minus mouse-clickable" onclick="miAdd(this.parentElement, -1);"></span>
		<span class="amt-val mouse-clickable">0</span>
		<span class="amt-op amt-minus fa fa-plus mouse-clickable" onclick="miAdd(this.parentElement, 1);"></span>
	</div>
</div>



<script type="text/javascript">
var mis = document.getElementsByClassName("mi");
var i;

for(i=0;i<mis.length;i++){
	mis[i].innerHTML = document.getElementById("mi-add").innerHTML + mis[i].innerHTML;
	var s = getCookie(mis[i].id);
	if(s != ""){
		mis[i].getElementsByClassName("amt-val")[0].innerText = s+"";
	}
}

function miAdd(o, dir){
	var x = parseInt(o.getElementsByClassName("amt-val")[0].innerText);
	if(dir > 0){
		//add
		x++;
	}else if(dir < 0){
		//remove
		if(x > 0){
			x--;
		}
	}else{
		//checkout - maybe
	}
	o.getElementsByClassName("amt-val")[0].innerText = x+"";

	if(x == 0)
		setCookie(o.parentElement.id,x,0);
	else
		setCookie(o.parentElement.id,x,1);
	//add to cart
}


</script>

<?php include_once 'inc/footer.php' ?>