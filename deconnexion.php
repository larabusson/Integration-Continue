<?php
session_start();
if (isset($_SESSION['login']) && !empty($_SESSION['login']) && !empty($_SESSION['pass'])){
  session_destroy();
  session_unset();
}
header('Location: ./login.php');
?>
