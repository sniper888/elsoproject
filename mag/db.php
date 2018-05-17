<?php
// localhost = 127.0.0.1
$servername = "localhost"; // adatbázis ip címe
$username = "root";
$password = "";
$database = "elsoproject";

// Adatbázis kapcsolat létrehozása (példányosítás)
$conn = new mysqli($servername, $username, $password, $database);

// Kapcsolat hiba vizsgálat
if ($conn->connect_error) {
    die("Csatlakozás sikertelen: " . $conn->connect_error);
}
//echo "Sikeres kapcsolódás";
?>

