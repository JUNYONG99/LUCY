<?php
   // local
   $db = new PDO("mysql:host=localhost;port=3307;dbname=phpdb","php","1234"); 
   //サーバー
   //$db = new PDO("mysql:host=tastyrecipe.co.kr; port=3306;dbname=aapp76","aapp76","june7933@");
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>