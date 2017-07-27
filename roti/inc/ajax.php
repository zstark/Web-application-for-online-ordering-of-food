<?php
include_once 'generics.php';
session_start();
if(isset($_POST['op'])){
	$op = intval($_POST['op']);
	if($op === 1){
		if(isset($_SESSION['rid']) && isset($_SESSION['rest'])){
			if(isset($_POST['id']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['cat']) && isset($_POST['price'])){
				if(getRecords('UPDATE menu_item SET name="'.$_POST['name'].'", description="'.$_POST['desc'].'", category="'.$_POST['cat'].'", price='.$_POST['price'].' WHERE id='.$_POST['id']  )){
					//echo 'UPDATE menu_item SET name="'.$_POST['name'].'", description="'.$_POST['desc'].'", category="'.$_POST['cat'].'", price='.$_POST['price'].' WHERE id='.$_POST['id'];
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "0";
		}
	}else if($op === 2){
		if(isset($_SESSION['rid']) && isset($_SESSION['rest'])){
			if(isset($_POST['id'])){
				if(getRecords('DELETE FROM menu_item WHERE id='.$_POST['id']  )){
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "0";
		}
	}else if($op === 3){
		if(isset($_SESSION['rid']) && isset($_SESSION['rest'])){
			if(isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['cat']) && isset($_POST['price'])){
				if(getRecords('INSERT INTO menu_item (name, description, category, price, rid) values ("'.$_POST['name'].'","'.$_POST['desc'].'","'.$_POST['cat'].'",'.$_POST['price'].', '.$_SESSION['rid'].')')){
					echo "1";
				}else{
					echo "0";
				}
			}
		}else{
			echo "0";
		}
	}else if($op === 4){
		if(isset($_SESSION['rid']) && isset($_SESSION['rest'])){
			if(isset($_POST['o']) && isset($_POST['id']) ){
				if(getRecords('UPDATE orders SET status='.$_POST['o'].' WHERE id='.$_POST['id'] )){
					echo "1";
				}else{
					echo "0";
				}
			}else{
				echo "0";
			}
		}else{
			echo "0";
		}
	}else{
		echo "0";
	}
	
}else{
	echo "0";
}

ob_flush();
?>