<?php

require("db_connect.php");

/* Session */
session_start();
$U_ID = $_SESSION["userId"];
$user_name = $_SESSION["userName"];

$num = $_REQUEST["num"];

$query = $db->query("select * from recipe_write where recipe_id = {$num}");
$row = $query->fetch();
$thum = $row['recipe_thum'];
if($thum  != null) {
	unlink($thum);
 }

$query = $db->query("select * from cooking_img where recipe_id = {$num}");
$row = $query->fetch();
$sub_1 = $row['img_1'];
if($sub_1 != null) {
   unlink($sub_1);
}
$sub_2 = $row['img_2'];
if($sub_2 != null) {
    unlink($sub_2);
 }
$sub_3 = $row['img_3'];
if($sub_3 != null) {
    unlink($sub_3);
 }
$sub_4 = $row['img_4'];
if($sub_4 != null) {
    unlink($sub_4);
 }

/* member */
$query = $db->query("select * from member where id = '{$U_ID}' ");
$row = $query->fetch();
$writer = $row["nickname"];

/* recipe_write */
$R_title = $_REQUEST["recipe_title"];
$R_introduce = $_REQUEST["recipe_introduce"];

if ($R_title== null){
	echo"<script>alert('タイトルを入力してください。'); location.href=('recipe_update.php?num=$num');</script>";
	return;
}

if ($R_introduce== null){
	echo"<script>alert('作り方を入力してください。'); location.href=('recipe_update.php?num=$num');</script>";
	return;
}


//　メインイメージ 　
$tempFile = $_FILES['thum_img']['tmp_name'];

$fileTypeExt = explode("/", $_FILES['thum_img']['type']);

$fileType = $fileTypeExt[0];

$fileExt = $fileTypeExt[1];
if($fileExt == Null) {
	echo"<script>alert('メインイメージは必須項目です。.'); location.href=('recipe_update.php?num=$num');</script>";
	return;
}
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "(jpg, bmp, gif, png)それ以外はできません。"; 
		exit;
		break;
}

if($fileType == 'image'){
	if($extStatus){
		$resFile = "./upload/{$_FILES['thum_img']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $resFile);
		if($imageUpload == true){
		
            
		}else{
			 echo "<script>alert('ファイルのアップロードに失敗しました。'); location.href=('recipe_update.php?num=$num');</script>";
		}
	}	
	else {
	     echo "<script>alert('jpg、bmp、gif、png ファイル以外にはアップできません。'); location.href=('recipe_update.php?num=$num');</script>";
		
	}	
}	
else {
	echo "<script>alert('イメージではありません。'); location.href=('recipe_update.php?num=$num');</script>";
	
}
//　メインイメージ

// 現在の時間
$curTime = date("Y-m-d H:i:s");
//recipe_write データ保存 
$db->exec("update recipe_write set recipe_title='{$R_title}', recipe_introduce='{$R_introduce}', writer='{$writer}', regdate='{$curTime}', recipe_thum='{$resFile}' where recipe_id = {$num}");


// sub_img1
if($_FILES['sub_img1']['type'] == NUll) {

	$sub_img1 = "";
	
} else {

$tempFile = $_FILES['sub_img1']['tmp_name'];
$fileTypeExt = explode("/", $_FILES['sub_img1']['type']);
$fileType = $fileTypeExt[0];
$fileExt = $fileTypeExt[1];
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "(jpg, bmp, gif, png)それ以外はできません。"; 
		exit;
		break;
}

if($fileType == 'image'){
	
	if($extStatus){
		
		$sub_img1 = "./upload/{$_FILES['sub_img1']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $sub_img1);
		
		if($imageUpload == true){
		
            
		}else{
			 echo "<script>alert('ファイルのアップロードに失敗しました。'); location.href=('recipe_update.php?num=$num');</script>";
		}
	}	
		
	else {
	     echo "<script>alert('jpg、bmp、gif、png ファイル以外にはアップできません。'); location.href=('recipe_update.php?num=$num');</script>";
		
	}	

} else {
	echo "<script>alert('イメージではありません。'); location.href=('recipe_update.php?num=$num');</script>";
	
       }
}

// sub_img1


// sub_img2
if($_FILES['sub_img2']['type'] == NUll) {

	$sub_img2 = "";
	
} else {

$tempFile = $_FILES['sub_img2']['tmp_name'];
$fileTypeExt = explode("/", $_FILES['sub_img2']['type']);
$fileType = $fileTypeExt[0];
$fileExt = $fileTypeExt[1];

$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "(jpg, bmp, gif, png)それ以外はできません。"; 
		exit;
		break;
}

