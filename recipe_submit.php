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
    <!--custom -->
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/reciperegis.css">
</head>
<body>
    <div class="wrap">
        <?php include "template/nav.php" ?>
        <body>
            <div class="event1">
                <li>レシピ登録</li>
                <br/>
            </div>
            <form action="write_register.php" method="POST" enctype="multipart/form-data">
                <div class="box">
                    <ul>
                        <li>タイトル &nbsp;&nbsp;
                            <input style="margin-right:-40px;" type="text" id="name" name="recipe_title" class="int">
                        </li>
                        <li style="margin-left: 420px; margin-top:-200px">作り方 &nbsp; &nbsp;</li><textarea id="make" cols="50" class="int1" style="vertical-align:top;" rows="10" name="recipe_introduce"></textarea>
                    </ul>
                    <div class="box1">
                        <li>料理写真 &nbsp; &nbsp; &nbsp; &nbsp;
                            <div id="root">
                                <hr>
                                <div class="contents">
                                    <div class="upload-box">
                                        <div id="drop-file" class="drag-file">
                                            <img src="https://img.icons8.com/pastel-glyph/2x/image-file.png"  class="image">
                                            <p class="message">アップロードするファイルをドラッグします。</p>
                                            <img src="" alt="プレビューイメージ" class="preview">
                                        </div>
                                        <label class="file-label" for="chooseFile">アップロード</label>
                                        <input class="file" name="thum_img" id="chooseFile" type="file" onchange="dropFile.handleFiles(this.files)" accept="image/png, image/jpeg, image/gif">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
s                <div class="box2" style="margin-left:-520px;">
                    <br><br><br>
                    <input id="file-input" type="file" name="sub_img1">
                    <input id="file-input" type="file" name="sub_img2">
                    <input id="file-input" type="file" name="sub_img3">
                    <input id="file-input" type="file" name="sub_img4">
                </div>
                <div class="box3">
                    <li style="margin-left: 94px; margin-bottom: 30px;">材料</li>
                    <li><input type="text" id="name" class="int3" name="name_1"><input type="text" id="name" class="int4" name="num_1"></li>
                    <li><input type="text" id="name" class="int3" name="name_2"><input type="text" id="name" class="int4" name="num_2"></li>
                    <li><input type="text" id="name" class="int3" name="name_3"><input type="text" id="name" class="int4" name="num_3"></li>
                    <li><input type="text" id="name" class="int3" name="name_4"><input type="text" id="name" class="int4" name="num_4"></li>
                    <li><input type="text" id="name" class="int3" name="name_5"><input type="text" id="name" class="int4" name="num_5"></li>
                    <li><input type="text" id="name" class="int3" name="name_6"><input type="text" id="name" class="int4" name="num_6"></li>
                    <div class="b-btn01 type01">
                        <ul class="b-btn-wrap">
                            <li>
                                <a class="b-btn-type01" href="recipe_view.php?num=<?= $num ?>">キャンセル</a>
                            </li>
                            <li>
                                <input id="input" type="submit" value="登録">
                            </li>
                    </div>
            </form>
        <br><br>
    <?php include "template/footer.php" ?>
    </div>
    <!-- bootstrap 4.6.2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--script-->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/scrolla.jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script>
    <!-- custom -->
    <script type="text/javascript" src="js/upload.js"></script>
</body>
</html>