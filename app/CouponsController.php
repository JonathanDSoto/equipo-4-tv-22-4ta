<?php include_once 'config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getCoupons':
      $token = strip_tags($_POST['token']);
      $CouponsController = new CouponsController();
      $CouponsController->getCoupons($token);
      break;
    case 'getCoupon':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);
      $CouponsController = new CouponsController();
      $CouponsController->getCoupon($id, $token);
      break;
  }
}

class CouponsController
{

  public function getCoupons($token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons',
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

  public function getCoupon($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/coupons/' . $id,
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
}
