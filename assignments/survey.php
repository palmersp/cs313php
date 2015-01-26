<?php 
session_start();

if (isset($_SESSION['vote'])) {
	include 'results.php';
} else{
	include 'questions.php';
}

 ?>