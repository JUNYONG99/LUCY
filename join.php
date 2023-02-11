<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
  $userId = $_POST["id"];
  $userPw = $_POST["pw"];
  $userName = $_POST["name"];
  $day = $_POST["year"];
  
  $nickName = $_POST["nickname"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  
  require("db_connect.php");
  
  if (!($userId && $userPw && $userName && $day && $nickName && $email && $phone)) {
	  
?>
            <script>
                alert('ちゃんと入力してください。');
            	history.back();
            </script>
<?php
	  
  } else if ($db->query("select count(*) from member where id='$userId'")->fetchColumn() > 0) {
 
?>
            <script>
                alert('登録済みIDです。');
                history.back();
            </script>
<?php
     } else if ($db->query("select count(*) from member where phone='$phone'")->fetchColumn() > 0){
?>
        <script>
            alert('登録済みアカウントです。');
            history.back();
        </script>
<?php
     }else if($db->query("select count(*) from member where nickname='$nickName'")->fetchColumn() > 0) {
?>
      <script>
          alert('使用中のニックネームです。');
          history.back();
      </script>
<?php
     }else {
			 $db->exec("insert into member (id, pw, nickname, email, name, birthday, phone)
	                       values ('$userId', '$userPw', '$nickName','$email', '$userName', '$day','$phone')");
				  
?>
              <script>
                alert('会員登録が完了しました。 ログイン画面に移動します。');
            	window.close();
				location.href='login_screen.php';
              </script>

<?php
	 }      
?>
</body>
</html>