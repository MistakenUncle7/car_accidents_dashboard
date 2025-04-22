<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "road_accident_dataset"; 

// Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check status
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query  total accidents
$sql = "SELECT COUNT(*) AS total_accidents FROM accidents";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalAccidents = $row['total_accidents'];

// Query average injuries
$sql_injuries = "SELECT AVG(injuries) AS avg_injuries FROM accidents";
$result_injuries = $conn->query($sql_injuries);
$row_injuries = $result_injuries->fetch_assoc();
$avgInjuries = $row_injuries['avg_injuries'];

// Query  most common weather condition
$sql_weather = "SELECT weather_condition, COUNT(*) AS count FROM accidents GROUP BY weather_condition ORDER BY count DESC LIMIT 1";
$result_weather = $conn->query($sql_weather);
$row_weather = $result_weather->fetch_assoc();
$commonWeather = $row_weather['weather_condition'];

// Query average economic loss per accident
$sql_loss = "SELECT AVG(economic_loss) AS avg_economic_loss FROM accidents";
$result_loss = $conn->query($sql_loss);
$row_loss = $result_loss->fetch_assoc();
$avgEconomicLoss = $row_loss['avg_economic_loss'];

// Query  highest fatality country/year
$sql_fatality = "SELECT country, year, SUM(fatalities) AS total_fatalities FROM accidents GROUP BY country, year ORDER BY total_fatalities DESC LIMIT 1";
$result_fatality = $conn->query($sql_fatality);
$row_fatality = $result_fatality->fetch_assoc();
$highestFatality = $row_fatality['country'] . " / " . $row_fatality['year'];

// Query  most common accident cause
$sql_cause = "SELECT cause, COUNT(*) AS count FROM accidents GROUP BY cause ORDER BY count DESC LIMIT 1";
$result_cause = $conn->query($sql_cause);
$row_cause = $result_cause->fetch_assoc();
$commonCause = $row_cause['cause'];

// Query  average emergency response time by region
$sql_response = "SELECT region, AVG(response_time) AS avg_response_time FROM accidents GROUP BY region";
$result_response = $conn->query($sql_response);
$row_response = $result_response->fetch_assoc();
$avgResponseTime = $row_response['avg_response_time'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Car Crashes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Car Crashes WorldWide</h1>
    </header>

    <nav>
    <nav>
            <div class="dropdown">
                <a href="#">Time</a>
                <div class="dropdown-content">
                    <a href="#">Year</a>
                    <a href="#">Month</a>
                    <a href="#">Day</a>
                    <a href="#">Hour</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#">Location</a>
                <div class="dropdown-content">
                    <a href="#">Country</a>
                    <a href="#">Region</a>
                    <a href="#">Urban/Rural</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#">Weather Conditions</a>
                <div class="dropdown-content">
                    <a href="#">Weather</a>
                    <a href="#">Road Type</a>
                    <a href="#">Road Condition</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#">Driver Info</a>
                <div class="dropdown-content">
                    <a href="#">Age</a>
                    <a href="#">Gender</a>
                    <a href="#">Alcohol Level</a>
                    <a href="#">Fatigue</a>
                </div>
            </div>

            <div class="dropdown">
                <a href="#">Outcome</a>
                <div class="dropdown-content">
                    <a href="#">Severity</a>
                    <a href="#">Injuries</a>
                    <a href="#">Fatalities</a>
                    <a href="#">Medical Cost</a>
                </div>
            </div>
        </nav>
    </nav>




    <main>
        <section class="dashboard-summary">
            <div class="summary-card">
                <h3>Total Accidents</h3>
                <p id="total-accidents"><?php echo $totalAccidents; ?></p>
            </div>
            <div class="summary-card">
                <h3>Average Injuries per Accident</h3>
                <p id="avg-injuries"><?php echo $avgInjuries; ?></p>
            </div>
            <div class="summary-card">
                <h3>Most Common Weather Condition</h3>
                <p id="common-weather"><?php echo $commonWeather; ?></p>
            </div>
            <div class="summary-card">
                <h3>Average Economic Loss per Accident</h3>
                <p id="avg-economic-loss"><?php echo $avgEconomicLoss; ?></p>
            </div>
        </section>

        <section class="quick-summary">
            <div class="summary-card">
                <h3>Highest Fatality Country/Year</h3>
                <p id="highest-fatality"><?php echo $highestFatality; ?></p>
            </div>
            <div class="summary-card">
                <h3>Most Common Accident Cause</h3>
                <p id="common-cause"><?php echo $commonCause; ?></p>
            </div>
            <div class="summary-card">
                <h3>Average Emergency Response Time by Region</h3>
                <p id="avg-response-time"><?php echo $avgResponseTime; ?></p>
            </div>
        </section>

        <section class="visualizations">
            <h2>Graphs</h2>

            <!-- Accident  -->
            <div class="chart-section">
                <h3> Accident Breakdown</h3>
                <div class="chart" id="accident-bar-chart"></div> <!-- Bar Chart -->
                <div class="chart" id="accident-heatmap"></div> <!-- Heatmap -->
                <div class="chart" id="accident-pie-chart"></div> <!-- Pie Chart -->
            </div>

            <!-- Damage Analysis  -->
            <div class="chart-section">
                <h3> Severity & Damage Analysis</h3>
                <div class="chart" id="severity-stacked-bar-chart"></div> 
                <div class="chart" id="severity-bubble-chart"></div> 
                <div class="chart" id="economic-line-chart"></div> 
            </div>

            <!--  Recovery Section -->
            <div class="chart-section">
                <h3> Response & Recovery</h3>
                <div class="chart" id="response-bar-chart"></div> 
                <div class="chart" id="response-scatter-plot"></div> 
            </div>
        </section>
    </main>

</body>
</html>
