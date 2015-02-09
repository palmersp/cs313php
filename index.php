<?php

if(!$_SESSION){
   session_start();
}
// require 'library/library.php';
// include 'view.php';


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home';
}

if ($action == 'home') {
  $main = 'main/home';
  include 'view.php';
}
else if ($action == 'main_nav') {
  if ($_GET['id'] == 'assignments') {
    $main = 'main/assignments';
    include 'view.php';

  }

}
?>
