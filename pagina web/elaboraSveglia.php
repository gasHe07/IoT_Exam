<?php
session_start();
// Connessione al database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connessione al database fallita: " . $conn->connect_error);
}
if (isset($_POST['invia'])) {
    $sveglia = $_POST['tempo'] ?? '';
        $sql = "
        INSERT INTO sveglie(sveglia)
        VALUES ('$sveglia')
    ";
    $result = $conn->query($sql);
    header("Location: dashboard.html");
}