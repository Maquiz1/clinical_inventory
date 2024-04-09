<?php
require_once 'php/core/init.php';
$user = new User();
$override = new OverideData();
$email = new Email();
$random = new Random();
$validate = new validate();

$successMessage = null;
$pageError = null;
$errorMessage = null;


$email->sendEmail('wmakwesheni@gmail.com', 'Winstone', 'Maquiz', '@Subaru@2022', 'Report to Check');

// function sendEmail($email,$lastname,$username,$password,$subject)

$file = dirname(__FILE__) . '/output.txt';

$data = "hello, it's " . date('d/m/Y H:i:s') . "\n";

file_put_contents($file, $data, FILE_APPEND);
