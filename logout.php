<?php
session_start();
session_destroy();
?>
 <script>
     alert('ログアウトされました。');
     window.close();
 </script>
 <meta http-equiv='refresh' content='0;url=login_screen.php'>