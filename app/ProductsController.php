<?php
include_once 'config.php';

if (isset($_POST["action"])) {
  if (isset($_POST["super_token"]) && $_POST["super_token"] == $_SESSION["super_token"]) {
    switch ($_POST['action']) {
      case 'create':

        $name = strip_tags($_POST['name']);
        $slug = strip_tags($_POST['slug']);
        $description = strip_tags($_POST['description']);
        $features = strip_tags($_POST['features']);
        $brand_id = strip_tags($_POST['brand_id']);
        $categories = strip_tags($_POST['categories']);
        $tags = strip_tags($_POST['tags']);

        $productsController = new ProductsController();
        $productsController->createProduct($name, $slug, $description, $features, $brand_id, $categories, $tags);
        break;

      case 'update':

        $name = strip_tags($_POST['name']);
        $slug = strip_tags($_POST['slug']);
        $description = strip_tags($_POST['description']);
        $features = strip_tags($_POST['features']);
        $id = strip_tags($_POST['id']);
        $brand_id = strip_tags($_POST['brand_id']);
        $categories = strip_tags($_POST['categories']);
        $tags = strip_tags($_POST['tags']);

        $productsController = new ProductsController();
        $productsController->updateProduct($name, $slug, $description, $features, $brand_id, $id, $categories, $tags);
        break;

      case 'delete':

        $id = strip_tags($_POST['id']);

        $productsController = new ProductsController();
        $productsController->remove($id);

        break;

      case 'getEspecificProduct':
        $id = strip_tags($_POST['id']);

        $productsController = new ProductsController();
        $productsController->getEspecificProduct($id);
        break;
      case 'getProductByCategorySlug':
        $slug = strip_tags($_POST['slug']);

        $productsController = new ProductsController();
        $productsController->getProductByCategorySlug($slug);
        break;
      case 'getProductBySlug':
        $slug = strip_tags($_POST['slug']);

        $productsController = new ProductsController();
        $productsController->getProductBySlug($slug);
        break;
      case 'getProducts':
        $productsController = new ProductsController();
        $productsController->getProducts();
        break;
    }
  }
}

class ProductsController
{

  public function getProducts()
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function getEspecificProduct($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getProductBySlug($slug)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $slug,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getProductByCategorySlug($slug)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/categories/' . $slug,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function createProduct($name, $slug, $description, $features, $brand_id, $categories, $tags)
  {
    $curl = curl_init();

    $arrayFields = array(
      'name' => $name,
      'slug' => $slug,
      'description' => $description,
      'features' => $features,
      'brand_id' => $brand_id,
      'cover' => new CURLFILE($_FILES['cover']['tmp_name'])
    );

    $categories = explode(' ', $categories);
    $tags = explode(' ', $tags);

    foreach ($categories as $key => $category) {
      $arrayFields['categories[' . $key . ']'] = $category;
    }

    foreach ($tags as $key => $tag) {
      $arrayFields['tags[' . $key . ']'] = $tag;
    }

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => $arrayFields,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function updateProduct($name, $slug, $description, $features, $brand_id, $id, $categories, $tags)
  {
    $curl = curl_init();

    $arrayFields = 'name=' . $name . '&slug=' . $slug . '&description=' . $description . '&features=' . $features . '&brand_id=' . $brand_id . '&id=' . $id;

    $categories = explode(' ', $categories);
    $tags = explode(' ', $tags);

    foreach ($categories as $key => $category) {
      $arrayFields .= '&categories[' . $key . ']=' . urlencode($category);
    }

    foreach ($tags as $key => $tag) {
      $arrayFields .= '&tags[' . $key . ']=' . urlencode($tag);
    }

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => $arrayFields,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function remove($id)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }
}
