<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:logout.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:logout.php');
}
?>

<!DOCTYPE html>
<html lang="hu">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="style.css">
      <link rel="icon" href="képek/8cd972dbde2746abb269a7668298e2a3.png">
      <script src="https://use.fontawesome.com/5b540e0a2b.js"></script>
      <title>CompeTips</title>
   </head>
   <body>
      <header>
      <style>
               header{
                  height: 10vh;
                  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(képek/gháttér.gif);
                  background-size: cover;
                  background-position: center;   
               }
               
               .dropdown_menu.open{
               height: 110px;
               }
            </style>
            <div class="navbar">
               <div class="logo"><a href="index.php">CompeTips</a></div>
               <div class="links">
               <li><a href="logout.php" class="action_btn">Kijelentkezés</a></li>
               <li><a href="update_admin.php" class="action_btn" >Profil szerkesztése</a></li>
               </div>
                  <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                  </div> 
            </div>
            <div class="dropdown_menu">
               <li><a href="logout.php" class="action_btn">Kijelentkezés</a></li>
               <li><a href="update_admin.php" class="action_btn" >Profil szerkesztése</a></li>
            </div>
      </header>

      <section id="adprof">
         <div class="profstyle">
               <div class="up">
               <?php
               $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE user_id = '$user_id'") or die('query failed');
                  if(mysqli_num_rows($select) > 0){
                     $fetch = mysqli_fetch_assoc($select);
                  }
                     if($fetch['images'] == ''){
                        echo '<img src="képek/default-avatar.png">';
                     }else{
                        echo '<img src="uploaded_img/'.$fetch['images'].'">';
                     }
               ?>
               <h1><?php echo $fetch['name']; ?></h1>
            </div>
            <div class="admain">
               <h1>Játék: </h1>
               <h3 style="color: #010B13; text-align: left; padding: 0px 0px 0px 20px; font-size: 40px;"><?php echo $fetch['game']; ?></h3>
               <h1 style="margin-top: 10%;">Rank: </h1>
               <h3 style="color: #010B13; text-align: left; padding: 0px 0px 0px 20px; font-size: 40px;"><?php echo $fetch['rank']; ?></h3>
            </div>
         <div class="up">
            <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
               $fetch = mysqli_fetch_assoc($select);
            }
               if($fetch['video_name'] == ''){
                  echo '<h1>Nincs video feltöltve!</h1>';
               }else{
                  echo '<video src="video/'.$fetch['video_name'].'" controls></video>';
               }
            ?>
         </div>
         <div class="admain">
               <h1>Vedd fel velem a kapcsolatot:</h1>
               <h2><?php echo $fetch['email'] ?></h2>
               <img src="képek/mail.png">
         </div>
         </div>
      </section>

      <section id="elh">
            <div class="elh-text">
            <h1>Elérhetőségeink</h1>
            </div>
            <div class="elh-row">
            <div class="elh-left">
               <img src="képek/8cd972dbde2746abb269a7668298e2a3.png">
               <p>A CompeTips egy edzői, képzési és erőforrás-platform, amely olyan játékosok számára készült, akik szeretnének jobbá válni az általuk kedvelt játékokban. Olyan közösség vagyunk, amely elkötelezett amellett, hogy segítsünk a játékosoknak fejlődni, és végső soron még jobban élvezni a versenyszerű játékokat.</p>
            </div>
            <div class="elh-right">
               <h1>Lépj velünk kapcsolatba</h1>
               <p>example_email@gmail.com<i class="fa fa-paper-plane"></i></p>
            </div>
            </div>
            <div class="platformok">
            <a href="" target=""><i class="fa fa-twitter"></i></a>
            <a href="" target=""><i class="fa fa-discord"></i></a>
            <a href="" target=""><i class="fa fa-facebook"></i></a>
            </div>
      </section> 
      
      <script>
            const toggleBtn = document.querySelector('.toggle_btn')
            const toggleBtnIcon = document.querySelector('.toggle_btn i')
            const dropDownMenu = document.querySelector('.dropdown_menu')

            toggleBtn.onclick = function(){
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')
            toggleBtnIcon.classList = isOpen
            ? 'fa-solid fa-xmark'
            : 'fa-solid fa-bars'
            }
      </script>
   </body>
</html>