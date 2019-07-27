<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['login']);
unset($_SESSION['points']);
header('Location: index.php');
