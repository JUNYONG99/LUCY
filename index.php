<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=1.0">
    <title>Tasty & Recipe</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- bootstrap --> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="wrap">

    <?php include "template/nav.php" ?>
    <!-- メインバナー -->
    <section class="visual">
          <ul class="slide">
              <li>
                  <div class="img">
                      <span class="imgBox"><img src="img/banner_1.jpg" alt="" height="600"></span>
                      <span class="mask a"></span><span class="mask b"></span>
                      <span class="mask c"></span><span class="mask d"></span>
                      <span class="page"><img src="img/1.png" alt="01"></span> 
                  </div>
                  <div class="title" style="color:#fff;">
                       <h2 style="font-weight: bold; font-size: 60px">
                        TASTY
                       </h2>
                  </div>
              </li>
              <li>
                  <div class="img">
                      <span class="imgBox"><img src="img/banner_2.jpg" alt="" height="600"></span>
                      <span class="mask a"></span><span class="mask b"></span>
                      <span class="mask c"></span><span class="mask d"></span>
                      <span class="page"><img src="img/2.png" alt="02"></span>
                  </div>
                  <div class="title font-weight-bold" style="color:#fff;">
                        <h2 style="font-weight: bold; font-size: 60px">
                          RECIPE
                       </h2>
                  </div>
              </li>
              <li>
                  <div class="img">
                      <span class="imgBox"><img src="img/banner_3.jpg" alt="" height="600"></span>
                      <span class="mask a"></span><span class="mask b"></span>
                      <span class="mask c"></span><span class="mask d"></span>
                      <span class="page"><img src="img/3.png" alt="03"></span>
                  </div>
                  <div class="title font-weight-bold" style="color:#fff;">
                       <h2 style="font-weight: bold; font-size: 60px">
                          MOVIE
                       </h2>
                  </div>
              </li>
          </ul>
    </section>
    <!-- 人気のレシピ -->
    <section class="global animate" data-animate="motion">
           <div class="title">
               <h2>Recipe Ranking</h2> 
               <p>Tastyを通じて<br>
                  様々なレシピをご覧ください。
               </p>
           </div> 
           <ul>
           <?php
                $numLines = 4;  //見える個数
                $query = $db->query("select * from recipe_write  order by hits desc limit $numLines"); //再生数順に出力
                while($row = $query->fetch()){
           ?>
            <li>
                <a href="recipe_view.php?num=<?=$row['recipe_id']?>">
                   <p class="img"><img src="<?=$row['recipe_thum']?>" style="width: 26.3rem; height: 26.3rem;"></p>
               </a>
            </li>

            <?php    
                }
            ?>
            </ul>
    </section>
    <!--　レシピ映像　-->
    <section class="premium">
        <div class="title">
            <h2>Cooking Movie</h2>
            <p>映像で会うともっとおいしいレシピ。<br>
               簡単に料理してみましょう !</p>
             <a class="btn btn-outline-dark" href="recipe_movie.php">すべて見る</a>
        </div>
       <ul class="banner">
        <div class="movie">
        <?php
            $query = $db->query("select * from recipe_movie  order by rand()"); //レシピ映像ランダム
            $row = $query->fetch(); //出力
        ?>
            <!-- YouTubeリンクで動画を読み込む -->
           <iframe src="https://www.youtube.com/embed<?=$row["recipe_url"]?>"  title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
           </div>
      </ul>
    </section>
       <br><br><br><br>
    <!-- サイト紹介　-->
    <section class="about" id="about">
           <img src="img/main_about1.png" alt="">
           <div class="inner animate" data-animate="motion">
               <h2>Tastyと一緒にやってみましょう。</h2>
               <div class="line">
                   <span></span>
                   <ul>
                       <li class="a"></li>
                       <li class="b"></li>
                       <li class="c"></li>
                   </ul>
                </div>
                <ul>
                     <li>
                         <h3>Recipe</h3>
                         <p>様々なレシピ情報を共有<br>
                            悩まずにいろんな食べ物に挑戦してみまましょう。<br>
                         </p>
                     </li>
                     <li>
                        <h3>Cooking Movie</h3>
                        <p>映像で会うともっとおいしいレシピ。<br>
                           簡単に料理してみましょう。</p>
                     </li>
                     <li>
                         <h3>Share</h3>
                         <p>いろんな人たちと <br>
                         あなたのレシピを共有してみまましょう。</p>
                    </li>
                </ul>
           </div>
    </section>

    <?php include "template/footer.php" ?>
       
<!-- bootstrap 4.6.2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/scrolla.jquery.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/script.js"></script>     
<?php


 if(isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
    $user_id = $_SESSION["userId"];
    $user_name = $_SESSION ["userName"];
    $query = $db->query("select * from member where id='{$user_id}'");
    $row = $query->fetch();

    $phone_number = $row["phone"];
    $email = $row["email"];
    $nick_name = $row["nickname"];
?>




<!-- Channel Plugin Scripts -->
<script>
  (function() {
    var w = window;
    if (w.ChannelIO) {
      return (window.console.error || window.console.log || function(){})('ChannelIO script included twice.');
    }
    var ch = function() {
      ch.c(arguments);
    };
    ch.q = [];
    ch.c = function(args) {
      ch.q.push(args);
    };
    w.ChannelIO = ch;
    function l() {
      if (w.ChannelIOInitialized) {
        return;
      }
      w.ChannelIOInitialized = true;
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = 'https://cdn.channel.io/plugin/ch-plugin-web.js';
      s.charset = 'UTF-8';
      var x = document.getElementsByTagName('script')[0];
      x.parentNode.insertBefore(s, x);
    }
    if (document.readyState === 'complete') {
      l();
    } else if (window.attachEvent) {
      window.attachEvent('onload', l);
    } else {
      window.addEventListener('DOMContentLoaded', l, false);
      window.addEventListener('load', l, false);
    }
  })();
  ChannelIO('boot', {
    "pluginKey": "c8928a97-de6e-4eb5-a60c-16088244e38f", 
    "memberId": "<?=$user_id ?>", 
    "profile": {
    "name": "<?=$user_name ?>", 
    "mobileNumber": "<?=$phone_number ?>",
    "email": "<?=$email?>", 
    "nickname": "<?=$nick_name?>"
    }
  });
</script>
<!-- End Channel Plugin -->
<?php
 } 
?>

   </div> 
</body>
</html>