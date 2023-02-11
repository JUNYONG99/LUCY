<?php
require("db_connect.php");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <link rel="shortcut icon" type="image/x-icon" href="/pjtCom/images/common/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.min.css" />
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/common.css" />
     <!-- font -->
     <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/moonspam/NanumSquare/master/nanumsquare.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="css/recipe_view.css">
    <link rel="stylesheet" type="text/css" href="css/sub.css" />
</head>
<body class="sub">
    <div class="wrap">
        <?php include "template/nav.php" ?>
        <div id="contents" class="recipe">
            <section class="western">
                <h2 class="tit" style="margin-top: 100px;">レシピ</h2><br><br>
                <?php
                $recipe_id = $_REQUEST["num"];

                $query = $db->query("update recipe_write set hits=hits+1 where recipe_id={$recipe_id}");

                $query = $db->query("select * from recipe_write where recipe_id = {$recipe_id}");
                $row = $query->fetch();
                $nickName = $row['writer'];
                $write_time = substr($row['regdate'], 0, 10);
                $hits = $row['hits'];
                $title = $row['recipe_title'];
                $thum_img = $row['recipe_thum'];
                $make_recipe = $row['recipe_introduce'];
                ?>
                <div id="na" style="text-align: right; margin-left: 890px; display:inline-block;">
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
                <?php
                if ($convention == "material") {

                ?>
                    <article class="bbs_gallery_view view_area">
                        <div class="info_area">
                            <figure class="img"><img src="<?= $thum_img ?>" style="width: 410px; height: 410px;" alt=""></figure>
                            <div class="txt_area">
                                <div class="sort_box">
                                </div>
                                <h3 class="tit"><?= $title ?></h3>
                                <p class="txt"></p>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
                            $user_id = $_SESSION["userId"];

                            $query = $db->query("select * from member where id = '{$user_id}' ");
                            $row = $query->fetch();
                            $check_name = $row['nickname'];

                            if ($check_name == $nickName) {
                        ?>
                                <div class="function_area">
                                    <a href="recipe_update.php?num=<?= $recipe_id ?>"><input type=button style="width:40pt;height:25pt; text-decoration: none;" value="修正">&nbsp;&nbsp;
                                    <a href="recipe_delete.php?num=<?= $recipe_id ?>"><input type=button style="width:40pt;height:25pt; " value="削除"></a>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    <?php
                } else if ($convention == "make") {
                    ?>
                        <article class="bbs_gallery_view view_area">
                            <div class="info_area">
                                <figure class="img" width="448" height="448">
                                    <p id="photo"><img src="<?= $thum_img ?>" style="width: 410px; height: 410px;" alt="" /></p>
                                </figure>
                                <div class="txt_area">
                                    <div class="sort_box">
                                    </div>
                                    <h3 class="tit"><?= $title ?></h3>
                                    <p class="txt"></p>
                                </div>
                            </div>
                            <?php
                            if (isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
                                $user_id = $_SESSION["userId"];

                                $query = $db->query("select * from member where id = '{$user_id}' ");
                                $row = $query->fetch();
                                $check_name = $row['nickname'];

                                if ($check_name == $nickName) {
                            ?>
                                    <div class="function_area">
                                        <a href="recipe_update.php?num=<?= $recipe_id ?>"><input type=button style="width:40pt;height:25pt; text-decoration: none;" value="修正">&nbsp;&nbsp;
                                        <a href="recipe_delete.php?num=<?= $recipe_id ?>"><input type=button style="width:40pt;height:25pt; " value="削除"></a>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div id="photo_list">
                                <ul id="inner_list">
                                    <?php
                                    $query = $db->query("select * from cooking_img where recipe_id = {$recipe_id}");
                                    $row = $query->fetch();

                                    $sub_1 = $row['img_1'];
                                    if ($sub_1 == null) {
                                        $sub_1 = "./upload/unnamed.png";
                                    }

                                    $sub_2 = $row['img_2'];
                                    if ($sub_2 == null) {
                                        $sub_2 = "./upload/unnamed.png";
                                    }
                                    $sub_3 = $row['img_3'];
                                    if ($sub_3 == null) {
                                        $sub_3 = "./upload/unnamed.png";
                                    }
                                    $sub_4 = $row['img_4'];
                                    if ($sub_4 == null) {
                                        $sub_4 = "./upload/unnamed.png";
                                    }
                                    ?>
                                    <li>
                                        <a href="<?= $sub_1 ?>"><img src="<?= $sub_1 ?>" width="200" height="160" /></a>
                                    </li>
                                    <li>
                                        <a href="<?= $sub_2 ?>"><img src="<?= $sub_2 ?>" width="200" height="160" /></a>
                                    </li>
                                    <li>
                                        <a href="<?= $sub_3 ?>"><img src="<?= $sub_3 ?>" width="200" height="160" /></a>
                                    </li>
                                    <li>
                                        <a href="<?= $sub_4 ?>"><img src="<?= $sub_4 ?>" width="200" height="160" /></a>
                                    </li>
                                </ul>
                            </div>
                            </table>
                        <?php
                    }
                        ?>
                        <div class="tab_menu">
                            <a href="?num=<?= $recipe_id ?>&convention=material" style="background-color:<?= $material ?>; Color:<?= $material_w ?>; text-decoration:none;">材料</a>
                            <a href="?num=<?= $recipe_id ?>&convention=make" style="background-color:<?= $make ?>; Color: <?= $make_w ?>; text-decoration:none;">作り方</a>
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
                                        $query = $db->query("select * from connection_w where recipe_id={$recipe_id}");
                                        $row = $query->fetch();
                                        $ingre_id = $row['ingre_id'];

                                        $query = $db->query("select * from ingre_w where ingre_id={$ingre_id}");
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
                    <a class="b-btn-type01" style="text-decoration:none" href="recipe_write.php">レシピリスト</a>
                </li>
            </ul>
    </li>
    </article>
    </section>
    </div>
    <hr />
<?php
                        } else if ($convention == "make") {

?>
    <table style="font-size:20px; line-height:50px; text-align: left; margin-top: 100px; margin-left: 10px;">
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
                    <a class="b-btn-type01" style="text-decoration:none" href="recipe_write.php">レシピリスト</a>
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

<script src="js/jquery-3.3.2.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/utils.js"></script>
<script src="js/function.js"></script>
<script src="js/serveq.js"></script>
<script>
        //<![CDATA[
        window.onload = function() {

            var list_zone = document.getElementById("inner_list");
            var list_a = list_zone.getElementsByTagName("a");

            for (var i = 0; i < list_a.length; i++) {
                list_a[i].onclick = function() {
                    var ph = document.getElementById("photo").children[0];
                    ph.src = this.href;
                    return false;
                }
            }

            var n_btn = document.getElementById("btn_next");
            var m_num = 0;
            n_btn.onclick = function() {
                if (m_num >= list_a.length - 3) return false;
                m_num++;
                list_zone.style.marginLeft = -100 * m_num + "px";

                return false;
            }

            var b_btn = document.getElementById("btn_before");
            b_btn.onclick = function() {
                if (m_num <= 0) return false;
                m_num--;
                list_zone.style.marginLeft = -100 * m_num + "px";
            }

        }

        //]]>
    </script>
</body>

</html>