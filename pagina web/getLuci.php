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
    $sql = "SELECT * FROM luci";
    $result = $conn->query($sql);
    $vector;
    $index=0;
    while ($row = $result->fetch_assoc()){
        $vector[$index]=$row["stato"];
        $index++;
    }

    echo bindec(implode(array_reverse($vector)));
    /*
        invertiamo per il mio schema logico 
        implode trasforma rArray in stringa
        e poi ci facciamo la conversione in decimale
    */

}
//chiudiamo la connessione al db
$conn->close();
?>