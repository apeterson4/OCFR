<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = 'SELECT * FROM Certification';
$vars = [];

if (isset($_GET['CertID'])) {
  $sql = 'SELECT * FROM Certification WHERE CertID = ?';
  $vars = [ $_GET['CertID'] ];
}

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$Certification = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($Certification, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;