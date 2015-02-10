<?php

if(!$_SESSION){
   session_start();
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if($action == 'survey') {
  if (isset($_SESSION['vote'])) {
    $main = '/assignments/results.php';
    include '../view.php';
  }
  else{
    $main = '/assignments/questions.php';
    include '../view.php';
  }
}
elseif($action == 'Submit Survey'){
  $iceCream = $_POST['iceCream'];
  $seasons = $_POST['seasons'];
  $building = $_POST['building'];
  $subject = $_POST['subject'];
  $_SESSION['vote'] = TRUE;
  $main = '/assignments/results.php';
  include '../view.php';
}


?>
