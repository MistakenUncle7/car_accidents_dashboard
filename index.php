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
                        <option value="" disable selected hidden>Select</option>
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
                    <h2>123,456</h2>
                    Total Accidents
                </div>

                <div class="card-element div-style">
                    <h2>7,890</h2>
                    Total Fatalities
                </div>

                <div class="card-element div-style">
                    <h2>$12.3M</h2>
                    Economic Loss
                </div>

                <div class="card-element div-style">
                    <h2>2024</h2>
                    Placeholder
                </div>

            </div>
        </div>

        <!-- Bar -->
        <div class="bar div-style">

        </div>
        
         <!-- Main -->
        <main class="main">
            <div class="charts-container">
                <div class="div-style">
                    <canvas class="charts-card" id="accidentCause"></canvas>
                </div>
                
                <div class="div-style">
                    <canvas class="charts-card" id="myChart"></canvas>
                </div>
                
                <div class="div-style">
                    <canvas class="charts-card" id="myChart"></canvas>
                </div>
            </div>
        </main>

        <!-- Pie Chart -->
        <div class ="pie div-style">

        </div>
        

    </div>

    <!-- Chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- JS Scripts -->
    <script src="assets/js/accident_cause.js"></script>
    <script src="assets/js/test.js"></script>
</body>
</html>