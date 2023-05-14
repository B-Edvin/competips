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
        <style>
            body{
                height: 100vh;
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(http://digitalspyuk.cdnds.net/16/49/1600x800/landscape-1481196340-multiplayer-games.jpg);
                background-size: cover;
                background-position: center;
            }

            .dropdown_menu.open{
                height: 50px;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="navbar">
                <div class="logo"><a href="index.php">CompeTips</a></div>
                    <a class="action_btn" href="bejelentkezés.php">Bejelentkezés</a>
                    <div class="toggle_btn">
                        <i class="fa-solid fa-bars"></i>
                    </div> 
            </div>

            <main>
                <section id="words">
                    <h1>
                        Fedezd fel a legjobb csapat játékokat nálunk és légy bennük a legjobb! 
                    </h1>
                    <p>Csatlakozz a több mint 10 millió játékoshoz, és találd meg kedvenc játékaidat. <br> Csak nálunk találhatod meg a legjobb módszereket és oktató anyagokat! <br> Jelentkezz be és már kezdetjük is!</p>
                </section>
            </main>

            <div class="dropdown_menu">
                <li><a href="bejelentkezés.php" class="action_btn" >Bejelentkezés</a></li>
            </div>
        </header>

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