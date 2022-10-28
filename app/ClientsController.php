<?php include_once './config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getClients':
      $token = strip_tags($_POST['token']);
      $ClientsController = new ClientsController();
      $ClientsController->getClients($token);
      break;
    case 'getClient':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $ClientsController = new ClientsController();
      $ClientsController->getClient($id, $token);
      break;
    case 'createClient':
      $token = strip_tags($_POST['token']);
      $name = strip_tags($_POST['name']);
      $email = strip_tags($_POST['email']);
      $password = strip_tags($_POST['password']);
      $phone_number = strip_tags($_POST['phone_number']);
      $is_suscribed = strip_tags($_POST['is_suscribed']);
      $level_id = strip_tags($_POST['level_id']);

      $ClientsController = new ClientsController();
      $ClientsController->createClient($name, $email, $password, $phone_number, $is_suscribed, $level_id, $token);
      break;
    case 'updateClient':
      $token = strip_tags($_POST['token']);
      $name = strip_tags($_POST['name']);
      $email = strip_tags($_POST['email']);
      $password = strip_tags($_POST['password']);
      $phone_number = strip_tags($_POST['phone_number']);
      $is_suscribed = strip_tags($_POST['is_suscribed']);
      $level_id = strip_tags($_POST['level_id']);
      $id = strip_tags($_POST['id']);

      $ClientsController = new ClientsController();
      $ClientsController->updateClient($name, $email, $password, $phone_number, $is_suscribed, $level_id, $id, $token);
      break;
    case 'deleteClient':
      $token = strip_tags($_POST['token']);
      $id = strip_tags($_POST['id']);

      $ClientsController = new ClientsController();
      $ClientsController->deleteClient($id, $token);
      break;
  }
}


class ClientsController
{
  public function getClients($token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
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

  public function getClient($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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

  public function createClient($name, $email, $password, $phone_number, $is_suscribed, $level_id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'phone_number' => $phone_number,
        'is_suscribed' => $is_suscribed,
        'level_id' => $level_id
      ),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function updateClient($name, $email, $password, $phone_number, $is_suscribed, $level_id, $id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . $name . '&email=' . $email . '&password=' . $password . '&phone_number=' . $phone_number . '&is_suscribed=' . $is_suscribed . '&level_id=' . $level_id . '&id=' . $id . '',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deleteClient($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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
