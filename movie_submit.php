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
    <link rel="stylesheet" href="css/reciperegis1.css">
</head>
<body>
    <div class="wrap">
        <?php include "template/nav.php" ?>
        <body>
            <form action="movie_register.php" method="POST">
                <div class="event1">
                    <li>レシピ登録</li>
                </div>
                <div class="box">
                    <ul>
                        <li>タイトル &nbsp; &nbsp; <input type="text" id="name" class="int" name="recipe_title"></li>
                        <li style="margin-left: 156px; margin-top:-200px">紹介 &nbsp; &nbsp;</li><textarea id="make" cols="50" class="int1" style="vertical-align:top;" rows="10" name="recipe_introduce"></textarea>
                    </ul>
                    <div class="box1">
                        <li>動画URL &nbsp; &nbsp;
                            <input type="text" style="width:300px; height: 50px; font-size:18px;" class="form-control m-3 youtube-url" name="movie_url" /><br>
                            <button class="btn btn-primary btn-block mt-3" id="getBtn" type="button" style="width:300px; height: 40px; font-size:18px; border:none; margin-left: 155px; margin-top:3px; border-radius:10px;">サムネイルプレビュー</button>
                            <div class="thumbnail-wrap" style="margin-left: 150px; margin-top:20px;">
                            </div>
                        </li>
                    </div>
                </div>
                <div class="box3" style="margin-bottom:50px;">
                    <li style="margin-left: 94px; margin-bottom: 30px;">材料</li>
                    <li><input type="text" id="name" class="int3" name="name_1"><input type="text" id="name" class="int4" name="num_1"></li>
                    <li><input type="text" id="name" class="int3" name="name_2"><input type="text" id="name" class="int4" name="num_2"></li>
                    <li><input type="text" id="name" class="int3" name="name_3"><input type="text" id="name" class="int4" name="num_3"></li>
                    <li><input type="text" id="name" class="int3" name="name_4"><input type="text" id="name" class="int4" name="num_4"></li>
                    <li><input type="text" id="name" class="int3" name="name_5"><input type="text" id="name" class="int4" name="num_5"></li>
                    <li><input type="text" id="name" class="int3" name="name_6"><input type="text" id="name" class="int4" name="num_6"></li>
                    <div class="b-btn01 type01">
                        <ul class="b-btn-wrap">
                            <li><a class="b-btn-type01" href="recipe_movie.php">キャンセル</a></li>
                            <li><input id="input" type="submit" value="登録"></li>
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
    <script src="js.js"></script>
     <!--ユーチューブサムネイルプレビュー-->
     <script>
          const getButton = document.querySelector("#getBtn");
          const youtubeUrl = document.querySelectorAll(".youtube-url");
          const thumbnailWrap = document.querySelector(".thumbnail-wrap")
          getButton.addEventListener('click', getThum)
          function getThum() {
              let thumArr = [];
              youtubeUrl.forEach(url => {
                  if (url.value !== "") {
                      let replaceUrl = url.value;
                      let finUrl = '';
                      replaceUrl = replaceUrl.replace("https://youtu.be/", '');
                      replaceUrl = replaceUrl.replace("https://www.youtube.com/embed/", '');
                      replaceUrl = replaceUrl.replace("https://www.youtube.com/watch?v=", '');
                      finUrl = replaceUrl.split('&')[0];
                      thumArr.push(finUrl);
                  }
              });
              thumArr.forEach(thum => {
                  let img = document.createElement("img");
                  img.setAttribute("src", `https://img.youtube.com/vi/${thum}/mqdefault.jpg`)
                  thumbnailWrap.appendChild(img);
              });
          };
    </script>
</body>
</html>