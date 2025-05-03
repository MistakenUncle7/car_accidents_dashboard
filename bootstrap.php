<?php include 'assets/php/connection.php'?>
<?php include 'assets/php/select.php'?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="icon" href="assets/icons/favicon.svg">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>
    <div class="grid-container">
        <!-- Form -->
        <form class="form container-fluid">
            <h2>Filters</h2>
            <div class="row row-cols-5">
                <div class="col">
                    <label for="month">Mes:</label>
                    <select class="form-select form-select-sm" name="month" id="month">
                    <option value="" disable selected hidden>Seleccione un mes</option>
                    <?php
                        $sql = "SELECT DISTINCT month FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "month");
                        ?>
                    </select>
                </div>

                <div class="col">
                <label for="year">Año:</label>
                    <select class="form-select form-select-sm" name="year" id="year">
                        <option value="" disable selected hidden>Seleccione un año</option>
                        <?php
                        $sql = "SELECT DISTINCT accidentYear FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "accidentYear");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="country">Pais:</label>
                    <select class="form-select form-select-sm" name="country" id="country">
                        <option value="" disable selected hidden>Seleccione un País</option>
                        <?php
                        $sql = "SELECT DISTINCT country FROM `locations`";
                        $result = $conn->query($sql);
                        getOptions($result, "country");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="weather">Tipo de clima:</label>
                    <select class="form-select form-select-sm" name="weather" id="weather">
                        <option value="" disable selected hidden>Seleccione un tipo</option>
                        <?php
                        $sql = "SELECT DISTINCT weatherConditions FROM `locations`";
                        $result = $conn->query($sql);
                        getOptions($result, "weatherConditions");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="gender">Genero del conductor:</label>
                    <select class="form-select form-select-sm" name="gender" id="gender">
                        <option value="" disable selected hidden>Seleccione un genero</option>
                        <?php
                        $sql = "SELECT DISTINCT driverGender FROM `drivers`";
                        $result = $conn->query($sql);
                        getOptions($result, "driverGender");
                        ?>
                    </select>
                </div>

                <div class="col">
                    <label for="carCond">Condicion del vehiculo:</label>
                    <select class="form-select form-select-sm" name="carCond" id="carCond">
                        <option value="" disable selected hidden>Seleccione un tipo</option>
                        <?php
                        $sql = "SELECT DISTINCT vehicleCondition FROM `drivers`";
                        $result = $conn->query($sql);
                        getOptions($result, "vehicleCondition");
                        ?>
                    </select>
                </div>
                
                <div class="col">
                    <label for="severity">Gravedad:</label>
                    <select class="form-select form-select-sm" name="severity" id="severity">
                        <option value="" disable selected hidden>Seleccione un tipo</option>
                        <?php
                        $sql = "SELECT DISTINCT accidentSeverity FROM `accidents`";
                        $result = $conn->query($sql);
                        getOptions($result, "accidentSeverity");
                        ?>
                    </select>
                </div>
                
            </div>
        </form>

        <!-- Sidebar -->
        <!-- <aside class="sidebar">

        </aside> -->

        <!-- Cards -->
         <div class="card-container">
            <div class="card-section">
                <div class="card-element" style="background-color: #2962ff">
                <h1>249</h1>
                    <div class="card-inner">
                        <h3>Total Accidents</h3>
                        <span class="material-icons-outlined">inventory_2</span>
                    </div>
                </div>

                <div class="card-element" style="background-color: #ff6d00">
                    <div class="card-inner">
                        <h3>Total Fatalities</h3>
                        <span class="material-icons-outlined">category</span>
                    </div>
                    <h1>249</h1>
                </div>

                <div class="card-element" style="background-color: #2e7d32">
                    <div class="card-inner">
                        <h3>Economic Loss</h3>
                        <span class="material-icons-outlined">groups</span>
                    </div>
                    <h1>249</h1>
                </div>

                <div class="card-element" style="background-color: #d50000">
                    <div class="card-inner">
                        <h3>ALERTS</h3>
                        <span class="material-icons-outlined">notification_important</span>
                    </div>
                    <h1>249</h1>
                </div>

            </div>
         </div>

        <!-- Main -->
        <main class="main">
            <div class="charts">

                <div class="charts-card">
                    <canvas id="myChart"></canvas>
                </div>

                <div class="charts-card">
                    <canvas id="myChart"></canvas>
                </div>

            </div>
        </main>

    </div>

    <!-- Chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- JS Scripts -->
    <script src="assets/js/chart1.js"></script>
</body>
</html>