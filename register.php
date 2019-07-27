<?php
  session_start();
  if(isset($_SESSION['logged'])){
    header('Location: memoryGame.php');
  }
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <title>Memory - Załóż konto</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

  <div class='container'>
    <div class='register'>
      <form method='post' action='validateAndSave.php'>
        <input type='text' name='login' placeholder="Podaj login..." required/><br />
        <input type='password' name='password' placeholder="Podaj hasło..." required/><br />
        <input type='password' name='password2' placeholder="Powtórz hasło..." required/><br />
        <input type='submit' value='Zarejestruj' />
      </form>
      <p>Masz już konto?<br /><a href='index.php'>Zaloguj się!</a></p>
      <p style="color: rgba(193, 50, 13, 0.77);"><?php
        if(isset($_SESSION['loginError'])){echo $_SESSION['loginError'];}
        else if(isset($_SESSION['passwordError'])){echo $_SESSION['passwordError'];}
        else if(isset($_SESSION['error'])){echo $_SESSION['error'];}
      ?></p>
    </div>
  </div>

</body>
</html>
