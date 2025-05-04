<?php

include 'connection.php';

// Function to get options for the select fetched from the db
function getOptions($result, $colName) {
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row[$colName]."'>".$row[$colName]."</option>";
        }
    } else {
        echo "<option value=''>No hay resultados</option>";
    }
}

?>