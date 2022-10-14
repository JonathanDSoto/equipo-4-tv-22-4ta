<?php include_once './app/config.php'; ?>

<h1>Formulario de Prueba</h1>

<form enctype="multipart/form-data" action="./app/AuthController.php" method="POST">
  <input type="email" name="email"><br><br>
  <input type="password" name="password"><br><br>
  <input type="submit" value="submit">
  <input type="hidden" name="action" value="access"><br><br>
  <input type="hidden" name="super_token" value="<?=$_SESSION['super_token']?>"><br><br>
</form>

<!-- <form enctype="multipart/form-data" action="./app/AuthController.php" method="POST">

  <input type="text" name="name"><br><br>
  <input type="text" name="lastname"><br><br>
  <input type="email" name="email"><br><br>
  <input type="number" name="phone_number"><br><br>
  <input type="password" name="password"><br><br>
  <input type="file" name="profile_photo" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="register">
  <input type="hidden" name="super_token" value="<?=$_SESSION['super_token']?>">
</form> -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/AuthController.php">
  <input type="email" name="email" id="email">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="recovery">
  <input type="hidden" name="super_token" value="<?=$_SESSION['super_token']?>">
</form> -->


<!-- <form enctype="multipart/form-data" method="POST" action="./app/AuthController.php">
  <input type="submit" value="Logout">

  <input type="hidden" name="action" value="logout">
  <input type="hidden" name="email" id="email" value="<?=$_SESSION['email']?>">
  <input type="hidden" name="super_token" value="<?=$_SESSION['super_token']?>">
</form> -->
