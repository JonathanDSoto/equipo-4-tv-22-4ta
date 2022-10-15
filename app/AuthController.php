<?php include_once 'config.php';

if (isset($_POST['action'])) {
  if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
    switch ($_POST['action']) {
      case 'access':
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);

        $authController = new AuthController();
        $authController->login($email, $password);
        break;

      case 'register':

        $name = strip_tags($_POST['name']);
        $lastname = strip_tags($_POST['lastname']);
        $email = strip_tags($_POST['email']);
        $phone_number = strip_tags($_POST['phone_number']);
        $password = strip_tags($_POST['password']);

        $authController = new AuthController();
        $authController->register($name, $lastname, $email, $phone_number, $password);
        break;

      case 'recovery':
        $email = strip_tags($_POST['email']);
        $authController = new AuthController();
        $authController->recovery($email);
        break;
      case 'logout':
        $email = strip_tags($_POST['email']);
        $authController = new AuthController();
        $authController->logout($email);
        break;
    }
  }
}

class AuthController
{

  public function login($email, $pwd)
  {

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
        'email' => $email,
        'password' => $pwd
      ),
    ));

    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);
    $response = json_decode($response);

    if (isset($response->code) && $response->code > 0) {

      $_SESSION['id'] = $response->data->id;
      $_SESSION['name'] = $response->data->name;
      $_SESSION['lastname'] = $response->data->lastname;
      $_SESSION['avatar'] = $response->data->avatar;
      $_SESSION['role'] = $response->data->role;
      $_SESSION['token'] = $response->data->token;

      echo 'jalo';
    } else {

      echo 'no jalo';
    }
  }

  public function register($name, $lastname, $email, $phone_number, $password)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('name' => $name, 'lastname' => $lastname, 'email' => $email, 'phone_number' => $phone_number, 'created_by' => 'Equipo 4', 'role' => 'Administrador', 'password' => $password, 'profile_photo_file' => new CURLFILE($_FILES['profile_photo']['tmp_name'])),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function recovery($email)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/forgot-password',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email),
      CURLOPT_HTTPHEADER => array(),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }

  public function logout($email)
  {
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('email' => $email),
      CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer ' . $_SESSION['token'],
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
  }
}
