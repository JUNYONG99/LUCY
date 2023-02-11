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
    <link rel="stylesheet" href="css/myalter.css">
</head>
<body>
    <div class="wrap">
            <?php include "template/nav.php"?>
            <hr style="border: solid 1px #F8733F;
                       width: 20%;margin-top: 205px; margin-left: auto;margin-right: auto;">
            <div class="img">
                <br>
            </div>
            <div class="hong">
                <li>会員情報修正</li>
            </div>
            <br><br>
            <form method="POST" action="my_update.php">
                <div id="wrapper">
                    <div id="content">
                        <div>
                            <h3 class="join_title">
                                <label for="id">ニックネ-ム</label>
                            </h3>
                            <span class="box int_id">
                                <input type="text" id="id" name="nickname" class="int" maxlength="20">
                            </span>
                            <span class="error_next_box"></span>
                        </div>
                        <div>
                            <h3 class="join_title"><label for="pswd1">パスワ-ド</label></h3>
                            <span class="box int_pass">
                                <input type="password" id="pswd1" name="password" class="int" maxlength="20">
                                <span id="alertTxt">使用不可</span>
                            </span>
                            <span class="error_next_box"></span>
                        </div>
                        <div>
                            <h3 class="join_title"><label for="pswd2">パスワ-ド再確認</label></h3>
                            <span class="box int_pass_check">
                                <input type="password" id="pswd2" name="passwordCheck" class="int" maxlength="20">
                            </span>
                            <span class="error_next_box"></span>
                        </div>
                        <div>
                            <h3 class="join_title"><label for="email">メ-ル<span class="optional"></span></label></h3>
                            <span class="box int_email">
                                <input type="text" id="email" name="email" class="int" maxlength="100" placeholder="">
                            </span>
                            <span class="error_next_box">メ-ルアドレスをもう一度確認してください。</span>
                        </div>
                        <div>
                            <h3 class="join_title"><label for="phoneNo">電話番号</label></h3>
                            <span class="box int_mobile">
                                <input type="tel" id="mobile" name="phone" class="int" maxlength="16" placeholder="電話番号入力">
                            </span>
                            <span class="error_next_box"></span>
                        </div>
                    </div>
                </div>
                <br><br>
                <div id="btn4">
                    <input type="submit" id="btnJoin" style="border-radius:30px;" value="修正">
                    <br>
                </div>
            </form>
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