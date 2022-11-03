<?php
include_once 'config.php';

if (isset($_POST["action"])) {
  switch ($_POST['action']) {
    case 'create':
      $token = strip_tags($_POST['token']);

      $name = strip_tags($_POST['name']);
      $slug = strip_tags($_POST['slug']);
      $description = strip_tags($_POST['description']);
      $features = strip_tags($_POST['features']);
      $brand_id = strip_tags($_POST['brand_id']);
      $categories = strip_tags($_POST['categories']);
      $tags = strip_tags($_POST['tags']);

      $productsController = new ProductsController();
      $productsController->createProduct($name, $slug, $description, $features, $brand_id, $categories, $tags, $token);
      break;

    case 'update':
      $token = strip_tags($_POST['token']);

      $name = strip_tags($_POST['name']);
      $slug = strip_tags($_POST['slug']);
      $description = strip_tags($_POST['description']);
      $features = strip_tags($_POST['features']);
      $id = strip_tags($_POST['id']);
      $brand_id = strip_tags($_POST['brand_id']);
      $categories = strip_tags($_POST['categories']);
      $tags = strip_tags($_POST['tags']);

      $productsController = new ProductsController();
      $productsController->updateProduct($name, $slug, $description, $features, $brand_id, $id, $categories, $tags, $token);
      break;

    case 'delete':
      $token = strip_tags($_POST['token']);

      $id = strip_tags($_POST['id']);

      $productsController = new ProductsController();
      $productsController->remove($id, $token);

      break;

    case 'getEspecificProduct':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $productsController = new ProductsController();
      $productsController->getEspecificProduct($id, $token);
      break;
    case 'getProductByCategorySlug':
      $token = strip_tags($_POST['token']);
      $slug = strip_tags($_POST['slug']);

      $productsController = new ProductsController();
      $productsController->getProductByCategorySlug($slug, $token);
      break;
    case 'getProductBySlug':
      $token = strip_tags($_POST['token']);
      $slug = strip_tags($_POST['slug']);

      $productsController = new ProductsController();
      $productsController->getProductBySlug($slug, $token);
      break;
    case 'getProducts':
      $token = strip_tags($_POST['token']);
      $productsController = new ProductsController();
      $productsController->getProducts($token);
      break;
  }
}

class ProductsController
{

  public function getProducts($token)
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
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function getEspecificProduct($id, $token)
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
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getProductBySlug($slug, $token)
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
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getProductByCategorySlug($slug, $token)
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
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function createProduct($name, $slug, $description, $features, $brand_id, $categories, $tags, $token)
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
        'Authorization: Bearer ' . $token
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function updateProduct($name, $slug, $description, $features, $brand_id, $id, $categories, $tags, $token)
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
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }

  public function remove($id, $token)
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
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
  }
}
