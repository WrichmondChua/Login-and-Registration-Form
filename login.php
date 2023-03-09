<?php
require 'config.php';
if (!empty($_SESSION["id"])) {
  header("Location: index.php");
}
if (isset($_POST["submit"])) {
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) > 0) {
    if ($password == $row['password']) {
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    } else {
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  } else {
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="logindesign">
    <h1>Just Some Kind of Website</h1>
  </div>
  <div class="userpass">
    <div class="login">
      <h2>Login</h2>
    </div>
    <form class="" action="" method="post" autocomplete="off">
      <label for="usernameemail">Username or Email: </label>
      <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>
      <label for="password">Password: </label>
      <input type="password" name="password" id="password" required value=""> <br> <br>
      <button type="submit" name="submit">Login</button>
    </form>
  </div>
  <div class="register">
    <a href="registration.php">Register</a>
  </div>
</body>

</html>