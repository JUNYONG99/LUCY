<?php

require("db_connect.php");

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
	echo"<script>alert('タイトルを入力してください。'); location.href=('movie_submit.php');</script>";
	return;
}

if ($M_introduce== null){
	echo"<script>alert('作り方を入力してください。'); location.href=('movie_submit.php');</script>";
	return;
}

if ($M_url== null){
	echo"<script>alert('動画のURLは必須項目です。'); location.href=('movie_submit.php');</script>";
	return;
}

/* 現在の時間 */
$curTime = date("Y-m-d H:i:s");

$db->exec("insert into recipe_movie(recipe_title, recipe_introduce, writer, regdate, recipe_url, hits)
 values('{$M_title}', '{$M_introduce}', '{$writer}', '{$curTime}', '{$M_url}', 0)");

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

$db->exec("insert into ingre_m(i_name_1, i_name_2, i_name_3, i_name_4, i_name_5, i_name_6, i_num_1, i_num_2, i_num_3, i_num_4, i_num_5, i_num_6)
 values('{$i_name_1}', '{$i_name_2}', '{$i_name_3}', '{$i_name_4}', '{$i_name_5}', '{$i_name_6}',
  '{$i_num_1}', '{$i_num_2}', '{$i_num_3}', '{$i_num_4}', '{$i_num_5}', '{$i_num_6}')");

$query = $db->query("select * from recipe_movie where recipe_title = '{$M_title}' ");
$row = $query->fetch();

$Recipe_ID = $row["recipe_id"];


$query = $db->query("select * from ingre_m where i_name_1 = '{$i_name_1}' and i_num_1 = '{$i_num_1}' and i_name_2 = '{$i_name_2}' and i_num_2 = '{$i_num_2}' and
i_name_3 = '{$i_name_3}' and i_num_3 = '{$i_num_3}' and i_name_4 = '{$i_name_4}' and i_num_4 = '{$i_num_4}' and i_name_5 = '{$i_name_5}' and i_num_5 = '{$i_num_5}' and 
i_name_6 = '{$i_name_6}' and i_num_6 = '{$i_num_6}' ");
$row = $query->fetch();

$Ingre_ID = $row["ingre_id"];


$db->exec("insert into connection_m(recipe_id, ingre_id) values('{$Recipe_ID}', '{$Ingre_ID}')");
$query = $db->query("select * from connection_m where recipe_id = '{$Recipe_ID}' and ingre_id = '{$Ingre_ID}'");
$row = $query->fetch();

$Con_ID = $row["con_m_id"];

$db->exec("insert into my_movie(con_m_id, id) values('{$Con_ID}', '{$U_ID}')");
echo "<script>alert('レシピが登録されました。'); location.href=('recipe_video.php?num=$Recipe_ID ');</script>";