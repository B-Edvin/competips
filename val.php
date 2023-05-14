<?php
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'] )){
header('location: bejelentkezes.php');
}
?>

<!DOCTYPE html>
<html>
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
        <div class="dropdown_menu">
            <li><a href="home.php">Kezdőlap</a></li>
            <li><a href="games.php">Játékaink</a></li>
            <li><a href="tartgy.php">Tartalomgyártók</a></li>
            <li><a href="logout.php">Kijelentkezés</a></li>
            <li><a href="profile_user.php" class="action_btn" >Profil</a></li>
        </div>
    </header>
        <section id="adprof">
            <div class="profstyle">
            <div class="up">
                <style>
                    .up img{
                        margin-left: -5%;
                        width: 450px;
                        height: 250px;
                        border-radius: 40px;
                        border: 2px solid #010B13;
                    }

                    .admain h2{
                        margin-bottom: -20px;
                    }

                    p{
                        margin-bottom: 20px;
                    }

                    @media screen and (max-width: 770px) {
                    .up,.admain{
                        width: 100%;
                        font-size: 14px;
                    }

                    .up img{
                        text-align: center;
                        width: 250px;
                        height: 250px;
                    }

                    .up h1{
                        text-align: center;
                        font-size: 50px;
                    }}
                </style>
                <img src="képek/játékok/valorant.jfif">
                <h1>Valorant</h1>
            </div>
                <div class="admain">
                <h2>Csatlakozz a legjobbak közé!</h2>
                <p>A játék világa tele van kihívásokkal, azonban ne feledd, hogy minden nehézség csak egy újabb lehetőség arra, hogy növeld a játékos készségeidet. A győzelem és a vereség is a fejlődéshez vezet, mert azokból tanulhatsz a legtöbbet.
                    Az igazi siker a kitartásból és az elszántságból fakad. Soha ne add fel a céljaidat, ha úgy érzed, nehéz megszerezni a ranglétrán a kívánt pozíciót, akkor válogass legjobb oktatóink közül.</p>
                    <a href="tartgy.php" class="action_btn">Vágjunk Bele!</a>
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
        <a href="" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="" target="_blank"><i class="fa fa-discord"></i></a>
        <a href="" target="_blank"><i class="fa fa-google"></i></a>
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