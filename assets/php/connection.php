<?php

// Displays connection errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Conection data
$host = 'localhost';
$user = 'root'; 
$password = 'root';
$database = 'car_accidents';

// Create conection
$conn = new mysqli($host, $user, $password, $database);

// Verify conection
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Close connection missing
?>