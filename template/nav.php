<header>
		<div class="top">
		<div class="wrapper">
		<ul class="top-menu">
            <?php
            session_start();
            if(isset($_SESSION["userId"]) || isset($_SESSION["userName"])) {
               $user_id = $_SESSION["userId"];
               $user_name = $_SESSION ["userName"];
?>
               <li class="test mt-1"><a href="logout.php"><p>ログアウト</p></a></li>
<?php
            } else {
?>
               <li class="test mt-1"><a href="join_screen.php"><p>新規登録</p></a></li>
			      <li class="test mt-1"><a href="login_screen.php"><p>ログイン</p></a></li>
<?php
            }
           
 ?>          
	    </ul>
	    </div>
	    </div>
          <span class ="bg"></span>
          <a href="#" class="open"><span class="lnr lnr-menu"></span></a>
          <a href="index.php" class="logo"><img src="img/logo1.png" style="max-width: 100%;"></a>
          <nav>
             <a href="#" class="close"><span class="lnr lnr-cross"></span></a>
              <ul class="gnb" style="font-weight: 800;">
				      <li><a href="index.php#about">About</a></li>
                  <li><a href="recipe_write.php">Recipe</a></li>
				      <li><a href="my.php">MY</a></li>
              </ul>
          </nav> 
</header>