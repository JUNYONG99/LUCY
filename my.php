<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=1.0">
    <title>Tasty & Recipe</title>
    <!--font-->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/my.css">
</head>
<body>
    <div class="wrap">
        <?php  include "template/nav.php"?>
        <?php 
        if(!($user_id && $user_name)) {
        ?>
        <script>
                alert('ログインが必要となります。');
                window.close();
	            location.href='login_screen.php';
        </script>
        <?php
        }
            require("db_connect.php");
            $query = $db->query("select * from member where id='{$user_id}'");
            $row = $query->fetch();
            $email = $row["email"];
            $nickname = $row["nickname"];
        ?>
            <div class="box">
                <img class="profile" src="img/profile.png">
            </div>

            <div class="hong">
                <li><?= $nickname ?></li>
            </div>
            <div class="email">
                <li>(<?= $email ?>)</li>
            </div>
            <div id="btn1">
                <a href="my_recipe_write.php">自分のレシピ</a>
            </div>
            <div id="btn3">
                <a href="myalter.php">会員情報修正</a>
            </div>
            <div id="btn4">
                <a href="logout.php">ログアウト</a>
            </div>
        <br><br>
        <?php include "template/footer.php"?>
    </div>
    <!--script-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/scrolla.jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>