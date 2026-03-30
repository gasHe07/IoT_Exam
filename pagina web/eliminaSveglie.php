<?php
// Verifica se è stata inviata una richiesta POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connessione al database
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connessione al database fallita: " . $conn->connect_error);
    }

    // Verifica se sono stati selezionati degli elementi da eliminare
    if (isset($_POST['selezionate'])) {
        // Prendi gli elementi selezionati dall'array $_POST
        $sveglieSelezionate = $_POST['selezionate'];

        if (!empty($sveglieSelezionate)) {
            // Prepara la query per eliminare gli elementi selezionati
            $sql = "DELETE FROM sveglie WHERE sveglia IN ('" . implode("','", $sveglieSelezionate) . "')";

            // Esegui la query
            if ($conn->query($sql) === TRUE) {
                // Reindirizza a visualizza_sveglie.php con un messaggio di successo
                header("Location: dashboard.html");
                exit;
            } else {
                // Reindirizza a visualizza_sveglie.php con un messaggio di errore
                header("Location: visualizzaSveglie.php?error=" . urlencode("Errore durante l'eliminazione delle sveglie: " . $conn->error));
                exit;
            }
        }
    }
}

// Reindirizza a visualizza_sveglie.php se la richiesta POST è mancante o non ci sono elementi selezionati
header("Location: visualizzaSveglie.php.");
exit;
?>
