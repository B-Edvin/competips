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
            <div class="logo"><a href="index.php">CompeTips</a></div>
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
            <li><a href="tartgy.php">Tartalomgyártok</a></li>
            <li><a href="logout.php">Kijelentkezés</a></li>
            <li><a href="profile_user.php" class="action_btn">Profil</a></li>
            </div>
            <div class="dropdown_menu">
                <li><a href="home.php">Kezdőlap</a></li>
                <li><a href="games.php">Játékaink</a></li>
                <li><a href="tartgy.php">Tartalomgyártók</a></li>
                <li><a href="profile_user.php" class="action_btn" >Profil</a></li>
            </div>
    </header>

    <section id="adprof">
        <div style="padding: 10px 100px 10px 100px;">
            <div>
            <?php 
						$query = "select * from user_form order by user_id";

						$result = mysqli_query($conn,$query);
					?>

					<?php if(mysqli_num_rows($result) > 0):?>

						<?php while ($row = mysqli_fetch_assoc($result)):?>

							<?php 
								$user_id = $row['user_id'];
								$query = "select name,images,video_name,email,game,rank,user_type from user_form where user_id = '$user_id' limit 1";
								$result2 = mysqli_query($conn,$query);

								$user_row = mysqli_fetch_assoc($result2);
							?>
							<div style="background-color:white;display: flex;border:solid thin #aaa;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;">
                            <?php if($user_row['user_type'] == 'admin'):?>
								<div style="flex:1;text-align: center;">
                                <?php
                                    if($user_row['images'] == ''){
                                        echo '<img src="képek/default-avatar.png" style="border-radius:50%;margin:10px;width:100px;height:100px;object-fit: cover;">';
                                    }else{
                                        echo '<img src="uploaded_img/'.$user_row['images'].'" style="border-radius:50%;margin:10px;width:100px;height:100px;object-fit: cover;">';
                                    }
                                    ?>
									<br>
									<p style="font-weight: bold; color: black;"><?=$user_row['name']?></p>
								</div>
								<div style="flex: 8;">
									<?php if(isset($row['game'])):?>
										<div style="margin: auto;">
											<h1 style="color:black; text-align: center; margin-top: 10px;"><?=$row['game']?></h1>
                                            <h2 style="text-align: center;"><?=$row['rank']?></h2>
                                            <h2 style="text-align: center; margin-top: 20px;"><?=$row['email']?></h2>
										</div>
									<?php endif;?>
								</div>
                                <div>
                                    <?php
                                        if($row['video_name'] == ''){
                                            echo '';
                                        }else{
                                            echo '<video style = "border-radius: 20px; width: 300px; padding: 10px 10px 10px 10px;" src="video/'.$row['video_name'].'" controls></video>';
                                        }
                                    ?>
                                </div>
							<?php endif;?>
						</div>
						<?php endwhile;?>
					<?php endif;?>
				</div>
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