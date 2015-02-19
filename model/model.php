<?php

try {
    require $_SERVER['DOCUMENT_ROOT'] . '/library/library.php';
} catch (Exception $exc) {
    header('location: /errordocs/500.php');
    exit();
}

function getReservations($month, $year, $day) {
    $conPHP = conPHP();
    $sql = 'SELECT * FROM day WHERE month = :month AND year = :year  AND day = :day';
    $statement = $conPHP->prepare($sql);
    $statement->bindValue(':month', $month);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':day', $day);
    $statement->execute();
    $reservations = $statement->fetch();
    $statement->closeCursor();
    return $reservations;
}

function getLastClientId() {
  $conPHP = conPHP();
  $sql = 'SELECT * FROM client WHERE client_id = (SELECT MAX(client_id) FROM client) LIMIT 1';
  $statement = $conPHP->prepare($sql);
  $statement->execute();
  $clientId = $statement->fetch();
  $statement->closeCursor();
  return $clientId;

}


function login($username, $password) {
  $conPHP = conPHP();
  $sql = 'SELECT * FROM admin WHERE email_address = :email_address AND password = :password';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':email_address', $username);
  $stmt->bindValue(':password', $password);
  $stmt->execute();
  $credentials = $stmt->fetch();
  $stmt->closeCursor();

  if ($username == $credentials['email_address'] && $password == $credentials['password']){
    return TRUE;
  }
  else {
    return FALSE;
  }
}

function pendingApproval(){
  $conPHP = conPHP();
  $sql = 'SELECT * FROM day d JOIN client c ON d.client_id = c.client_id JOIN contact co'
  .' ON c.client_id = co.client_id JOIN reservation_comment rc ON co.client_id = rc.client_id'
  .' WHERE d.approved IS NULL';
  $stmt = $conPHP->prepare($sql);
  // $stmt->bindValue(':day_id', $day_id);
  $stmt->execute();
  $pending = $stmt->fetch();
  $stmt->closeCursor();
  return $pending;
}

function pendingApprovalAll($day_id){
  $conPHP = conPHP();
  $sql = 'SELECT * FROM day d JOIN client c ON d.client_id = c.client_id JOIN contact co'
  .' ON c.client_id = co.client_id JOIN reservation_comment rc ON co.client_id = rc.client_id'
  .' WHERE d.day_id = :day_id';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':day_id', $day_id);
  $stmt->execute();
  $pending = $stmt->fetch();
  $stmt->closeCursor();
  return $pending;
}
function getDayId() {
  $conPHP = conPHP();
  $sql = 'SELECT * FROM day WHERE day_id = (SELECT MAX(day_id) FROM day) LIMIT 1';
  $statement = $conPHP->prepare($sql);
  $statement->execute();
  $dayId = $statement->fetch();
  $statement->closeCursor();
  return $dayId;

}

function insertClient($firstname, $lastname) {
  $conPHP = conPHP();
  $sql = 'INSERT INTO client (first_name, last_name) VALUES (:first_name, :last_name)';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':first_name', $firstname);
  $stmt->bindValue(':last_name', $lastname);
  $stmt->execute();
  $insertResult = $conPHP->lastInsertId();
  $stmt->closeCursor();

  if($insertResult > 0) {
      return $insertResult;
  } else {
      return FALSE;
  }
}

function insertDay($month, $year, $day, $clientId) {
  $conPHP = conPHP();
  $sql = 'INSERT INTO day (month, year, day, client_id) VALUES' .
  ' (:month, :year, :day, (SELECT client_id FROM client WHERE client_id = :client_id))';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':month', $month);
  $stmt->bindValue(':year', $year);
  $stmt->bindValue(':day', $day);
  $stmt->bindValue(':client_id', $clientId);
  $stmt->execute();
  $insertResult = $conPHP->lastInsertId();
  $stmt->closeCursor();

  if($insertResult > 0) {
      return TRUE;
  } else {
      return FALSE;
  }

}

function insertMessage($clientId, $message) {
  $conPHP = conPHP();
  $sql = 'INSERT INTO reservation_comment (client_id, comment_date, comment_text) VALUES'.
  '((SELECT client_id FROM client WHERE client_id = :client_id), UTC_DATE(), :comment_text)';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':client_id', $clientId);
  $stmt->bindValue(':comment_text', $message);
  $stmt->execute();
  $insertResult = $conPHP->lastInsertId();
  $stmt->closeCursor();

  if($insertResult > 0) {
      return TRUE;
  } else {
      return FALSE;
  }

}

function insertContact($clientId, $emailAddress, $phoneNumber, $lineOne, $lineTwo, $city, $state, $zipcode) {
  $conPHP = conPHP();
  $sql = 'INSERT INTO contact (client_id, email_address, phone_number, line_one, line_two, city, state, zip_code)' .
  'VALUES ((SELECT client_id FROM client WHERE client_id = :client_id)'.
  ', :email_address, :phone_number, :line_one, :line_two, :city, :state, :zip_code) ';
  $stmt = $conPHP->prepare($sql);
  $stmt->bindValue(':client_id', $clientId);
  $stmt->bindValue(':email_address', $emailAddress);
  $stmt->bindValue(':phone_number', $phoneNumber);
  $stmt->bindValue(':line_one', $lineOne);
  $stmt->bindValue(':line_two', $lineTwo);
  $stmt->bindValue(':city', $city);
  $stmt->bindValue(':state', $state);
  $stmt->bindValue(':zip_code', $zipcode);
  $stmt->execute();
  $insertResult = $conPHP->lastInsertId();
  $stmt->closeCursor();

  if($insertResult > 0) {
      return TRUE;
  } else {
      return FALSE;
  }
}

?>
