<?php
  session_start();
  if(isset($_SESSION['logged'])){header('Location: memoryGame.php'); exit();}
  $errorFlag=false;
  $login=$_POST['login'];
  $password=$_POST['password'];
  $password2=$_POST['password2'];
  unset($_SESSION['loginError']); unset($_SESSION['passwordError']); unset($_SESSION['error']);

  if(strlen($login)>20 OR strlen($login)<3){
    $_SESSION['loginError']="Login musi zawierać od 3 do 20 znaków!";
    $errorFlag=true;
  }
  else if(!ctype_alnum($login)){
    $_SESSION['loginError']="Tylko litery i cyfry (bez polskich znaków)!";
    $errorFlag=true;
  }

  if(strlen($password)>20 OR strlen($password)<8){
    $_SESSION['passwordError']="Hasło musi mieć od 8 do 20 znaków";
    $errorFlag=true;
  }
  else if($password!=$password2){
    $_SESSION['passwordError']="Wpisane hasła różnią się od siebie";
    $errorFlag=true;
  }

  if(!$errorFlag){
    //dane do logowania DB
    require_once('database.php');

    //bledy tylko rzucane try>catch
    mysqli_report(MYSQLI_REPORT_STRICT);

    try{
      $registerQuery=$db->prepare('SELECT COUNT(*) FROM users WHERE login=:login');
      $registerQuery->bindValue(':login', $login, PDO::PARAM_STR);
      $registerQuery->execute();
      if($registerQuery->fetchColumn()>0){
        $_SESSION['error']="Ten login jest już zajęty!";
        header('Location: register.php');
      }
      $password=password_hash($password, PASSWORD_DEFAULT);
      $saveQuery=$db->prepare('INSERT INTO users VALUES (NULL, :login, :password, 100)');
      $saveQuery->bindValue(':login', $login, PDO::PARAM_STR);
      $saveQuery->bindValue(':password', $password, PDO::PARAM_STR);
      $saveQuery->execute();

      header('Location: index.php');
    } catch(Exception $e) {
      echo $e;
    }
  } else {
    header('Location: register.php');
  }


?>
