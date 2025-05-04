<?php

include 'connection.php';

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

/* CARDS QUERIES */
// Total accidents
$totalAccidents = "SELECT COUNT(accidents.accidentId) AS accidents $baseQuery";
$totalAccidentsResult = $conn->query($totalAccidents);
$totalAccidents = $totalAccidentsResult->fetch_assoc()["accidents"] ?? 0;

//Total fatalities
$totalFatalities = "SELECT TRUNCATE(SUM(accidents.numberOfFatalities), 3) AS fatalities $baseQuery";
$totalFatalitiesResult = $conn->query($totalFatalities);
$totalFatalities = $totalFatalitiesResult->fetch_assoc()["fatalities"] ?? 0;

// Economic loss
$economicLoss = "SELECT 
  CASE
    WHEN SUM(statistics.economicLoss) >= 10000 THEN TRUNCATE(SUM(statistics.economicLoss) / POW(10, FLOOR(LOG10(SUM(statistics.economicLoss))) - 4), 0)
    WHEN SUM(statistics.economicLoss) >= 1 THEN TRUNCATE(SUM(statistics.economicLoss), 5 - FLOOR(LOG10(SUM(statistics.economicLoss))) - 1)
    ELSE TRUNCATE(SUM(statistics.economicLoss), 4)
  END AS money $baseQuery";
$economicLossResult = $conn->query($economicLoss);
$economicLoss = $economicLossResult->fetch_assoc()["money"] ?? 0;

// Insurance claims
$insuranceClaims = "SELECT SUM(accidents.insuranceClaims) AS claims $baseQuery";
$insuranceClaimsResult = $conn->query($insuranceClaims);
$insuranceClaims = $insuranceClaimsResult->fetch_assoc()["claims"] ?? 0;

// Combine all results into a single response
$response = [
    "accidents" => $totalAccidents,
    "fatalities" => $totalFatalities,
    "economicLoss" => $economicLoss,
    "claims" => $insuranceClaims
];

// Return the results as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>