if($fileType == 'image'){
	if($extStatus){
		$sub_img2 = "./upload/{$_FILES['sub_img2']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $sub_img2);
		
		if($imageUpload == true){
		
		}else{
			echo "<script>alert('ファイルのアップロードに失敗しました。'); location.href=('recipe_update.php?num=$num');</script>";
	   }
   }	
	   
   else {
		echo "<script>alert('jpg、bmp、gif、png ファイル以外にはアップできません。'); location.href=('recipe_update.php?num=$num');</script>";
	   
   }	

} else {
   echo "<script>alert('イメージではありません。'); location.href=('recipe_update.php?num=$num');</script>";
   
	  }
}
// sub_img2


// sub_img3
 if($_FILES['sub_img3']['type'] == NUll) {

	$sub_img3 = "";
	
} else {

$tempFile = $_FILES['sub_img3']['tmp_name'];
$fileTypeExt = explode("/", $_FILES['sub_img3']['type']);
$fileType = $fileTypeExt[0];
$fileExt = $fileTypeExt[1];
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "(jpg, bmp, gif, png)それ以外はできません。"; 
		exit;
		break;
}

if($fileType == 'image'){
	if($extStatus){
		$sub_img3 = "./upload/{$_FILES['sub_img3']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $sub_img3);
		if($imageUpload == true){
            
		}else{
			echo "<script>alert('ファイルのアップロードに失敗しました。'); location.href=('recipe_update.php?num=$num');</script>";
	   }
   }	
   else {
		echo "<script>alert('jpg、bmp、gif、png ファイル以外にはアップできません。'); location.href=('recipe_update.php?num=$num');</script>";
   }	

} else {
   echo "<script>alert('イメージではありません。'); location.href=('recipe_update.php?num=$num');</script>";
   
	  }
}
// sub_img3


// sub_img4
if($_FILES['sub_img4']['type'] == NUll) {

	$sub_img4 = "";
	
} else {

$tempFile = $_FILES['sub_img4']['tmp_name'];
$fileTypeExt = explode("/", $_FILES['sub_img4']['type']);
$fileType = $fileTypeExt[0];
$fileExt = $fileTypeExt[1];
$extStatus = false;

switch($fileExt){
	case 'jpeg':
	case 'jpg':
	case 'gif':
	case 'bmp':
	case 'png':
		$extStatus = true;
		break;
	
	default:
		echo "(jpg, bmp, gif, png)それ以外はできません。"; 
		exit;
		break;
}

if($fileType == 'image'){
	if($extStatus){
		$sub_img4 = "./upload/{$_FILES['sub_img4']['name']}";
		$imageUpload = move_uploaded_file($tempFile, $sub_img4);
		
		if($imageUpload == true){
		
		}else{
			echo "<script>alert('ファイルのアップロードに失敗しました。'); location.href=('recipe_update.php?num=$num');</script>";
	   }
   }	
   else {
		echo "<script>alert('jpg、bmp、gif、png ファイル以外にはアップできません。'); location.href=('recipe_update.php?num=$num');</script>";
   }	

} else {
   echo "<script>alert('イメージではありません。'); location.href=('recipe_update.php?num=$num');</script>";
   
	  }
}
// sub_img4


$db->exec("update cooking_img set img_1='{$sub_img1}', img_2='{$sub_img2}', img_3='{$sub_img3}', img_4='{$sub_img4}' where recipe_id = {$num}");

/* ingre_w */
$i_name_1= $_REQUEST["name_1"];
$i_name_2= $_REQUEST["name_2"];
$i_name_3= $_REQUEST["name_3"];
$i_name_4= $_REQUEST["name_4"];
$i_name_5= $_REQUEST["name_5"];
$i_name_6= $_REQUEST["name_6"];


$i_num_1= $_REQUEST["num_1"];
$i_num_2= $_REQUEST["num_2"];
$i_num_3= $_REQUEST["num_3"];
$i_num_4= $_REQUEST["num_4"];
$i_num_5= $_REQUEST["num_5"];
$i_num_6= $_REQUEST["num_6"];


$query = $db->query("select * from connection_w where recipe_id = {$num}");
$row = $query->fetch();
$I_ID = $row["ingre_id"];


$db->exec("update ingre_w set i_name_1='{$i_name_1}', i_name_2='{$i_name_2}', i_name_3='{$i_name_3}', i_name_4='{$i_name_4}',
   i_name_5='{$i_name_5}', i_name_6='{$i_name_6}', i_num_1='{$i_num_1}', i_num_2='{$i_num_2}', i_num_3='{$i_num_3}', i_num_4='{$i_num_4}',
    i_num_5= '{$i_num_5}', i_num_6='{$i_num_6}' where ingre_id = $I_ID");

//echo "<script>alert('レシピが修正されました。'); location.href=('recipe_view.php?num=$num ');</script>";