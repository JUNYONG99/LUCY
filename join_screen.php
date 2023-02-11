<!DOCTYPE html>
<html lnag="ko">
<head>
    <meta charset="UTF-8">
    <title>新規会員登録</title>
    <link rel="stylesheet" href="css/joing.css">
</head>
<body>
    <!-- header_m -->
    <div id="header_m">
        <a href="index.php" class="logo"><img src="img/logo1.png" style="max-width: 100%;"></a>
    </div>
    <div id="wrapper">
        <div id="content">
            <form name="joinform" method="POST" action="join.php">
                <div>
                    <h3 class="join_title">
                        <label for="id">ID</label>
                    </h3>
                    <span class="box int_id">
                        <input type="text" id="id" name="id" class="int" maxlength="20">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                <div>
                    <h3 class="join_title"><label for="pswd1">パスワード</label></h3>
                    <span class="box int_pass">
                        <input type="text" id="pswd1" name="pw" class="int" maxlength="20">
                        <span id="alertTxt">使用不可</span>
                        <img src="img/lock.PNG" id="pswd1_img1" class="pswdImg">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                <div>
                    <h3 class="join_title"><label for="pswd2">パスワードの再確認</label></h3>
                    <span class="box int_pass_check">
                        <input type="text" id="pswd2" class="int" maxlength="20">
                        <img src="img/lock.PNG" id="pswd2_img1" class="pswdImg">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                <div>
                    <h3 class="join_title"><label for="name">名前</label></h3>
                    <span class="box int_name">
                        <input type="text" id="name" name="name" class="int" maxlength="20">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                <div>
                    <h3 class="join_title"><label for="yy">誕生日</label></h3>
                    <div id="bir_wrap">
                        <span class="box int_name">
                            <input type="text" id="name" name="year" class="int" maxlength="20">
                        </span>
                        <span class="error_next_box"></span>
                    </div>
                </div>
                <div>
                    <h3 class="join_title"><label for="nickname">ニックネーム</label></h3>
                    <span class="box int_name">
                        <input type="text" id="name" name="nickname" class="int" maxlength="20">

                    </span>
                    <span class="error_next_box">必須情報です。</span>
                </div>
                <div>
                    <h3 class="join_title"><label for="email">メール<span class="optional"></span></label></h3>
                    <span class="box int_email">
                        <input type="text" id="email" name="email" class="int" maxlength="100" placeholder="選択入力">
                    </span>
                    <span class="error_next_box">メールアドレスをもう一度確認してください。</span>
                </div>
                <div>
                    <h3 class="join_title"><label for="phoneNo">電話番号</label></h3>
                    <span class="box int_mobile">
                        <input type="tel" id="mobile" name="phone" class="int" maxlength="16" placeholder="電話番号入力">
                    </span>
                    <span class="error_next_box"></span>
                </div>
                <div class="btn_area">
                    <input type="submit" id="btnJoin" value="会員登録">
                </div>
            </form>
        </div>
    </div>
    <br>
    <?php include "template/footer.php" ?>
    </div>
    <!--script-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/joins.js"></script>
</body>
</html>