<?php

header('Content-Type: text/html; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$osebes = array();

	if (!empty($_COOKIE['save'])) { 
		setcookie('save', '', 100000);
		$osebes[] = 'Спасибо, результаты сохранены.';
	}

	$errors = array();
    $errors['name'] = !empty($_COOKIE['name_error']);
    $errors['email'] = !empty($_COOKIE['email_error']);
    $errors['date'] = !empty($_COOKIE['date_error']);
    $errors['sex'] = !empty($_COOKIE['sex_error']);
    $errors['limb'] = !empty($_COOKIE['limb_error']);
    $errors['abi$ability'] = !empty($_COOKIE['abi$ability_error']);
    $errors['kontract'] = !empty($_COOKIE['kontract_error']);

	if ($errors['name']) {
		setcookie('name_error', '', 100000);
		$osebes[] = '<div class="error">Укажите имя.</div>';
	  }
	  
	  if ($errors['email']) {
		setcookie('email_error', '', 100000);
		$osebes[] = '<div class="error">Адрес эл.почты указан неверно. Образец: exp@mail.ru</div>';
	  }
	 
	  if ($errors['date']) {
		setcookie('date_error', '', 100000);
		$osebes[] = '<div class="error">Дата рождения указана неверно. Образец: ДД.ММ.ГГГГ</div>';
	  }
	  
	  if ($errors['sex']) {
		setcookie('sex_error', '', 100000);
		$osebes[] = '<div class="error">Укажите пол.</div>';
	  }
	
	  if ($errors['limb']) {
		setcookie('limb_error', '', 100000);
		$osebes[] = '<div class="error">Укажите число конечностей.</div>';
	  }
	
	  if ($errors['abi$ability']) {
		setcookie('abi$ability_error', '', 100000);
		$osebes[] = '<div class="error">Укажите суперспособности.</div>';
	  }
	
	  if ($errors['kontract']) {
		setcookie('kontract_error', '', 100000);
		$osebes[] = '<div class="error">Пожалуйста, ознакомьтесь с контрактом!</div>';
	  }

	  $values = array();
      $values['name'] = empty($_COOKIE['name_value']) ? '' : $_COOKIE['name_value'];
      $values['email'] = empty($_COOKIE['email_value']) ? '' : $_COOKIE['email_value'];
      $values['date'] = empty($_COOKIE['date_value']) ? '' : $_COOKIE['date_value'];
      $values['sex'] = empty($_COOKIE['sex_value']) ? '' : $_COOKIE['sex_value'];
      $values['limb'] = empty($_COOKIE['limb_value']) ? '' : $_COOKIE['limb_value'];
      $values['ability1'] = empty($_COOKIE['ability1_value']) ? '' : $_COOKIE['ability1_value'];
      $values['ability2'] = empty($_COOKIE['ability2_value']) ? '' : $_COOKIE['ability2_value'];
      $values['ability3'] = empty($_COOKIE['ability3_value']) ? '' : $_COOKIE['ability3_value'];
	  $values['ability4'] = empty($_COOKIE['ability4_value']) ? '' : $_COOKIE['ability4_value'];
	  $values['ability1'] = empty($_COOKIE['ability5_value']) ? '' : $_COOKIE['ability5_value'];
      $values['ability2'] = empty($_COOKIE['ability6_value']) ? '' : $_COOKIE['ability6_value'];
      $values['ability3'] = empty($_COOKIE['ability7_value']) ? '' : $_COOKIE['ability7_value'];
      $values['ability4'] = empty($_COOKIE['ability8_value']) ? '' : $_COOKIE['ability8_value'];
      $values['osebe'] = empty($_COOKIE['osebe_value']) ? '' : $_COOKIE['osebe_value'];
      $values['kontract'] = empty($_COOKIE['kontract_value']) ? '' : $_COOKIE['kontract_value'];

	  include('index.php');

	  else {
		$errors = FALSE;
		if (empty($_POST['name'])) {
		  setcookie('name_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('name_value', $_POST['name'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])) {
		  setcookie('email_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('email_value', $_POST['email'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (!preg_match('/^(\d{1,2})\.(\d{1,2})(?:\.(\d{4}))?$/', $_POST['date'])) {
		  setcookie('date_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('date_value', $_POST['date'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (empty($_POST['sex'])) {
		  setcookie('sex_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('sex_value', $_POST['sex'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (empty($_POST['limb'])) {
		  setcookie('limb_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('limb_value', $_POST['limb'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (!isset($_POST['ability1']) 
		&& !isset($_POST['ability2']) 
		&& !isset($_POST['ability3']) 
		&& !isset($_POST['ability4'])
		&& !isset($_POST['ability5'])
		&& !isset($_POST['ability6'])
		&& !isset($_POST['ability7'])
		&& !isset($_POST['ability8'])) {
		  setcookie('ability_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('ability1_value', isset($_POST['ability1']) ? $_POST['ability1'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability2_value', isset($_POST['ability2']) ? $_POST['ability2'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability3_value', isset($_POST['ability3']) ? $_POST['ability3'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability4_value', isset($_POST['ability4']) ? $_POST['ability4'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability5_value', isset($_POST['ability5']) ? $_POST['ability5'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability6_value', isset($_POST['ability6']) ? $_POST['ability6'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability7_value', isset($_POST['ability7']) ? $_POST['ability7'] : '', time() + 365 * 30 * 24 * 60 * 60);
		  setcookie('ability8_value', isset($_POST['ability8']) ? $_POST['ability8'] : '', time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (!empty($_POST['osebe'])) {
		  setcookie('osebe_value', $_POST['osebe'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if (empty($_POST['kontract'])) {
		  setcookie('kontract_error', '1', time() + 24 * 60 * 60);
		  $errors = TRUE;
		}
		else {
		  setcookie('kontract_value', $_POST['kontract'], time() + 365 * 30 * 24 * 60 * 60);
		}
	  
		if ($errors) {
		  header('Location: index.php');
		  exit();
		}
		else {
		  setcookie('name_error', '', 100000);
		  setcookie('email_error', '', 100000);
		  setcookie('date_error', '', 100000);
		  setcookie('sex_error', '', 100000);
		  setcookie('limb_error', '', 100000);
		  setcookie('ability_error', '', 100000);
		  setcookie('kontract_error', '', 100000);
		  
			
if($_POST['go'] == 'Отправить'){
	if ($_POST['kontract'] == ''){
		print('Вы не ознакомились с контрактом. Пожалуйста, ознакомьтесь с ним!');
		exit();
	}
	
    foreach($_POST as $key => $val){
        if(empty($val)){
			print('Вы что-то не ввели. Пожалуйста, дополните свою анкету! ');
			exit();
        }
    }
    
	$name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $sex = $_POST['sex'];
    $limb = $_POST['limb'];
    $ability = $_POST['ability1'].
      (isset($_POST['ability2']) ? (' '. $_POST['ability2']) : '').
      (isset($_POST['ability3']) ? (' '. $_POST['ability3']) : '').
	  (isset($_POST['ability4']) ? (' '. $_POST['ability4']) : '');
	  (isset($_POST['ability5']) ? (' '. $_POST['ability5']) : '');
	  (isset($_POST['ability6']) ? (' '. $_POST['ability6']) : '');
	  (isset($_POST['ability7']) ? (' '. $_POST['ability7']) : '');
	  (isset($_POST['ability8']) ? (' '. $_POST['ability8']) : '');
    $osebe = $_POST['osebe'];



	$login = 'u20294';
	$password = '5205554';
	$data_base = new PDO('mysql:host=localhost;dbname=u20294', $login, $password);

	try {
		$query = $data_base->prepare("INSERT INTO profi (name, email, date, sex, limb, abi$ability, osebe) VALUES (:name, :email, :date, :sex, :limb, :abi$ability, :osebe)");
		$query->bindParam(':name', $name);
		$query->bindParam(':email', $email);
		$query->bindParam(':date', $date);
		$query->bindParam(':sex', $sex);
		$query->bindParam(':limb', $limb);
		$query->bindParam(':abi$ability',$ability);
		$query->bindParam(':osebe', $osebe);
		$query->execute();
		print('Информация заполнена правильно. Приходите еще :)');
		exit();
	}
	catch(PDOException $t){
		print('Error : ' . $t->getosebe());
		exit();
	}
}
setcookie('save', '1');

header('Location: index.php');
?>