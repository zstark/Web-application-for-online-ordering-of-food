<?php include_once 'inc/generics.php' ?>
<?php include_once 'inc/header.php' ?>
<?php include_once 'inc/initThumbnail.php' ?>
<?php include_once 'inc/sidebar.php' ?>


<content>

<?php

$cat = getRecords('SELECT DISTINCT tags.name FROM restaurant, tag_r, tags WHERE tag_r.id = tags.id AND tag_r.rid = restaurant.id');

?>


<div class="search-bar" style="width:100%;">
<form action="index.php" method="GET">
	<input type="text" value="<?php if(isset($_GET['s']) && !isset($_GET['ns']) ) echo $_GET['s']; ?>" placeholder="Search Keywords" name="s">
	<input type="submit" value="Search">
</form>
</div>

<?php

if(isset($_GET['fav']) && isset($_SESSION['uid'])){
	createThumbnail("Favourates", "", "ltr cover sub-heading", "static", "", "","","",NULL);

	$a1 = getRecords('SELECT restaurant.id, count(restaurant.id) AS \'CO\' FROM restaurant, orders WHERE orders.rid = restaurant.id AND orders.uid='.$_SESSION['uid'].' GROUP BY restaurant.id HAVING count(restaurant.id) >= (SELECT AVG(a.rcount) FROM (select count(*) as rcount FROM restaurant, orders WHERE orders.rid = restaurant.id AND orders.uid='.$_SESSION['uid'].' GROUP BY restaurant.id) a)');
	$a2 = "";
	foreach ($a1 as $key => $value) {
		if($a2 === "") $a2 = $value['restaurant.id'];
		else $a2 .= ",".$value['restaurant.id'];
	}
	
	$arr = getRecords('SELECT * FROM restaurant WHERE id IN('.$a2.')');
	foreach ($arr as $value){
		//var_dump($value);
		createThumbnail($value['restaurant.name'],$value['restaurant.phone'],'mouse mouse-clickable','',$value['restaurant.url'],'','','color:#fff;','menu.php?id='.$value['restaurant.id'],'r_'.$value['restaurant.id']);
	}

	createThumbnail("", "", "ltr cover sub-heading", "static", "", "","","",NULL);

}

$arr = [];
if(isset($_GET['s'])){
	
	$ss = '%'.str_replace(' ', '%', $_GET['s']).'%';
	$arr = getRecords('restaurant.name, restaurant.id, restaurant.url, restaurant.phone', 'restaurant', 'name LIKE "'.$ss.'" UNION SELECT restaurant.name, restaurant.id, restaurant.url, restaurant.phone FROM restaurant,menu_item WHERE rid = restaurant.id AND menu_item.name LIKE "'.$ss.'" UNION SELECT restaurant.name, restaurant.id, restaurant.url, restaurant.phone FROM restaurant, tags, tag_r WHERE tag_r.id=tags.id AND tag_r.rid = restaurant.id AND tags.name LIKE "'.$ss.'" UNION SELECT restaurant.name, restaurant.id, restaurant.url, restaurant.phone FROM restaurant, menu_item WHERE menu_item.rid = restaurant.id AND menu_item.category LIKE "'.$ss.'" UNION SELECT restaurant.name, restaurant.id, restaurant.url, restaurant.phone FROM restaurant, tags, tag_m, menu_item WHERE tag_m.id=tags.id AND tag_m.mid = menu_item.id AND menu_item.rid = restaurant.id AND tags.name LIKE "'.$ss.'"');
	//$arr = getRecords('*','restaurant');
	foreach ($arr as $value){
	//var_dump($value);
		createThumbnail($value['.name'],$value['.phone'],'mouse mouse-clickable','',$value['.url'],'','','color:#fff;','menu.php?id='.$value['.id'],'r_'.$value['.id']);
	}
}else{
	$arr = getRecords('*','restaurant');
	foreach ($arr as $value){
		//var_dump($value);
		createThumbnail($value['restaurant.name'],$value['restaurant.phone'],'mouse mouse-clickable','',$value['restaurant.url'],'','','color:#fff;','menu.php?id='.$value['restaurant.id'],'r_'.$value['restaurant.id']);
	}
}



createThumbnail("Categories", "", "ltr cover sub-heading", "static", "", "","","",NULL);

$arr = getRecords('SELECT DISTINCT name as "cat" FROM tags UNION SELECT DISTINCT category as "cat" FROM menu_item');
$i = 0;
foreach ($arr as $value){
	//var_dump($value);
	if(strlen($value['.cat']) <= 10 && $i<10){
		createThumbnail($value['.cat'], "", "mouse mouse-clickable ltr sub-heading border border-none background background-none", "static", "", "","","","index.php?s=".$value['.cat']."&ns");	
		$i++;
	}
}
	



if(!isset($_GET['fav']) && isset($_SESSION['uid'])){
	createThumbnail("Favourates", "", "ltr cover sub-heading", "static", "", "","","",NULL);

	$a1 = getRecords('SELECT restaurant.id, count(restaurant.id) AS \'CO\' FROM restaurant, orders WHERE orders.rid = restaurant.id AND orders.uid='.$_SESSION['uid'].' GROUP BY restaurant.id HAVING count(restaurant.id) >= (SELECT AVG(a.rcount) FROM (select count(*) as rcount FROM restaurant, orders WHERE orders.rid = restaurant.id AND orders.uid='.$_SESSION['uid'].' GROUP BY restaurant.id) a)');
	$a2 = "";
	foreach ($a1 as $key => $value) {
		if($a2 === "") $a2 = $value['restaurant.id'];
		else $a2 .= ",".$value['restaurant.id'];
	}
	
	$arr = getRecords('SELECT * FROM restaurant WHERE id IN('.$a2.')');
	foreach ($arr as $value){
		//var_dump($value);
		createThumbnail($value['restaurant.name'],$value['restaurant.phone'],'mouse mouse-clickable','',$value['restaurant.url'],'','','color:#fff;','menu.php?id='.$value['restaurant.id'],'r_'.$value['restaurant.id']);
	}

	//createThumbnail("", "", "ltr cover sub-heading", "static", "", "","","",NULL);
	echo "<hr>";
}

?>



</content>


<?php include_once 'inc/footer.php' ?>