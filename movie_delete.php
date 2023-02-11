<?php

session_start();
$U_ID= $_SESSION["userId"];

require("db_connect.php");

$movie_id = $_REQUEST["num"];

$query = $db->query("select * from connection_m where recipe_id = {$movie_id}");
$row = $query->fetch();
$Con_ID = $row['con_m_id'];
$Ingre_id = $row['ingre_id'];

$query = $db->query("select * from my_movie where con_m_id={$Con_ID} and id='{$U_ID}' ");
$row = $query->fetch();
$My_movie_id = $row['my_movie_id'];

$query = $db->query("delete from my_movie where my_movie_id = {$My_movie_id} ");
$query = $db->query("delete from connection_m where con_m_id={$Con_ID} ");
$query = $db->query("delete from recipe_movie where recipe_id={$movie_id} ");
$query = $db->query("delete from ingre_m where ingre_id={$Ingre_id} ");

echo "<script>alert('アップした動画を削除しました。'); location.href=('recipe_movie.php');</script>";

?>