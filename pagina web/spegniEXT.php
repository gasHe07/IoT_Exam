<?php
 // Esegui la connessione al database
 $conn = new mysqli("127.0.0.1", "root", "", "test");

 // Controlla gli eventuali errori di connessione
 if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}
// Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led1
if (isset($_POST['spegni1'])) {
    // Modifica il valore desiderato
    $valore = 0;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led1'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led1
if (isset($_POST['accendi1'])) {
    // Modifica il valore desiderato
    $valore = 1;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led1'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led2
if (isset($_POST['spegni2'])) {
    // Modifica il valore desiderato
    $valore = 0;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led2'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led2
if (isset($_POST['accendi2'])) {
    // Modifica il valore desiderato
    $valore = 1;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led2'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Spegni" tramite il metodo POST per il led1
if (isset($_POST['spegni3'])) {
    // Modifica il valore desiderato
    $valore = 0;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led3'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

// Verifica se è stato inviato il valore "Accendi" tramite il metodo POST per il led1
if (isset($_POST['accendi3'])) {
    // Modifica il valore desiderato
    $valore = 1;
    // Esegui l'inserimento o l'aggiornamento del valore nel database
    $sql="UPDATE luci SET stato = $valore WHERE luce = 'led3'";
    if ($conn->query($sql) === TRUE) {
        echo "La luce è stata accesa e il valore è stato aggiornato nel database!";
        header("location: dashboard.html");
    } else {
        echo "Errore nell'aggiornamento del valore nel database: " . $conn->error;
        header("location: luci.html");
    }
}

$conn->close();
?>
