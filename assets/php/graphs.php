<?php
include 'connection.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);


/* Take input from the form section */

// Recieve JSON
$data = json_decode(file_get_contents("php://input"), true);

// Map expected keys to table fields
$map = [
    'country' => 'country',
    'year' => 'accidentYear',
    'month' => 'month',
    'gender' => 'driverGender',
    'severity' => 'accidentSeverity',
    'roadType' => 'roadType'
];

// Create WHERE clauses for query
$whereClauses = [];
foreach ($map as $key => $value) {
    if(!empty($data[$key])) {
        $column = $map[$key];
        $whereClauses[] = "$column = '" . $conn->real_escape_string($data[$key]) . "'";
    }
} 

// Base query with make JOINS
$baseQuery = "
    FROM accidents
    INNER JOIN drivers ON accidents.accidentId = drivers.accidentId
    INNER JOIN locations ON drivers.accidentId = locations.accidentId
    INNER JOIN statistics ON locations.accidentId = statistics.accidentId
";
if (!empty($whereClauses)) {
    $baseQuery .= " WHERE " . implode(" AND ", $whereClauses);
}

/* GRAPH QUERIES */

// Top countries with most accidents
$countriesAccident = "
SELECT country, COUNT(accidents.accidentId) as countryAccident $baseQuery 
GROUP BY country";
$countriesAccidentResult = $conn->query($countriesAccident);

$countriesAccidentData = [
    "country" => [],
    "count" => []
]; 

if($countriesAccidentResult) {
    while ($row = $countriesAccidentResult->fetch_assoc()) {
        $countriesAccidentData["country"][] = $row["country"];
        $countriesAccidentData["count"][] = $row["countryAccident"];
    }
}

// Most common accident cause
$commonAccident = "
SELECT accidentCause, COUNT(accidents.accidentId) as accidentQuant $baseQuery
GROUP BY accidentCause";
$commonAccidentResult = $conn->query($commonAccident);

$commonAccidentData = [
    "accidentCause" => [],
    "count" => []
]; 

if($commonAccidentResult) {
    while ($row = $commonAccidentResult->fetch_assoc()) {
        $commonAccidentData["accidentCause"][] = $row["accidentCause"];
        $commonAccidentData["count"][] = $row["accidentQuant"];
    }
}

// Number of cars involved
$carsInvolved = "
SELECT numCarsInvolved, COUNT(accidents.accidentId) as numCars $baseQuery
GROUP BY numCarsInvolved";
$carsInvolvedResult = $conn->query($carsInvolved);

$carsInvolvedData = [
    "numCars" => [],
    "count" => []
]; 

if($carsInvolvedResult) {
    while ($row = $carsInvolvedResult->fetch_assoc()) {
        $carsInvolvedData["numCars"][] = $row["numCarsInvolved"];
        $carsInvolvedData["count"][] = $row["numCars"];
    }
}

// Accidents over time
$accidentTime = "
SELECT dayOfWeek, COUNT(accidents.accidentId) as crashes $baseQuery
GROUP BY dayOfWeek";
$accidentTimeResult = $conn->query($accidentTime);

$accidentTimeData = [
    "weekDay" => [],
    "count" => []
]; 

if($accidentTimeResult) {
    while ($row = $accidentTimeResult->fetch_assoc()) {
        $accidentTimeData["weekDay"][] = $row["dayOfWeek"];
        $accidentTimeData["count"][] = $row["crashes"];
    }
}

// Combine all results into a single response
$response = [
    "countryAccident" => $countriesAccidentData,
    "accidentQuant" => $commonAccidentData,
    "numCars" => $carsInvolvedData,
    "crashes" => $accidentTimeData
];

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
?>