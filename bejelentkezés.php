<?php

@include 'config.php';
session_start();

if(isset($_POST['submit'])){

  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, ($_POST['password']));

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

  if(mysqli_num_rows($select) > 0){

      if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['user_id'];
        header('location:home.php');}
  
      if($row['user_type'] == 'admin'){
        $_SESSION['admin_name'] = $row['name'];
        header('location:profile_admin.php');
      }else
      if($row['user_type'] == 'user'){
        $_SESSION['user_name'] = $row['name'];
        header('location:home.php');
      }
  }else{
      $error[] = 'Hibás email cím vagy jelszó!';
  }
};
?>


<!DOCTYPE html>
<html lang="hu" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="képek/8cd972dbde2746abb269a7668298e2a3.png">
        <title>CompeTips</title>
        <link rel="stylesheet" href="loginstyle.css">
    </head>
    <body>
        <div class="center">
            <h1>Bejelentkezés</h1>
            <form method="post" autocomplete="off">
            <?php
              if(isset($error)){
              foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
                  };
              };
              ?>
                <div class="txt_field">
                    <input name="email" type="email" required>
                    <span></span>
                    <label>Email</label>
                </div>
                <div class="txt_field">
                        <input name="password" type="password" required>
                        <span></span>
                        <label>Jelszó</label>
                </div>
                <input type="submit" name="submit" value="Bejelentkezés">
                <div class="sign_up">
                  <p> Még nem regisztrált?<a href="Regisztráció_user.php">regisztráció</a></p>
                </div>
            </form>
        </div>
    </body>
</html>
