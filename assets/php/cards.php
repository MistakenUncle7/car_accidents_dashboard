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
$totalFatalities = "SELECT SUM(accidents.numberOfFatalites) AS fatalities $baseQuery";
$totalFatalitiesResult = $conn->query($totalFatalities);
$totalFatalities = $totalFatalitiesResult->fetch_assoc()["fatalities"] ?? 0;

// Economic loss
$economicLoss = "SELECT SUM(statistics.economicLoss) AS money $baseQuery";
$economicLossResult = $conn->query($economicLoss);
$economicLoss = $economicLossResult->fetch_assoc()["economicLoss"] ?? 0;

// Insurance claims
$insuranceClaims = "SELECT SUM(accidents.inusuranceClaims) AS claims $baseQuery";
$insuranceClaimsResult = $conn->query($insuranceClaims);
$insuranceClaims = $economicLossResult->fetch_assoc()["claims"] ?? 0;

//

?>