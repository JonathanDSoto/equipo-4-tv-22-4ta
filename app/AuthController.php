<?php include_once 'config.php';

  if (isset($_POST['action'])) {
    if(isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
      switch($_POST['action'])
      {
        case 'access':
          $email = strip_tags($_POST['email']);
          $password = strip_tags($_POST['password']);

          $authController = new AuthController();
          $authController->login($email,$password);
          break;

        case 'register':
          $authController = new AuthController();
          $authController->register($_POST['name'],$_POST['lastname'],$_POST['email'],$_POST['phone_number'],$_POST['password'],);
          break;

        case 'recovery':
          $authController = new AuthController();
          $authController->recovery($_POST['email']);
          break;
        case 'logout':
          $authController = new AuthController();
          $authController->logout($_POST['email']);
          break;
      }
    }
  }
	
	Class AuthController
	{

		public function login($email,$pwd)
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

			}else{

				echo 'no jalo';
			}

		}

    public function register($name,$lastname,$email,$phone_number,$password){
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
        CURLOPT_POSTFIELDS => array('name' => $name,'lastname' => $lastname,'email' => $email,'phone_number' => $phone_number,'created_by' => 'Equipo 4','role' => 'Administrador','password' => $password,'profile_photo_file'=> new CURLFILE($_FILES['profile_photo']['tmp_name'])),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      echo $response;

    }

    public function recovery($email){
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

    public function logout($email){
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
          'Authorization: Bearer '. $_SESSION['token'],
        ),
      ));

      $response = curl_exec($curl);

      curl_close($curl);
      echo $response;
    }
  }
?>