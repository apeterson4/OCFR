<?php

require 'common.php';

$db = DbConnection::getConnection();

$stmt = $db->prepare(
  'UPDATE People
  SET firstName = ?, lastName = ?, radioNumber = ?, stationNumber = ?, isActive = ?, phone = ?, email = ?, address = ?, gender = ?, startDate =?, Position = ?
  WHERE EmployeeID = ?'
);

$stmt->execute([
  $_POST['firstName'],
  $_POST['lastName'],
  $_POST['radioNumber'],
  $_POST['stationNumber'],
  $_POST['isActive'],
  $_POST['phone'],
  $_POST['email'],
  $_POST['address'],
  $_POST['gender'],
  $_POST['startDate'],
  $_POST['Position'],
  $_POST['EmployeeID'],
]);

// $memberId = $db->lastInsertID();

header('HTTP/1.1 303 See Other');
header('Content-Type: application/json');
header('Location: ../user/get.php');
