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


?>
