<?php
session_start();
if(!isset($_SESSION['logged'])){
  header('Location: index.php');
}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
  <meta charset="utf-8" />
  <title>Memory</title>
  <link rel="stylesheet" href="css/game.css" type="text/css" />
</head>
<body>
<?php require_once('navbar.php'); ?>
<div class='container'>
</div>

</body>
</html>
