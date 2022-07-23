<?php
  require 'navbar.html';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "products";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT id,nume,descriere,pret FROM products";
    $result = $conn->query($sql);
    
    echo "<table class='table table-bordered' id='myTable'>
    <thead>
      <tr>
        <th scope='col'>#</th>
        <th scope='col'>Nume</th>
        <th scope='col'>Descriere</th>
        <th scope='col'>Pret</th>
      </tr>
    </thead>
    <tbody>";
    if ($result->num_rows > 0) {
      
        while($row = $result->fetch_assoc()) {
          echo "<tr>
          <td><a href='updateproduct.php?id={$row['id']}'>{$row['id']}</a></td>
          <td>{$row['nume']}</td>
          <td>{$row['descriere']}</td>
          <td>{$row['pret']}</td>
        </tr>";
        }
        echo "</tbody>
        </table>";
      } else {
        echo "0 results";
      }
      $conn->close();    
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>