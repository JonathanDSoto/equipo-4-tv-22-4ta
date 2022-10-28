<?php include_once './config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getClientAddress':
      $token = strip_tags($_POST['token']);

      $id = strip_tags($_POST['id']);

      $AddressController = new AddressController();
      $AddressController->getClientAddress($id, $token);
      break;
    case 'getAddress':
      $token = strip_tags($_POST['token']);

      $id = strip_tags($_POST['id']);

      $AddressController = new AddressController();
      $AddressController->getAddress($id, $token);
      break;
    case 'createAddress':
      $token = strip_tags($_POST['token']);
      $first_name = strip_tags($_POST['first_name']);
      $last_name = strip_tags($_POST['last_name']);
      $street_and_use_number = strip_tags($_POST['street_and_use_number']);
      $postal_code = strip_tags($_POST['postal_code']);
      $city = strip_tags($_POST['city']);
      $province = strip_tags($_POST['province']);
      $phone_number = strip_tags($_POST['phone_number']);
      $is_billing_address = strip_tags($_POST['is_billing_address']);
      $client_id = strip_tags($_POST['client_id']);

      $AddressController = new AddressController();
      $AddressController->createAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $token);
      break;
    case 'updateAddress':
      $token = strip_tags($_POST['token']);
      $first_name = strip_tags($_POST['first_name']);
      $last_name = strip_tags($_POST['last_name']);
      $street_and_use_number = strip_tags($_POST['street_and_use_number']);
      $postal_code = strip_tags($_POST['postal_code']);
      $city = strip_tags($_POST['city']);
      $province = strip_tags($_POST['province']);
      $phone_number = strip_tags($_POST['phone_number']);
      $is_billing_address = strip_tags($_POST['is_billing_address']);
      $client_id = strip_tags($_POST['client_id']);
      $id = strip_tags($_POST['id']);

      $AddressController = new AddressController();
      $AddressController->updateAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $id, $token);
      break;
    case 'deleteAddress':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $AddressController = new AddressController();
      $AddressController->deleteAddress($id, $token);
      break;
  }
}

class AddressController
{
  public function getClientAddress($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/clients/' . $id,
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

  public function getAddress($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array('Authorization: Bearer ' . $token),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function createAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('first_name' => $first_name, 'last_name' => $last_name, 'street_and_use_number' => $street_and_use_number, 'postal_code' => $postal_code, 'city' => $city, 'province' => $province, 'phone_number' => $phone_number, 'is_billing_address' => $is_billing_address, 'client_id' => $client_id),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function updateAddress($first_name, $last_name, $street_and_use_number, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'first_name=' . $first_name . '&last_name=' . $last_name . '&street_and_use_number=' . $street_and_use_number . '&postal_code=' . $postal_code . '&city=' . $city . '&province=' . $province . '&phone_number=' . $phone_number . '&is_billing_address=' . $is_billing_address . '&client_id=' . $client_id . '&id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deleteAddress($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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
