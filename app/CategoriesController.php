<?php include_once 'config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getCategories':
      $token = strip_tags($_POST['token']);
      $CategoriesController = new CategoriesController();
      $CategoriesController->getCategories($token);
      break;
    case 'createCategory':
      $token = strip_tags($_POST['token']);
      $name = strip_tags($_POST['name']);
      $description = strip_tags($_POST['description']);
      $slug = strip_tags($_POST['slug']);
      $category_id = strip_tags($_POST['category_id']);

      $CategoriesController = new CategoriesController();
      $CategoriesController->createCategory($name, $description, $slug, $category_id, $token);
      break;
    case 'getCategory':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $CategoriesController = new CategoriesController();
      $CategoriesController->getCategory($id, $token);
      break;
    case 'updateCategory':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);
      $name = strip_tags($_POST['name']);
      $description = strip_tags($_POST['description']);
      $slug = strip_tags($_POST['slug']);
      $category_id = strip_tags($_POST['category_id']);

      $CategoriesController = new CategoriesController();
      $CategoriesController->updateCategory($id, $name, $description, $slug, $category_id, $token);
      break;
    case 'deleteCategory':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);
      $CategoriesController = new CategoriesController();
      $CategoriesController->deleteCategory($id, $token);
      break;
  }
}

class CategoriesController
{
  public function getCategories($token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
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

  public function createCategory($name, $description, $slug, $category_id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $name, 'description' => $description, 'slug' => $slug, 'category_id' => $category_id),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getCategory($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/' . $id,
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

  public function updateCategory($id, $name, $description, $slug, $category_id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'id=' . urlencode($id) . '&name=' . urlencode($name) . '&description=' . urlencode($description) . '&slug=' . urlencode($slug) . '&category_id=' . urlencode($category_id),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deleteCategory($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/' . $id,
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
