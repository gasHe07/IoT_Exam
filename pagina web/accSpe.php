<?php
 // Esegui la connessione al database
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
    // Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led1
if (isset($_POST['spegniLuce1'])) {
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'0' WHERE `luci`.`luce` = 'led1'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led1
if (isset($_POST['accendiLuce1'])) {
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'1' WHERE `luci`.`luce` = 'led1'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led2
if (isset($_POST['spegniLuce2'])) {
    // Modifica il valore desiderato
    $valore = 0;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'0' WHERE `luci`.`luce` = 'led2'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led2
if (isset($_POST['accendiLuce2'])) {
    // Modifica il valore desiderato
    $valore = 1;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'1' WHERE `luci`.`luce` = 'led2'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led1
if (isset($_POST['spegniLuce3'])) {
    // Modifica il valore desiderato
    $valore = 0;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'0' WHERE `luci`.`luce` = 'led3'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led1
if (isset($_POST['accendiLuce3'])) {
    // Modifica il valore desiderato
    $valore = 1;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE `luci` SET `stato` = b'1' WHERE `luci`.`luce` = 'led3'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}
 }

$conn->close();
?>
