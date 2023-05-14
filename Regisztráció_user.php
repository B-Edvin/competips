<?php

@include 'config.php';

if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = ($_POST['password']);
  $cpass = ($_POST['cpassword']);
  $user_type = $_POST['user_type'];

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass';") or die('query failed');

  if(mysqli_num_rows($select) > 0){

      $error[] = 'A felhasználó már létezik';

  }else{

      if($pass != $cpass){
        $error[] = 'A jelszó nem egyezik!';
      }else{
        $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password,user_type) VALUES('$name', '$email', '$pass','$user_type')") or die('query failed');
        if($insert){
          $error[] = 'Sikeres regisztráció';
          header('location:bejelentkezés.php');
        }else{
          $error[] = 'Nem sikerült regisztrálni!';
        }
      }
  }

};
?>


<!DOCTYPE html>
<html lang="hu">
  <head>
    <link rel="stylesheet" href="loginstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="képek/8cd972dbde2746abb269a7668298e2a3.png">
    <meta charset="utf-8">
    <title>CompeTips</title>
  </head>
  <body>
    <div class="center">
        <h1>Regisztráció</h1>
        <form class="" action="" method="post" autocomplete="off">
        <div class="txt_field">
            <input type="text" name="name" required>
            <span></span>
            <label>Név</label>
          </div>
            <div class="txt_field">
              <input type="email" name="email" required>
              <span></span>
              <label>E-mail</label>
            </div>
            <div class="txt_field">
                    <input type="password" name="password" required>
                    <span></span>
                    <label>Jelszó</label>
            </div>
            <div class="txt_field">
              <input type="password" name="cpassword" required>
              <span></span>
              <label>Erősítse meg jelszát</label>
            </div>
            <select name="user_type">
              <option value="user">felhasználó</option>
              <option value="admin">tartalomgyártó</option>
            </select>
            <div class="sign_up">
              <a href="bejelentkezés.php">Bejelentkezés</a>
            </div>
            <div class="sign_up">
              <input type="submit" name="submit" value="Regisztráció">
            </div>
        </form>
    </div>
  </body>
</html>
