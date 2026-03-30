<?php
require_once('database.php');

function redirect($location) {
    header("Location: $location");
    exit();
}

if (isset($_POST['attiva'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        redirect('codice.html');
    } else {
        $query = "SELECT username, password FROM users WHERE username = :username";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetch(PDO::FETCH_ASSOC);
        
        if (!$user || !password_verify($password, $user['password'])) {
            redirect('codice.html');
        } else {
            $sql = "UPDATE `allarme` SET `attivo` = 1";

            if ($pdo->query($sql) === TRUE) {
                echo "Il valore è stato aggiornato nel database!";
                redirect('dashboard.html');
            } else {
                echo "Errore nell'aggiornamento del valore nel database: " . $pdo->errorInfo()[2];
                redirect('codice.html');
            }
        }
    }
}

if (isset($_POST['disattiva'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (empty($username) || empty($password)) {
        redirect('codice.html');
    } else {
        $query = "SELECT username, password FROM users WHERE username = :username";
        
        $check = $pdo->prepare($query);
        $check->bindParam(':username', $username, PDO::PARAM_STR);
        $check->execute();
        
        $user = $check->fetch(PDO::FETCH_ASSOC);
        
        if (!$user || !password_verify($password, $user['password'])) {
            redirect('codice.html');
        } else {
            $sql = "UPDATE `allarme` SET `attivo` = 0";

            if ($pdo->query($sql) === TRUE) {
                echo "Il valore è stato aggiornato nel database!";
                redirect('dashboard.html');
            } else {
                echo "Errore nell'aggiornamento del valore nel database: " . $pdo->errorInfo()[2];
                redirect('codice.html');
            }
        }
    }
}

