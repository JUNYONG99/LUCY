<!doctype html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <?php
    $userId = trim($_POST["id"]);
    $userPw = trim($_POST["password"]);

    require("db_connect.php");

    $query = $db->query("select * from member where id='$userId' and pw='$userPw'");
    if ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        session_start();

        $_SESSION["userId"] = $row["id"];
        $_SESSION["userName"] = $row["name"];

        if ($row["id"] == "root") {
    ?>
            <script>
                alert('管理者で接続しました。');
                location.href = '#';
            </script>

        <?php
        } else {
        ?>
            <script>
                alert('<?= $row["name"] ?>様 TASTYえようこそ!');
                location.href = 'index.php';
            </script>
        <?php
        }
        ?>
    <?php
    } else {
    ?>
        <script>
            alert('会員情報が一致しません。');
            history.back();
        </script>

    <?php
    }
    ?>
</body>
</html>