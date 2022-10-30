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
    case 'create':
      $name = strip_tags($_POST['name']);
      $code = strip_tags($_POST['code']);
      $percentage_discount = strip_tags($_POST['percentage_discount']);
      $min_amount_required = strip_tags($_POST['min_amount_required']);
      $min_product_required = strip_tags($_POST['min_product_required']);
      $start_date = strip_tags($_POST['start_date']);
      $end_date = strip_tags($_POST['end_date']);
      $max_uses = strip_tags($_POST['max_uses']);
      $count_uses = strip_tags($_POST['count_uses']);
      $valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
      $status = strip_tags($_POST['status']);
      $token = strip_tags($_POST['token']);

      $CouponsController = new CouponsController();
      $CouponsController->create($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $token);
      break;
    case 'update':
      $name = strip_tags($_POST['name']);
      $code = strip_tags($_POST['code']);
      $percentage_discount = strip_tags($_POST['percentage_discount']);
      $min_amount_required = strip_tags($_POST['min_amount_required']);
      $min_product_required = strip_tags($_POST['min_product_required']);
      $start_date = strip_tags($_POST['start_date']);
      $end_date = strip_tags($_POST['end_date']);
      $max_uses = strip_tags($_POST['max_uses']);
      $count_uses = strip_tags($_POST['count_uses']);
      $valid_only_first_purchase = strip_tags($_POST['valid_only_first_purchase']);
      $status = strip_tags($_POST['status']);
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $CouponsController = new CouponsController();
      $CouponsController->update($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $token, $id);
      break;
    case 'delete':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $CouponsController = new CouponsController();
      $CouponsController->delete($id, $token);
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

  public function create($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $token)
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
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $name, 'code' => $code, 'percentage_discount' => $percentage_discount, 'min_amount_required' => $min_amount_required, 'min_product_required' => $min_product_required, 'start_date' => $start_date, 'end_date' => $end_date, 'max_uses' => $max_uses, 'count_uses' => $count_uses, 'valid_only_first_purchase' => $valid_only_first_purchase, 'status' => $status),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function update($name, $code, $percentage_discount, $min_amount_required, $min_product_required, $start_date, $end_date, $max_uses, $count_uses, $valid_only_first_purchase, $status, $token, $id)
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
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . $name . '&code=' . $code . '&percentage_discount=' . $percentage_discount . '&min_amount_required=' . $min_amount_required . '&min_product_required=' . $min_product_required . '&start_date=' . $start_date . '&end_date=' . $end_date . '&max_uses=' . $max_uses . '&count_uses=' . $count_uses . '&valid_only_first_purchase=' . $valid_only_first_purchase . '&status=' . $status . '&id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function delete($id, $token)
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
