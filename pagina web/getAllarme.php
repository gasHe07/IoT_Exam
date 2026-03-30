<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$conn = new mysqli($servername,$username,$password,$dbname);

 // Controlla gli eventuali errori di connessione
 if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

else{
    // Query per selezionare i valori dalla tabella del database
    $sql = "SELECT * FROM allarme";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['attivo']; //stampiamo l'unico elemento  
}
//chiudiamo la connessione al db
$conn->close();
?>