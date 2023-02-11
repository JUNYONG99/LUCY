<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    session_start();
    $U_ID = $_SESSION["userId"];

    $nickName = $_POST["nickname"];
    $userPw = $_POST["password"];
    $pwCheck = $_POST["passwordCheck"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    require("db_connect.php");

    if (!($nickName && $userPw && $email && $phone)) {

    ?>

        <script>
            alert('ちゃんと入力してください。.');
            history.back();
        </script>



    <?php
    } else if ($userPw != $pwCheck) {
    ?>

        <script>
            alert('パスワードが一致しません。');
            history.back();
        </script>
    <?php

    } else if ($db->query("select count(*) from member where nickname ='{$nickName}'")->fetchColumn() > 0) {

    ?>
        <script>
            alert('使用中のニックネームです。.');
            history.back();
        </script>
    <?php
    } else {
        $query = $db->query("select * from member where id = '{$U_ID}' ");
        $row = $query->fetch();
        $old_nickName = $row["nickname"];

        $db->exec("update member set nickname='{$nickName}', pw='{$userPw}', email='{$email}', phone='{$phone}' where id='{$U_ID}' ");

        $db->exec("update recipe_write set writer='{$nickName}' where writer='{$old_nickName}' ");
        $db->exec("update recipe_movie set writer='{$nickName}' where writer='{$old_nickName}' ");
    ?>
        <script>
            alert('会員情報が修正されました。');
            window.close();

            location.href = 'my.php';
        </script>
    <?php
    }
    ?>
</body>
</html>