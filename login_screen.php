<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="css/login.css">
    <!--font-->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/51db22a717.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrap">
        <?php include "template/nav.php"?>
        <form name="LoginForm" method="post" action="">
            <section class="login-input-section-wrap">
                <h2 style="font-size: 30px; margin-bottom: 50px;">ログイン</h2>
                <div class="login-input-wrap">
                    <input placeholder="ID" type="text" name="id" id="id"></input>
                </div>
                <div class="login-input-wrap password-wrap">
                    <input placeholder="パスワード" type="password" name="password"></input>
                </div>
                <div class="login-button-wrap">
                    <input type="button" style="width: 425px; height :48px; font-size: 18px; background: #F8733F;
                                                color: white; border: #FF9D2D;
                                                border-radius: 20px;"
                                                value="ログイン" onclick="LoginCheck();">
                    <div class="login-stay-sign-in">
                        <input type="checkbox" name="idsave" id="idsave"><span>ID保存</span></input>

        </form>
        <li><a href="join_screen.php">新規会員登録</a></li>
    </div>
    </section>
    <br><br><br>
    <?php include "template/footer.php" ?>
    </div>
    <!--script-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/scrolla.jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script>
    <!--ログインチェック-->
    <script>
        function LoginCheck() {
            var F = document.LoginForm;
            if (F.id.value == "") {
                alert("IDを入力してください。");
                F.id.focus();
                return false;
            }
            if (F.password.value == "") {
                alert("パスワードを入力してください。");
                F.password.focus();
                return false;
            }
            F.action = "LoginCheck.php";
            F.submit();
        }
    </script>
    <script>
        $(document).ready(function() {


            var key = getCookie("key");
            $("#id").val(key);


            if ($("#id").val() != "") {
                $("#idsave").attr("checked", true);
            }

            $("#idsave").change(function() {
                if ($("#idsave").is(":checked")) {
                    setCookie("key", $("#id").val(), 2);
                } else {
                    deleteCookie("key");
                }
            });


            $("#id").keyup(function() {
                if ($("#idsave").is(":checked")) {
                    setCookie("key", $("#id").val(), 2);
                }
            });
        });

        function setCookie(cookieName, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
            document.cookie = cookieName + "=" + cookieValue;
        }

        function deleteCookie(cookieName) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() - 1);
            document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
        }

        function getCookie(cookieName) {
            cookieName = cookieName + '=';
            var cookieData = document.cookie;
            var start = cookieData.indexOf(cookieName);
            var cookieValue = '';
            if (start != -1) {
                start += cookieName.length;
                var end = cookieData.indexOf(';', start);
                if (end == -1) end = cookieData.length;
                cookieValue = cookieData.substring(start, end);
            }
            return unescape(cookieValue);
        }
    </script>
</body>
</html>