<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=1.0">
    <title>Tasty & Recipe</title>
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom -->
    <link rel="stylesheet" href="css/recipe.css">
</head>
<body>
    <div class="wrap">
        <?php include "template/nav.php" ?>
        <body>
            <div class="recipe">
                <div class="b-sel-box b-cate-basic">
                    <a href="recipe_write.php"><button type="submit" class="b-sel-btn" style="font-weight:bold;">レシピ</button></a>
                    <a href="recipe_movie.php"><button type="submit" class="b-sel-btn" style="font-weight:bold; background-color:#F8733F;color:#fff">映像</button></a>
                </div>
            </div>
            <?php
            $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "recipe_title";
            $regdate = "black";
            $hits = "black";
            if ($sort == "regdate") {
                $regdate = "#F8733F";
            } else if ($sort == "hits") {
                $hits = "#F8733F";
            }
            ?>
            <nav>
                <div class="early">
                    <ul>
                        <li><a href="?sort=regdate" style="Color: <?= $regdate ?>; text-decoration: none;">最新順</a></li>
                        <li> | </li>
                        <li><a href="?sort=hits" style="Color: <?= $hits ?>; text-decoration: none;">照会順</a></li>
                    </ul>
                </div>
            </nav>
            <div class="list con">
                <ul class="row">
                    <?php
                    $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "recipe_title";
                    $numLines = 12;
                    $numLinks = 5;

                    $page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"];
                    $start = ($page - 1) * $numLines;

                    $query = $db->query("select * from recipe_movie order by $sort desc limit $start, $numLines");
                    while ($row = $query->fetch()) {
                    ?>
                        <div class="card mr-3 mb-4" style="width: 18rem;">
                            <a href="recipe_video.php?num=<?= $row['recipe_id'] ?>"><img src=" https://img.youtube.com/vi<?= $row['recipe_url'] ?>/mqdefault.jpg" width="286" height="140" alt=""></a>
                            <div class="card-body">
                                <p class="font-weight-bold"><?= $row['recipe_title'] ?></p>
                                <small>作成者 <?= $row['writer'] ?> <span class="float-right">照会数 <?= $row['hits'] ?></span></small>
                            </div>
                        </div>
                       
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="b-btn01 type01">
                <ul class="b-btn-wrap">
                    <?php
                    if (isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
                    ?>
                        <li>
                            <a class="b-btn-type01" style="text-decoration: none;" href="movie_submit.php">レシピ映像登録</a>
                        </li>

                    <?php
                    } else {
                    ?>
                        <li>
                            <a class="b-btn-type01" style="text-decoration: none;" href="non_login.php">レシピ映像登録</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <?php
            $firstLink = floor(($page - 1) / $numLinks) * $numLinks + 1;
            $lastLink = $firstLink + $numLinks - 1;

            $numRecords = $query = $db->query("select count(*) from recipe_movie")->fetchColumn();
            $numPage = ceil($numRecords / $numLines);
            if ($lastLink > $numPage) {
                $lastLink = $numPage;
            }
            ?>
            <div class="b-paging01 type01">
                <div class="b-paging-wrap">
                    <ul>
                        <?php
                        if ($firstLink > 1) {
                        ?>
                            <li class="first pager">
                                <a href="recipe_movie.php?page=1&sort=<?= $sort ?>" title="처음 페이지로 이동하기"><img src="img/btn-first-page.gif"></a>
                            </li>
                            <li class="prev pager">
                                <a href="recipe_movie.php?page=<?= $firstLink - $numLinks ?>&sort=<?= $sort ?>" title="이전 페이지로 이동하기"><img src="img/btn-prev-page.gif"></a>
                            </li>
                        <?php
                        }
                        for ($i = $firstLink; $i <= $lastLink; $i++) {
                        ?>
                            <li><a href="recipe_movie.php?page=<?= $i ?>&sort=<?= $sort ?>" <?= ($i == $page) ? "class='active'" : $i ?>><?= ($i == $page) ? "$i" : $i ?></a></li>
                        <?php
                        }
                        if ($lastLink < $numPage) {
                        ?>
                            <li class="next pager">
                                <a href="recipe_movie.php?page=<?= $firstLink + $numLinks ?>&sort=<?= $sort ?>" title="다음 페이지로 이동하기"><img src="img/btn-next-page.gif"></a>
                            </li>
                            <li class="last pager">
                                <a href="recipe_movie.php?page=<?= $numPage ?>&sort=<?= $sort ?>" title="마지막 페이지로 이동하기"><img src="img/btn-last-page.gif"></a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </body>
        <br><br><br>

    <?php include "template/footer.php" ?>

    </div>
    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- jQuery -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/scrolla.jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>