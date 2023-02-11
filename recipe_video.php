<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0, maximum-scale=1.0">
    <title>Tasty & Recipe</title>
    <!-- font -->
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/normalize.min.css" />
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <!-- custom -->
    <link rel="stylesheet" href="css/recipe_video.css">
    <link rel="stylesheet" type="text/css" href="css/sub_v.css" />
    <link rel="stylesheet" type="text/css" href="css/common_v.css" />
</head>
<body class="sub">
        <?php include "template/nav.php" ?>
        <div id="contents" class="recipe">
            <?php
            $movie_id = $_REQUEST["num"];
            $query = $db->query("update recipe_movie set hits=hits+1 where recipe_id={$movie_id}");

            $query = $db->query("select * from recipe_movie where recipe_id = {$movie_id}");
            $row = $query->fetch();
            $nickName = $row['writer'];
            $write_time = substr($row['regdate'], 0, 16);
            $hits = $row['hits'];
            $title = $row['recipe_title'];
            $movie_url = $row['recipe_url'];
            $make_recipe = $row['recipe_introduce'];
            ?>
            <section class="western">
                <h2 class="tit" style="margin-top: 100px;"><?= $title ?></h2><br><br>
                <div id="na" style="text-align: right; margin-left: 830px; display:inline-block;">
                    <h9>作成日:&nbsp;<?= $write_time?>&nbsp;&nbsp;閲覧数：<?= $hits ?>&nbsp; [<?= $nickName ?>]</h9>
                </div>
                <?php
                $convention = isset($_REQUEST["convention"]) ? $_REQUEST["convention"] : "material";
                $material = "white";
                $material_w = "black";

                $make = "white";
                $make_w = "black";
                if ($convention == "material") {
                    $material = "#F8733F";
                    $material_w = "white";
                } else if ($convention == "make") {
                    $make = "#F8733F";
                    $make_w = "white";
                }
                ?>
                <article class="bbs_gallery_view view_area">
                    <figure class="img" style="width:800px; height: 530px;"><iframe src="https://www.youtube.com/embed<?= $movie_url ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></figure>
                    <?php
                    if (isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
                        $user_id = $_SESSION["userId"];

                        $query = $db->query("select * from member where id = '{$user_id}' ");
                        $row = $query->fetch();
                        $check_name = $row['nickname'];

                        if ($check_name == $nickName) {
                    ?>
                            <div class="function_area">
                                <a href="movie_update.php?num=<?= $movie_id ?>"><input type=button style="width:40pt;height:25pt; " value="修正">&nbsp;&nbsp;
                                    <a href="movie_delete.php?num=<?= $movie_id ?>"><input type=button style="width:40pt;height:25pt; " value="削除"></a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <br><br><br>
                    <div class="tab_menu">
                        <a href="?num=<?= $movie_id ?>&convention=material" style="background-color:<?= $material ?>; Color:<?= $material_w ?>; text-decoration: none;">材料</a>
                        <a href="?num=<?= $movie_id ?>&convention=make" style="background-color:<?= $make ?>; Color: <?= $make_w ?>; text-decoration: none;">紹介</a>
                    </div>
                    <?php
                    if ($convention == "material") {
                    ?>
                        <div id="ingredient" class="tab_contents ingredient show">
                            <table class="col3">
                                <caption>材料</caption>
                                <colgroup>
                                    <col>
                                    <col>
                                    <col>
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>材料名</th>
                                        <th>重量</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = $db->query("select * from connection_m where recipe_id={$movie_id}");
                                    $row = $query->fetch();
                                    $ingre_id = $row['ingre_id'];

                                    $query = $db->query("select * from ingre_m where ingre_id={$ingre_id}");
                                    $row = $query->fetch();

                                    $ingre_name1 = $row["i_name_1"];
                                    $ingre_name2 = $row["i_name_2"];
                                    $ingre_name3 = $row["i_name_3"];
                                    $ingre_name4 = $row["i_name_4"];
                                    $ingre_name5 = $row["i_name_5"];
                                    $ingre_name6 = $row["i_name_6"];

                                    $ingre_num1 = $row["i_num_1"];
                                    $ingre_num2 = $row["i_num_2"];
                                    $ingre_num3 = $row["i_num_3"];
                                    $ingre_num4 = $row["i_num_4"];
                                    $ingre_num5 = $row["i_num_5"];
                                    $ingre_num6 = $row["i_num_6"];
                                    ?>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name1 ?></td>
                                        <td><?= $ingre_num1 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name2 ?></td>
                                        <td><?= $ingre_num2 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name3 ?></td>
                                        <td><?= $ingre_num3 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name4 ?></td>
                                        <td><?= $ingre_num4 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name5 ?></td>
                                        <td><?= $ingre_num5 ?></td>
                                    </tr>
                                    <tr>
                                        <td style="height:40px;"><?= $ingre_name6 ?></td>
                                        <td><?= $ingre_num6 ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        </li>
                        </ul>
        </div>
    </div>
    <li>
        <div class="b-btn01 type01">
            <ul class="b-btn-wrap">
                <li>
                    <a class="b-btn-type01" style="text-decoration: none;"  href="recipe_movie.php">レシピリスト</a>
                </li>
            </ul>
    </li>
    </article>
    </section>
    </div>
    </main>
    <hr />
<?php
    } else if ($convention == "make") {
?>
    <table style="font-size:20px; line-height:50px; text-align: left; margin-top: 120px; margin-left: 10px;">
        <tbody>
            <tr>
                <td><?= nl2br($make_recipe) ?></td>
            </tr>
        </tbody>
    </table>
    </div>
    </li>
    </ul>
    </div>
    </div>
    <li>
        <div class="b-btn01 type01">
            <ul class="b-btn-wrap">
                <li>
                    <a class="text" style="text-decoration: none;" href="recipe_movie.php">レシピリスト</a>
                </li>
            </ul>
    </li>
    </article>
    </section>
    </div>
    </main>
<?php
    }
?>

<?php include "template/footer.php" ?>
<!-- bootstrap -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.min.js" integrity="sha512-7rusk8kGPFynZWu26OKbTeI+QPoYchtxsmPeBqkHIEXJxeun4yJ4ISYe7C6sz9wdxeE1Gk3VxsIWgCZTc+vX3g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- jQuery -->
<script src="js/jquery-3.3.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/utils.js"></script>
<!-- custom js --> 
<script src="js/function.js"></script>
<script src="js/serveq.js"></script>
</body>
</html>