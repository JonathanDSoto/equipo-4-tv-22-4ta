<?php include_once 'config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getOrders':
      $token = strip_tags($_POST['token']);
      $OrdersController = new OrdersController();
      $OrdersController->getOrders($token);
      break;
    case 'getOrder':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);
      $OrdersController = new OrdersController();
      $OrdersController->getOrder($id, $token);
      break;
    case 'create':
      $folio = strip_tags($_POST['folio']);
      $total = strip_tags($_POST['total']);
      $is_paid = strip_tags($_POST['is_paid']);
      $client_id = strip_tags($_POST['client_id']);
      $address_id = strip_tags($_POST['address_id']);
      $order_status_id = strip_tags($_POST['order_status_id']);
      $payment_type_id = strip_tags($_POST['payment_type_id']);
      $coupon_id = strip_tags($_POST['coupon_id']);
      $presentations_id = strip_tags($_POST['presentations_id']);
      $presentations_quantity = strip_tags($_POST['presentations_quantity']);
      $token = strip_tags($_POST['token']);

      $OrdersController = new OrdersController();
      $OrdersController->create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations_id, $presentations_quantity, $token);
      break;

    case 'update':
      $id = strip_tags($_POST['id']);
      $order_status_id = strip_tags($_POST['order_status_id']);
      $token = strip_tags($_POST['token']);

      $OrdersController = new OrdersController();
      $OrdersController->update($id, $order_status_id, $token);
      break;
    case 'delete':
      $id = strip_tags($_POST['id']);
      $token = strip_tags($_POST['token']);

      $OrdersController = new OrdersController();
      $OrdersController->delete($id, $token);
      break;
  }
}

class OrdersController
{

  public function getOrders($token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
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

  public function getOrder($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/details/' . $id,
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

  public function create($folio, $total, $is_paid, $client_id, $address_id, $order_status_id, $payment_type_id, $coupon_id, $presentations_id, $presentations_quantity, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'folio' => $folio,
        'total' => $total,
        'is_paid' => $is_paid,
        'client_id' => $client_id,
        'address_id' => $address_id,
        'order_status_id' => $order_status_id,
        'payment_type_id' => $payment_type_id,
        'coupon_id' => $coupon_id,
        'presentations[0][id]' => $presentations_id,
        'presentations[0][quantity]' => $presentations_quantity,
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function update($id, $order_status_id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'id=' . $id . '&order_status_id=' . $order_status_id,
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
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/orders/' . $id,
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
