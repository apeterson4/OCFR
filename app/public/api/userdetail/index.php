<?php

require 'common.php';

// Step 1: Get a datase connection from our helper class
$db = DbConnection::getConnection();

// Step 2: Create & run the query
$sql = "SELECT p.EmployeeID as id,  c.CertName as Name
FROM Certification c, Person_Certification cp, People p
where  c.CertID = cp.certID AND cp.EmployeeID=p.EmployeeID
Group by p.EmployeeID, c.CertID";
$vars = [];

if (isset($_GET['Person_certID'])) {
  $sql = "SELECT p.EmployeeID as id,  c.CertName as Name
  FROM Certification c, Person_Certification cp, People p
  where  c.CertID = cp.certID AND cp.EmployeeID=p.EmployeeID
  Group by p.EmployeeID, c.CertID";
  $vars = [ $_GET['Person_certID'] ];
}

$stmt = $db->prepare($sql);
$stmt->execute($vars);

$Certification = $stmt->fetchAll();

// Step 3: Convert to JSON
$json = json_encode($Certification, JSON_PRETTY_PRINT);

// Step 4: Output
header('Content-Type: application/json');
echo $json;
