<?php

require("db_connect.php");

$num = $_REQUEST["num"];

/* Session */
session_start();
$U_ID = $_SESSION["userId"];
$user_name = $_SESSION["userName"];

/* member */
$query = $db->query("select * from member where id = '{$U_ID}' ");
$row = $query->fetch();
$writer = $row["nickname"];

/* recipe_movie */
$M_title = $_REQUEST["recipe_title"];
$M_introduce = $_REQUEST["recipe_introduce"];
$M_url = substr($_REQUEST["movie_url"],16);



if ($M_title== null){
	echo"<script>alert('タイトルを入力してください。'); location.href=('movie_update.php?num=$num');</script>";
	return;
}

if ($M_introduce== null){
	echo"<script>alert('作り方を入力してください。'); location.href=('movie_update.php?num=$num');</script>";
	return;
}

if ($M_url== null){
	echo"<script>alert('動画のURLは必須項目です。'); location.href=('movie_update.php?num=$num');</script>";
	return;
}

/* 現在の時間 */
$curTime = date("Y-m-d H:i:s");


$db->exec("update recipe_movie set recipe_title='{$M_title}', recipe_introduce='{$M_introduce}',
  writer='{$writer}', regdate='{$curTime}', recipe_url='{$M_url}' where recipe_id = $num");
 

/* ingre_m */
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


$query = $db->query("select * from connection_m where recipe_id = $num");
$row = $query->fetch();
$I_ID = $row["ingre_id"];

$db->exec("update ingre_m set i_name_1='{$i_name_1}', i_name_2='{$i_name_2}', i_name_3='{$i_name_3}', i_name_4='{$i_name_4}',
   i_name_5='{$i_name_5}', i_name_6='{$i_name_6}', i_num_1='{$i_num_1}', i_num_2='{$i_num_2}', i_num_3='{$i_num_3}', i_num_4='{$i_num_4}',
    i_num_5= '{$i_num_5}', i_num_6='{$i_num_6}' where ingre_id = $I_ID");

echo "<script>alert('レシピが修正されました。'); location.href=('recipe_video.php?num=$num ');</script>";