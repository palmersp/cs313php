<?php
function conPHP() {

    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
         // Not in the openshift environment
         require 'local.php';
    }
    else
    {
         // In the openshift environment
         $server = getenv('OPENSHIFT_MYSQL_DB_HOST');
         // $database = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
         $database = 'php';
         $username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
         $password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    }

    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $conPHP = new PDO($dsn, $username, $password, $option);
    } catch (PDOException $exc) {
        header('location: /errordocs/502.php');
        exit;
    }
    return $conPHP;
}


function monthToInt($month){
  switch ($month) {
    case 'January':
      $month = 1;
      break;
    case 'February':
      $month = 2;
      break;
    case 'March':
      $month = 3;
      break;
    case 'April':
      $month = 4;
      break;
    case 'May':
      $month = 5;
      break;
    case 'June':
      $month = 6;
      break;
    case 'July':
      $month = 7;
      break;
    case 'August':
      $month = 8;
      break;
    case 'September':
      $month = 9;
      break;
    case 'October':
      $month = 10;
      break;
    case 'November':
      $month = 11;
      break;
    case 'December':
      $month = 12;
      break;
  }
  return $month;
}

function monthToString($month){
  switch ($month) {
    case 1:
      $month = 'January';
      break;
    case 2:
      $month = 'February';
      break;
    case 3:
      $month = 'March';
      break;
    case 4:
      $month = 'April';
      break;
    case 5:
      $month = 'May';
      break;
    case 6:
      $month = 'June';
      break;
    case 7:
      $month = 'July';
      break;
    case 8:
      $month = 'August';
      break;
    case 9:
      $month = 'September';
      break;
    case 10:
      $month = 'October';
      break;
    case 11:
      $month = 'November';
      break;
    case 12:
      $month = 'December';
      break;
  }
  return $month;
}


?>
