<?php
  session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <title>Memory - Zaloguj się</title>
  <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>

  <div class='container'>
    <div class='login'>
      <form method='post' action='login.php'>
        <input type='text' name='login' placeholder="Login..."/><br />
        <input type='password' name='password' placeholder="Hasło..."/><br />
        <input type='submit' value='Zaloguj' />
      </form>
      <p>Nie masz konta?<br /><a href="register.php">Zarejestruj się!</a></p>
      <p><a href="#" title='Niektóre funkcje nie będą działały w trybie dla Gości!'>Wejdź jako gość!</a></p>
      <?php if(isset($_SESSION['loginError'])) : ?>
        <p style="color: rgba(193, 50, 13, 0.77);">Niepoprawny login lub hasło!</p>
      <?php endif; unset($_SESSION['loginError']);?>
    </div>
  </div>

</body>
</html>
