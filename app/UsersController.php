<?php

include_once './config.php';

if (isset($_POST['action'])) {
  if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
    switch ($_POST['action']) {
      case 'create':
        $name = strip_tags($_POST['name']);
        $lastname = strip_tags($_POST['lastname']);
        $email = strip_tags($_POST['email']);
        $phone_number = strip_tags($_POST['phone_number']);
        $password = strip_tags($_POST['password']);

        $UserController = new UserController();
        $UserController->createUser($name, $lastname, $email, $phone_number, $password);
        break;
      case 'getuser':
        $id = strip_tags($_POST['id']);

        $UserController = new UserController();
        $UserController->getUser($id);
        break;
      case 'edit':
        $name = strip_tags($_POST['name']);
        $lastname = strip_tags($_POST['lastname']);
        $email = strip_tags($_POST['email']);
        $phone_number = strip_tags($_POST['phone_number']);
        $password = strip_tags($_POST['password']);
        $id = strip_tags($_POST['id']);

        $UserController = new UserController();
        $UserController->editUser($name, $lastname, $email, $phone_number, $password, $id);
        break;
      case 'delete':
        $id = strip_tags($_POST['id']);

        $UserController = new UserController();
        $UserController->deleteUser($id);
        break;
      case 'updateImage':
        $id = strip_tags($_POST['id']);

        $UserController = new UserController();
        $UserController->UpdateUserImage($id);
        break;
    }
  }
}

class UserController
{
  public function getAllUsers()
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
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function createUser($name, $lastname, $email, $phone_number, $password)
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
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function getUser($id)
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
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function editUser($name, $lastname, $email, $phone_number, $password, $id)
  {
    $curl = curl_init();

    echo 'name=' . urlencode($name) . '&lastname=' . urlencode($lastname) . '&email=' . urlencode($email) . '&phone_number=' . urlencode($phone_number) . '&created_by=Equipo%204&role=Administrador&password=' . urlencode($password) . '&id=' . urlencode($id);

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'PUT',
      CURLOPT_POSTFIELDS => 'name=' . urlencode($name) . '&lastname=' . urlencode($lastname) . '&email=' . urlencode($email) . '&phone_number=' . urlencode($phone_number) . '&created_by=Equipo%204&role=Administrador&password=' . urlencode($password) . '&id=' . urlencode($id),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
        'Content-Type: application/x-www-form-urlencoded'
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function deleteUser($id)
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
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function UpdateUserImage($id)
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
        'Authorization: Bearer ' . $_SESSION['token']
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}
