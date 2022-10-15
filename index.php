<?php include_once './app/config.php'; ?>

<h1>Formularios de Prueba</h1>

<!-- Auth -->

<!-- login -->
<form enctype="multipart/form-data" action="./app/AuthController.php" method="POST">
  <input type="email" name="email"><br><br>
  <input type="password" name="password"><br><br>
  <input type="submit" value="submit">
  <input type="hidden" name="action" value="access"><br><br>
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>"><br><br>
</form>

<!-- register -->
<!-- <form enctype="multipart/form-data" action="./app/AuthController.php" method="POST">

  <input type="text" name="name"><br><br>
  <input type="text" name="lastname"><br><br>
  <input type="email" name="email"><br><br>
  <input type="number" name="phone_number"><br><br>
  <input type="password" name="password"><br><br>
  <input type="file" name="profile_photo" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="register">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- recovery -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AuthController.php">
  <input type="email" name="email" id="email">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="recovery">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- logout -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AuthController.php">
  <input type="submit" value="Logout">

  <input type="hidden" name="action" value="logout">
  <input type="hidden" name="email" id="email" value="<?= $_SESSION['email'] ?>">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- User -->


<!-- Get All Users -->
<?php
// include_once './app/UsersController.php';

// $controller = new UserController();
// $controller->getAllUsers();
?>

<!-- Create User -->

<!-- <form enctype="multipart/form-data" action="./app/UsersController.php" method="POST">

  <input placeholder="nombre" type="text" name="name"><br><br>
  <input placeholder="lastname" type="text" name="lastname"><br><br>
  <input placeholder="email" type="email" name="email"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number"><br><br>
  <input placeholder="password" type="password" name="password"><br><br>
  <input placeholder="file" type="file" name="profile_photo" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="create">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- Get User -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/UsersController.php">
  <input type="number" name="id" id="userId">
  
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getuser">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- Edit -->

<!-- <form enctype="multipart/x-www-form-urlencoded" action="./app/UsersController.php" method="POST">
  <input placeholder="id" type="number" name="id"><br><br>
  <input placeholder="nombre" type="text" name="name"><br><br>
  <input placeholder="lastname" type="text" name="lastname"><br><br>
  <input placeholder="email" type="email" name="email"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number"><br><br>
  <input placeholder="password" type="password" name="password"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="edit">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- Delete User -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/UsersController.php">
  <input type="number" name="id" id="userId">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="delete">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Update User Image -->

<!-- <form action="./app/UsersController.php" enctype="multipart/form-data" method="POST">
  <input type="number" name="id" id="userId"><br><br>
  <input placeholder="file" type="file" name="profile_photo" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updateImage">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->



<!-- Products -->

<!-- getProductBySlug -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/ProductsController.php">
  <input type="text" name="slug" id="slug">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getProductBySlug">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->



<!-- Categories -->

<!-- getCategories -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/CategoriesController.php">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getCategories">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- createCategory -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/CategoriesController.php">

  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="slug" type="text" name="slug" id="slug"><br><br>
  <input placeholder="category_id" type="number" name="category_id" id="category_id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="createCategory">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- getCategory -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/CategoriesController.php">
  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getCategory">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->