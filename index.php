<?php

if(!$_SESSION){
   session_start();
}

try {
    require $_SERVER['DOCUMENT_ROOT'] . '/model/model.php';
} catch (Exception $exc) {
    header('location: /errordocs/501.php');
    exit();
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
  $main = '/modules/main/home.php';
  include 'view.php';
}
else if ($action == 'main_nav') {
  if ($_GET['id'] == 'assignments') {
    $main = '/assignments/assignments.php';
    include 'view.php';
  }

}
else if ($action == 'calendar') {
  $date = getdate();
  $month = $date['month'];
  $year = $date['year'];
  $main = '/calendar/drawCalendar.php';
  include 'view.php';
}
else if ($action == 'Reserve') {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];

  $insertClient = insertClient($firstname, $lastname);

  $month = monthToInt($_POST['month']);
  $year = $_POST['year'];
  $day = $_POST['day'];

  // $clientId = getLastClientId();

  $insertDay = insertDay($month, $year, $day, $insertClient);

  $message = $_POST['message'];

  // $date = getdate();

  $insertMessage = insertMessage($insertClient, $message);

  $emailAddress = $_POST['emailAddress'];
  $phoneNumber = $_POST['phoneNumber'];
  $lineOne = $_POST['lineOne'];
  $lineTwo = $_POST['lineTwo'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zipcode = $_POST['zipcode'];

  $insertContact = insertContact($insertClient, $emailAddress, $phoneNumber, $lineOne, $lineTwo, $city, $state, $zipcode);

  unset($firstname);
  unset($lastname);
  unset($insertClient);
  unset($day);
  unset($message);
  unset($emailAddress);
  unset($phoneNumber);
  unset($lineOne);
  unset($lineTwo);
  unset($city);
  unset($state);
  unset($zipcode);

  $thanks = 'Thanks for registering! You will recieve a confirmation email when you are approved.<br><br><br>';
  $main = '/calendar/drawCalendar.php';
  include 'view.php';
}
else if ($action == 'Change Month') {
  $month = $_POST['month'];
  $year = $_POST['year'];
  $main = '/calendar/drawCalendar.php';
  include 'view.php';
}
?>
