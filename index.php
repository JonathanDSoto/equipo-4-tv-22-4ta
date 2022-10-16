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

<!-- getProductByCategorySlug -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/ProductsController.php">
  <input type="text" name="slug" id="slug">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getProductByCategorySlug">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/ProductsController.php">
  <input type="text" name="slug" id="slug">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getProductBySlug">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Get Products -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/ProductsController.php">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getProducts">
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


<!-- updateCategory -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/CategoriesController.php">
  <input placeholder="id" type="number" name="id" id="id"><br><br>
  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="slug" type="text" name="slug" id="slug"><br><br>
  <input placeholder="category_id" type="number" name="category_id" id="category_id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updateCategory">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- deleteCategory -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/CategoriesController.php">
  <input placeholder="id" type="number" name="id" id="id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="deleteCategory">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->



<!-- Brands -->

<!-- All Brands -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/BrandsController.php">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getBrands">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Get Brand -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/BrandsController.php">
  <input placeholder="id" type="number" name="id" id="id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getBrand">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Create Brand -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/BrandsController.php">
  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="slug" type="text" name="slug" id="slug"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="createBrand">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Create Brand -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/BrandsController.php">
  <input placeholder="id" type="number" name="id" id="id"><br><br>
  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="slug" type="text" name="slug" id="slug"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updateBrand">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Delete Brand -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/BrandsController.php">
  <input placeholder="id" type="number" name="id" id="id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="deleteBrand">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- Clientes -->

<!-- All Clientes -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/ClientsController.php">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getClients">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Get Client -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/ClientsController.php">

  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getClient">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Create Client -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/ClientsController.php">
  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="email" type="email" name="email" id="email"><br><br>
  <input placeholder="password" type="password" name="password" id="password"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number" id="phone_number"><br><br>
  <input placeholder="is_suscribed" type="number" name="is_suscribed" id="is_suscribed" value='1'><br><br>
  <input placeholder="level_id" type="number" name="level_id" id="level_id" value='1'><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="createClient">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Update Client -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/ClientsController.php">
  <input placeholder="name" type="text" name="name" id="name"><br><br>
  <input placeholder="email" type="email" name="email" id="email"><br><br>
  <input placeholder="password" type="password" name="password" id="password"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number" id="phone_number"><br><br>
  <input placeholder="is_suscribed" type="number" name="is_suscribed" id="is_suscribed" value='1'><br><br>
  <input placeholder="level_id" type="number" name="level_id" id="level_id" value='1'><br><br>
  <input placeholder="id" type="number" name="id" id="id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updateClient">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Delete Client -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/ClientsController.php">

  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="deleteClient">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->



<!-- Address -->

<!-- Get Client Address -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AddressController.php">

  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getClientAddress">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Get Address -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AddressController.php">

  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getAddress">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Create Address -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AddressController.php">

  <input placeholder="first_name" type="text" name="first_name" id="first_name"><br><br>
  <input placeholder="last_name" type="text" name="last_name" id="last_name"><br><br>
  <input placeholder="street_and_use_number" type="text" name="street_and_use_number" id="street_and_use_number"><br><br>
  <input placeholder="postal_code" type="number" name="postal_code" id="postal_code"><br><br>
  <input placeholder="city" type="text" name="city" id="city"><br><br>
  <input placeholder="province" type="text" name="province" id="province"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number" id="phone_number"><br><br>
  <input placeholder="is_billing_address" type="text" name="is_billing_address" id="is_billing_address"><br><br>
  <input placeholder="client_id" type="text" name="client_id" id="client_id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="createAddress">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Update Address -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AddressController.php">

  <input placeholder="first_name" type="text" name="first_name" id="first_name"><br><br>
  <input placeholder="last_name" type="text" name="last_name" id="last_name"><br><br>
  <input placeholder="street_and_use_number" type="text" name="street_and_use_number" id="street_and_use_number"><br><br>
  <input placeholder="postal_code" type="number" name="postal_code" id="postal_code"><br><br>
  <input placeholder="city" type="text" name="city" id="city"><br><br>
  <input placeholder="province" type="text" name="province" id="province"><br><br>
  <input placeholder="phone_number" type="number" name="phone_number" id="phone_number"><br><br>
  <input placeholder="is_billing_address" type="text" name="is_billing_address" id="is_billing_address"><br><br>
  <input placeholder="client_id" type="text" name="client_id" id="client_id"><br><br>
  <input placeholder="id" type="text" name="id" id="id"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updateAddress">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Delete Address -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/AddressController.php">

  <input type="number" name="id" id="id">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="deleteAddress">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->



<!-- Presentations -->

<!-- Get Presentation by Product -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php">
  <input type="number" name="id" id="id">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getPresentationByProduct">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Get Presentation -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php">
  <input type="number" name="id" id="id">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="getPresentation">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Create Presentation -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="code" type="text" name="code" id="code"><br><br>
  <input placeholder="weight_in_grams" type="number" name="weight_in_grams" id="weight_in_grams"><br><br>
  <input placeholder="stock" type="number" name="stock" id="stock"><br><br>
  <input placeholder="stock_min" type="number" name="stock_min" id="stock_min"><br><br>
  <input placeholder="stock_max" type="number" name="stock_max" id="stock_max"><br><br>
  <input placeholder="product_id" type="number" name="product_id" id="product_id"><br><br>
  <input type="file" name="cover" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="createPresentation">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->


<!-- Update Presentation -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php"><br><br>
  <input placeholder="description" type="text" name="description" id="description"><br><br>
  <input placeholder="code" type="text" name="code" id="code"><br><br>
  <input placeholder="weight_in_grams" type="number" name="weight_in_grams" id="weight_in_grams"><br><br>
  <input placeholder="status" type="text" name="status" id="status"><br><br>
  <input placeholder="stock" type="number" name="stock" id="stock"><br><br>
  <input placeholder="stock_min" type="number" name="stock_min" id="stock_min"><br><br>
  <input placeholder="stock_max" type="number" name="stock_max" id="stock_max"><br><br>
  <input placeholder="product_id" type="number" name="product_id" id="product_id"><br><br>
  <input placeholder="id" type="number" name="id" id="id"><br><br>
  <input type="file" name="cover" accept="image/*"><br><br>

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updatePresentation">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- Delete Presentation -->
<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php">
  <input type="number" name="id" id="id">
  <input type="submit" value="submit">

  <input type="hidden" name="action" value="deletePresentation">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->

<!-- <form enctype="multipart/form-data" method="POST" action="./app/PresentationsController.php">
  <input placeholder="id" type="number" name="id" id="id">
  <input placeholder="amount" type="number" name="amount" id="amount">

  <input type="submit" value="submit">

  <input type="hidden" name="action" value="updatePricePresentation">
  <input type="hidden" name="super_token" value="<?= $_SESSION['super_token'] ?>">
</form> -->