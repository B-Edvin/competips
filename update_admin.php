<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

$update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
$update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
$game_name = mysqli_real_escape_string($conn, $_POST['game_name']);
$rank = mysqli_real_escape_string($conn, $_POST['rank']);

mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', rank = '$rank', game = '$game_name', email = '$update_email' WHERE user_id = '$user_id'") or die('query failed');

$old_pass = $_POST['old_pass'];
$update_pass = mysqli_real_escape_string($conn, ($_POST['update_pass']));
$new_pass = mysqli_real_escape_string($conn, ($_POST['new_pass']));
$confirm_pass = mysqli_real_escape_string($conn, ($_POST['confirm_pass']));

if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
        if($update_pass != $old_pass){
            $message[] = 'A régi jelszó nem egyezik!';
        }elseif($new_pass != $confirm_pass){
            $message[] = 'A jelszó nem egyezik!';
        }else{
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE user_id = '$user_id'") or die('query failed');
            $message[] = 'Jelszófirssítés sikeres';
        }
    }


$update_image = $_FILES['update_image']['name'];
$update_image_size = $_FILES['update_image']['size'];
$update_image_tmp_name = $_FILES['update_image']['tmp_name'];
$update_image_folder = 'uploaded_img/'.$update_image;

            if(!empty($update_image)){
                if($update_image_size > 2000000){
        $message[] = 'A kép mérete túl nagy';
            }else{
                $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET images = '$update_image' WHERE user_id = '$user_id'") or die('query failed');
            if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'profilkép frissítve!';
        }
    }   

$update_video = $_FILES['update_video']['name'];
$update_video_size = $_FILES['update_video']['size'];
$update_video_tmp_name = $_FILES['update_video']['tmp_name'];
$update_video_folder = 'video/'.$update_video;
    
            if(!empty($update_video)){
                if($update_video_size > 50000000){
        $message[] = 'A videó mérete túl nagy';
            }else{
                $video_update_query = mysqli_query($conn, "UPDATE `user_form` SET video_name = '$update_video' WHERE user_id = '$user_id'") or die('query failed');
            if($video_update_query){
                move_uploaded_file($update_video_tmp_name, $update_video_folder);
            }
            $message[] = 'Videó feltöltve!';
        }
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="képek/8cd972dbde2746abb269a7668298e2a3.png">
        <link rel="stylesheet" href="updates.css">
        <title>CompeTips</title>
    </head>
    <body>
        <div class="update-profile">

        <?php
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE user_id = '$user_id'") or die('query failed');
            if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }
        ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['images'] == ''){
            echo '<img src="képek/default-avatar.png">';
            }else{
            echo '<img src="uploaded_img/'.$fetch['images'].'">';
            }
            if(isset($message)){
            foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
            }
            }
        ?>
        <div class="flex">
            <div class="inputBox">
            <span>felhasználónév :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            </div>
            <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>Régi jelszó:</span>
            <input type="password" name="update_pass" placeholder="írja be a régi jelszót" class="box">
            <span>Új jelszó:</span>
            <input type="password" name="new_pass" placeholder="írja be az új jelszót" class="box">
            <span>Jelszó megerősítése:</span>
            <input type="password" name="confirm_pass" placeholder="erősítse meg jelszavát" class="box">
            <span>Játék: </span>
            <select name="game_name" style="color: #a6a6a6; width: 85%; padding: 5px 10px; font-size: 17px; background: #010B13; border-radius: 5px; text-align: center;">
                <option><?php echo $fetch['game']; ?></option>
                <option>League of Legends</option>
                <option>BrawlHalla</option>
                <option>CS:GO</option>
                <option>Valorant</option>
            </select>
            <span>Rank: </span>
            <input type="text" name="rank" placeholder="<?php echo $fetch['rank']; ?>" class="box">
            <span>profilkép frissítése :</span>
            <input style="width: 100%; font-size: 17px;" type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="upload">
            <span>Video feltöltése: </span>
            <input style="width: 100%; font-size: 17px;" type="file" name="update_video" class="upload">
            </div>
        </div>
        <div class="btn">
        <input type="submit" value="Profil frissítése" name="update_profile">
        </div>
        <a href="profile_admin.php">Vissza</a>
    </form>
</div>
</body>
</html>