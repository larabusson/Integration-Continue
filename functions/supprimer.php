<?php
require_once('./function.php');
supprimer($_GET['id']);
header('Location: ../pages/home.php');
 ?>
