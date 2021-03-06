<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM People';
$vars = [];

if (isset($_GET['EmployeeID'])) {
  // This is an example of a parameterized query
  $sql = 'SELECT * FROM People WHERE EmployeeID = ?';
  $vars = [ $_GET['EmployeeID'] ];
}

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$users = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($users, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
