<!DOCTYPE html>
<html>
  <head>
    <title>Visualizza sveglie</title>
    <link rel="stylesheet" href="styleSveglie.css">
    <script>
      function toggleSelectAll() {
        var checkboxes = document.getElementsByName('selezionate[]');
        var selectAllButton = document.getElementById('select-all-button');
        var isSelectAll = selectAllButton.getAttribute('data-select-all') === 'true';

        for (var i = 0; i < checkboxes.length; i++) {
          checkboxes[i].checked = isSelectAll;
        }

        selectAllButton.setAttribute('data-select-all', !isSelectAll);
        selectAllButton.textContent = isSelectAll ? 'Deseleziona tutto' : 'Seleziona tutto';
      }
    </script>
  </head>
  <body>
    <form method="post" action="eliminaSveglie.php">
      <table>
        <thead>
          <tr>
            <th>Sveglie:</th>
            <th>Elimina</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Connessione al database
          $servername = "127.0.0.1";
          $username = "root";
          $password = "";
          $dbname = "test";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connessione al database fallita: " . $conn->connect_error);
          }

          // Query per selezionare la colonna dalla tabella e ordinare in base all'ora corrente
          $current_time = date("H:i:s");
          $sql = "SELECT * FROM sveglie ORDER BY sveglia ASC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // Stampa dei dati della colonna in modo ordinato
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["sveglia"] . "</td>";
              echo "<td><input type='checkbox' name='selezionate[]' value='" . $row["sveglia"] . "'></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='2'>Non ci sono sveglie impostate</td></tr>";
          }

          // Chiusura della connessione al database
          $conn->close();
          ?>
        </tbody>
      </table>
      <div class="button-container">
        <button type="submit" name="elimina" onclick="return confirm('Sei sicuro di voler eliminare le sveglie selezionate?')">Elimina selezionati</button>
      </div>
      <div class="button-container">
        <button type="button" id="select-all-button" onclick="toggleSelectAll()" data-select-all="true">Seleziona tutto</button>
      </div>
    </form>
    <div class="button-container">
      <button onclick="window.location.href = 'dashboard.html'">Torna alla Dashboard</button>
    </div>
  </body>
</html>
