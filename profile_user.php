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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="icon" href="képek/8cd972dbde2746abb269a7668298e2a3.png" type="image/png">
   <link rel="stylesheet" href="loginstyle.css">
   <title>CompeTips</title>

</head>
<body>
   
<div class="center">
   <div class="btn">
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
      <div class="btn">
      <a href="update.php">Profil frissítése</a>
      </div>
      <div class="btn">
      <a href="home.php?logout=<?php echo $user_id; ?>">vissza</a>
      </div>
   </div>
</div>
</body>
</html>