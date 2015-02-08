<?php

if(!$_SESSION){
   session_start();
}
// require 'library/library.php';
require 'view.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

if ($action == 'home') {
  $main = "home";
}
 ?>
