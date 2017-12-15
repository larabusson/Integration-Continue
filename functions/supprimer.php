<?php
require_once('./function.php');
supprimer($_GET['id'], "../texte/list_conf.json");
header('Location: ../pages/home.php');
 ?>
