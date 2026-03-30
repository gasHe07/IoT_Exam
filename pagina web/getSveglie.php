<?php
// Configurazione del database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";
$lenght=0;
// Creazione della connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

// Query per selezionare i valori dalla tabella del database
$sql = "SELECT * FROM sveglie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $timeSeconds = strtotime($row["sveglia"]) - strtotime('now');
        if($timeSeconds<0){
            $timeSeconds+=86400;/*se il risultato è minore di zero, gli viene sommato 24h in secondi poiché si trova nel passato, così da 
                traslarlo nel futuro*/
        }
        $vector[$lenght]=$timeSeconds;
        $lenght++;
    }
} else {
    echo "Nessun dato presente nella tabella.";
}
echo min($vector);//faccio il controllo solo sul minimo del vettore, cioè la sveglia che suona prima

// Chiusura della connessione al database
$conn->close();
?>
