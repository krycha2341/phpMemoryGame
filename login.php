<?php
  session_start();
  require_once('database.php');
  if(!isset($_SESSION['logged'])){
    if(isset($_POST['login']) AND isset($_POST['password'])){
      $login=filter_input(INPUT_POST, 'login');
      $password=filter_input(INPUT_POST, 'password');
      $loginQuery=$db->prepare('SELECT * FROM users WHERE login=:login');
      $loginQuery->bindValue(':login', $login, PDO::PARAM_STR);
      $loginQuery->execute();
      $loginArr=$loginQuery->fetch();
      if($loginArr AND password_verify($password, $loginArr['password'])){
        $_SESSION['logged']=$loginArr['id'];
        $_SESSION['login']=$login;
        $_SESSION['points']=$loginArr['points'];
        unset($_SESSION['loginError']);
        header('Location: memoryGame.php');
      } else {
        $_SESSION['loginError']=true;
        header('Location: index.php');}
    } else {
      $_SESSION['loginError']=true;
      header('Location: index.php');}
  } else {header('Location: memoryGame.php');}
?>
