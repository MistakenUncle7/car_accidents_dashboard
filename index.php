<?php include 'assets/php/connection.php'?>
<?php include 'assets/php/select.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="icon" href="assets/icons/favicon.svg">
    <link rel="stylesheet" href="assets/css/stylesheet.css">
</head>
<body>
    <h1 class="title">Road Accidents Dashboard</h1>
    <div class="grid-container">
        <!-- Form -->
        <form class="form container-fluid div-style">
            <div class="row row-cols-3">

                <div class="col mb-2">
                    <label for="country">Country:</label>
                    <select class="form-select" name="country" id="country">
                        <option value="" disabled selected hidden>Select</option>
                        <option value="">Any</option>
                        <?php
                        $sql = "SELECT DISTINCT country FROM `locations`";
                        $result = $conn->query($sql);
                        getOptions($result, "country");
                        ?>
                    </select>
                </div>

                <div class="col mb-2">
                <label for="year">Year:</label>
                    <select class="form-select" name="year" id="year">
                        <option value="" disable selected hidden>Select</option>
                        <option value="">Any</option>
                        <?php
                        $sql = "SELECT DISTINCT accidentYear FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "accidentYear");
                        ?>
                    </select>
                </div>

                <div class="col mb-2">
                    <label for="month">Month:</label>
                    <select class="form-select" name="month" id="month">
                    <option value="" disable selected hidden>Select</option>
                    <option value="">Any</option>
                    <?php
                        $sql = "SELECT DISTINCT month FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "month");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="gender">Driver Gender:</label>
                    <select class="form-select" name="gender" id="gender">
                        <option value="" disable selected hidden>Select</option>
                        <option value="">Any</option>
                        <?php
                        $sql = "SELECT DISTINCT driverGender FROM `drivers`";
                        $result = $conn->query($sql);
                        getOptions($result, "driverGender");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="severity">Accident Severity:</label>
                    <select class="form-select" name="severity" id="severity">
                        <option value="" disable selected hidden>Select</option>
                        <option value="">Any</option>
                        <?php
                        $sql = "SELECT DISTINCT accidentSeverity FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "accidentSeverity");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="roadType">Road Type:</label>
                    <select class="form-select" name="roadType" id="roadType">
                        <option value="" disable selected hidden>Select</option>
                        <option value="">Any</option>
                        <?php
                        $sql = "SELECT DISTINCT roadType FROM `locations`";
                        $result = $conn->query($sql);
                        getOptions($result, "roadType");
                        ?>
                    </select>
                </div>
                
            </div>
        </form>

        <!-- Cards -->
        <div class="card-container">
            <div class="card-section">

                <div class="card-element div-style">
                    <!-- <h2>131,999</h2>
                    Total Accidents -->
                </div>

                <div class="card-element div-style">
                    <!-- <h2>263,394</h2>
                    Total Fatalities -->
                </div>

                <div class="card-element div-style">
                    <!-- <h2>$98,372M</h2>
                    Economic Loss -->
                </div>

                <div class="card-element div-style">
                    <!-- <h2>593,418</h2>
                    Insurance Claims -->
                </div>

            </div>
        </div>

        <!-- Sidebar -->
        <div class="sidebar">
            <div class="charts-container">

                <div class="charts-card div-style">
                    <h4>Most Common Accident Cause</h4>
                    <canvas id="accidentCause"></canvas>
                </div>

                <div class="charts-card div-style"> 
                    <h4>Number Of Cars Involved</h4>
                    <canvas id="carsInvolved"></canvas>
                </div>

            </div>
        </div>
        
         <!-- Main -->
        <main class="main">
            <div class="charts-container">
                
                <div class="div-style">
                    <h4>Accidents Over Time</h4>
                    <canvas id="myChart"></canvas>
                </div>

                <div class="charts-card div-style">
                    <h4>Top Countries With Most Accidents</h4>
                    <canvas id="topCountries"></canvas>
                </div>

            </div>
        </main>     

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- JS Scripts -->
    <script src="assets/js/graphs.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>
</html>