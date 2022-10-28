<?php

include_once './config.php';

if (isset($_POST['action'])) {
  switch ($_POST['action']) {
    case 'getAlluser':
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->getAllUsers($token);
      break;
    case 'create':
      $name = strip_tags($_POST['name']);
      $lastname = strip_tags($_POST['lastname']);
      $email = strip_tags($_POST['email']);
      $phone_number = strip_tags($_POST['phone_number']);
      $password = strip_tags($_POST['password']);
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->createUser($name, $lastname, $email, $phone_number, $password, $token);
      break;
    case 'getuser':
      $id = strip_tags($_POST['id']);
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->getUser($id, $token);
      break;
    case 'edit':
      $name = strip_tags($_POST['name']);
      $lastname = strip_tags($_POST['lastname']);
      $email = $_POST['email'];
      $phone_number = strip_tags($_POST['phone_number']);
      $password = strip_tags($_POST['password']);
      $id = strip_tags($_POST['id']);
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->editUser($name, $lastname, $email, $phone_number, $password, $id, $token);
      break;
    case 'delete':
      $id = strip_tags($_POST['id']);
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->deleteUser($id, $token);
      break;
    case 'updateImage':
      $id = strip_tags($_POST['id']);
      $token = strip_tags($_POST['token']);

      $UserController = new UserController();
      $UserController->UpdateUserImage($id, $token);
      break;
  }
}

class UserController
{
  public function getAllUsers($token)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function createUser($name, $lastname, $email, $phone_number, $password, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $name, 'lastname' => $lastname, 'email' => $email, 'phone_number' => $phone_number, 'created_by' => 'Equipo 4', 'role' => 'Administrador', 'password' => $password, 'profile_photo_file' => new CURLFILE($_FILES['profile_photo']['tmp_name'])),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getUser($id, $token)
  {
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function editUser($name, $lastname, $email, $phone_number, $password, $id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . $name . '&lastname=' . $lastname . '&email=' . $email . '&phone_number=' . $phone_number . '&created_by=Equipo%204&role=Administrador&password=' . $password . '&id=' . $id,
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token,
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deleteUser($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
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

  public function UpdateUserImage($id, $token)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/avatar',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('id' => $id, 'profile_photo_file' => new CURLFILE($_FILES['profile_photo']['tmp_name'])),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $token
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}
