<?php

session_start();
$U_ID= $_SESSION["userId"];

require("db_connect.php");

$recipe_id = $_REQUEST["num"];

$query = $db->query("select * from connection_w where recipe_id = {$recipe_id}");
$row = $query->fetch();
$Con_ID = $row['con_w_id'];
$Ingre_id = $row['ingre_id'];


$query = $db->query("select * from my_recipe where con_w_id={$Con_ID} and id='{$U_ID}' ");
$row = $query->fetch();
$My_recipe_id = $row['my_recipe_id'];


$query = $db->query("select * from recipe_write where recipe_id = {$recipe_id}");
$row = $query->fetch();
$thum = $row['recipe_thum'];
unlink($thum);

$query = $db->query("select * from cooking_img where recipe_id = {$recipe_id}");
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

$query = $db->query("delete from my_recipe where my_recipe_id = {$My_recipe_id} ");
$query = $db->query("delete from connection_w where con_w_id={$Con_ID} ");
$query = $db->query("delete from cooking_img where recipe_id={$recipe_id} ");
$query = $db->query("delete from recipe_write where recipe_id={$recipe_id} ");
$query = $db->query("delete from ingre_w where ingre_id={$Ingre_id} ");

echo "<script>alert('登録したレシピを削除しました。'); location.href=('recipe_write.php');</script>";
?>