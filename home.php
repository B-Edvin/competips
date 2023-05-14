<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'] )){
header('location: bejelentkezes.php');
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
                    height: 100vh;
                    background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(képek/competitive_gaming_1.jpeg);
                    background-size: cover;
                    background-position: center;   
                }
                
                .dropdown_menu.open{
                height: 220px;
                }
            </style>
            <div class="navbar">
                <div class="logo"><a href="home.php">CompeTips</a></div>
                    <ul class="links">
                        <li><a href="home.php">Kezdőlap</a></li>
                        <li><a href="games.php">Játékaink</a></li>
                        <li><a href="tartgy.php">Tartalomgyártók</a></li>
                        <li><a href="logout.php">Kijelentkezés</a></li>
                    </ul>
                    <a class="action_btn" href="profile_user.php">Profil</a>
                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div> 
            </div>
            <main>
                <section id="words">
                    <h1>Tálald meg az utat, hogy még jobb legyél!</h1>
                </section>

            </main>

            <div class="dropdown_menu">
                <li><a href="home.php">Kezdőlap</a></li>
                <li><a href="games.php">Játékaink</a></li>
                <li><a href="tartgy.php">Tartalomgyártók</a></li>
                <li><a href="logout.php">Kijelentkezés</a></li>
                <li><a href="profile_user.php" class="action_btn" >Profil</a></li>
            </div>
        </header>

        <!------------------>

        <section class="downpage">
            <style>
                body{
                    background-image: url(képek/dwnhatter.jpg);
                    background-position: center;
                    background-size: cover;
                }
            </style>
            <section class="summary">
                    <h1>Fedezz fel és találd meg számításaidat nálunk!</h1>
                    <div class="box">
                        <div class="inf_imgs">
                            <a href="games.php">
                            <img src="képek/valorant.jpg">
                            <h3>Találd meg a legjobb játékokat</h3>
                            <p>Válogass a legnépszerübb játékokból és válj a legjobbá!</p>
                        </a>
                        </div>
                        <div class="inf_imgs">
                            <a href="tartgy.php">
                            <img src="képek/pc.jpg">
                            <h3>Válaszd a kedvenced</h3>
                            <p>Iratkozz fel és kövesd a kedvenc tartalomgyártóid az adott témában és tanulj tőlük.</p>
                        </a>
                        </div>
                        </div>
                    </div>
            </section>
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
            <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="" target="_blank"><i class="fa fa-discord"></i></a>
            <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
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