<link rel='stylesheet' href='css/game.css' type='text/css'/>
<header>
  <nav>
    <ul class='list__items'>
      <li>Witaj, <?php echo $_SESSION['login']; ?>!</li>
      <li>Twoje punkty: <?php echo $_SESSION['points']; ?></li>
    </ul>
  </nav>
  <a class='logout' href='logout.php'><button>Wyloguj się</button></a>
</header>
