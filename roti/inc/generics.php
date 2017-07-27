<?php
ob_start();
$mysql_host = "localhost";
$mysql_database = "roti";
$mysql_user = "root";
$mysql_password = "mani@iitG";
$con = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database);
$GLOBALS['con'] = $con;

$_PAGE_TITLE = "";

$GLOBALS['DEFAULT'] = [];
$GLOBALS['DEFAULT']['class'] = $GLOBALS['DEFAULT']['alt'] = $GLOBALS['DEFAULT']['style'] = $GLOBALS['DEFAULT']['style_alt'] = $GLOBALS['DEFAULT']['style_glider'] = "";
function setTitle($t){
	$_PAGE_TITLE = $t;
}

function createThumbnail($_TITLE = "", $_INFO = "", $_CLASS = "", $_ALT = "", $_IMAGE="", $_STYLE="" ,$_STYLE_ALT="", $_STYLE_GLIDER="", $_LINK=NULL, $_ID=NULL){
	include 'inc/thumbnail.php';
}

function getRecords($select, $from = NULL, $where = "1=1"){
	$con = $GLOBALS['con'];
	$data = false;
	$arr = false;
	if($from == NULL){
		$data = mysqli_query($con, $select);


		if($data){
			if($data === true) return $data;
			$qualifiedColumnNames = array();
			foreach ($data->fetch_fields() as $columnMeta) {
			    $qualifiedColumnNames[] = "{$columnMeta->table}.{$columnMeta->name}";
			}

			$arr = [];
			$i=0;
			//fetch results and combine with keys
			while ($row = $data->fetch_row()) {
			    $qualifiedRow = array_combine($qualifiedColumnNames, $row);
			    $arr[$i] = $qualifiedRow;
				$i++;
			}
		}
	}else{
		$query = "SELECT $select FROM $from WHERE $where";
		//echo $query;
		$arr = getRecords($query);
	}
	
	return $arr;
	
}

function getRecord($select, $from = NULL, $where = "1=1"){
	$con = $GLOBALS['con'];
	$data = false;
	$arr = false;
	if($from == NULL){
		$data = mysqli_query($con, $select);
		if($data){
			if($data === true) return $data;
			$qualifiedColumnNames = array();
			foreach ($data->fetch_fields() as $columnMeta) {
			    $qualifiedColumnNames[] = "{$columnMeta->table}.{$columnMeta->name}";
			}

			$arr = NULL;

			//fetch results and combine with keys
			if ($row = $data->fetch_row()) {
			    $qualifiedRow = array_combine($qualifiedColumnNames, $row);
			    $arr = $qualifiedRow;
			}
		}
	}else{
		$query = "SELECT $select FROM $from WHERE $where LIMIT 0,1";
		$arr = getRecord($query);
	}
	
	return $arr;
}


?>