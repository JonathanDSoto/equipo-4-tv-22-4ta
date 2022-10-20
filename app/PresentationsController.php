<?php include_once 'config.php';

if (isset($_POST['action'])) {
  if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
    switch ($_POST['action']) {
      case 'getPresentationByProduct':

        $id = strip_tags($_POST['id']);

        $presentationsController = new PresentationsController();
        $presentationsController->getPresentationByProduct($id);
        break;
      case 'getPresentation':

        $id = strip_tags($_POST['id']);

        $presentationsController = new PresentationsController();
        $presentationsController->getPresentation($id);
        break;
      case 'createPresentation':

        $description = strip_tags($_POST['description']);
        $code = strip_tags($_POST['code']);
        $weight_in_grams = strip_tags($_POST['weight_in_grams']);
        $stock = strip_tags($_POST['stock']);
        $stock_min = strip_tags($_POST['stock_min']);
        $stock_max = strip_tags($_POST['stock_max']);
        $product_id = strip_tags($_POST['product_id']);

        $presentationsController = new PresentationsController();
        $presentationsController->createPresentation($description, $code, $weight_in_grams, $stock, $stock_min, $stock_max, $product_id);
        break;
      case 'updatePresentation':

        $description = strip_tags($_POST['description']);
        $code = strip_tags($_POST['code']);
        $weight_in_grams = strip_tags($_POST['weight_in_grams']);
        $status = strip_tags($_POST['status']);
        $stock = strip_tags($_POST['stock']);
        $stock_min = strip_tags($_POST['stock_min']);
        $stock_max = strip_tags($_POST['stock_max']);
        $product_id = strip_tags($_POST['product_id']);
        $id = strip_tags($_POST['id']);

        $presentationsController = new PresentationsController();
        $presentationsController->updatePresentation($description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $id);
        break;
      case 'deletePresentation':
        $id = strip_tags($_POST['id']);

        $presentationsController = new PresentationsController();
        $presentationsController->deletePresentation($id);
        break;
      case 'updatePricePresentation':
        $id = strip_tags($_POST['id']);
        $amount = strip_tags($_POST['amount']);

        $presentationsController = new PresentationsController();
        $presentationsController->updatePricePresentation($id, $amount);
        break;
    }
  }
}

class PresentationsController
{
  public function getPresentationByProduct($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/product/' . $id,
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

  public function getPresentation($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id,
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

  public function createPresentation($description, $code, $weight_in_grams, $stock, $stock_min, $stock_max, $product_id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'description' => $description,
        'code' => $code,
        'weight_in_grams' => $weight_in_grams,
        'status' => 'active',
        'cover' => new CURLFILE($_FILES['cover']['tmp_name']),
        'stock' => $stock,
        'stock_min' => $stock_min,
        'stock_max' => $stock_max,
        'product_id' => $product_id
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function updatePresentation($description, $code, $weight_in_grams, $status, $stock, $stock_min, $stock_max, $product_id, $id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'description=' . $description . '&code=' . $code . '&weight_in_grams=' . $weight_in_grams . '&status=' . $status . '&stock=' . $stock . '&stock_min=' . $stock_min . '&stock_max=' . $stock_max . '&product_id=' . $product_id . '&id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deletePresentation($id)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/' . $id,
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

  public function updatePricePresentation($id, $amount)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/presentations/set_new_price',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'id=' . $id . '&amount=' . $amount,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}
