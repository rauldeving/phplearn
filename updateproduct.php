<?php
  require 'navbar.html';
?>

<html>
<form method="post" action="updateproduct.php">
  <div class="form-group" >
    <label for="numeProd">Nume Produs</label><br>
    <input type="text" class="form-control" id="numeProd1" placeholder="Product Name" name="product_name">
  </div>
  <div class="form-group">
    <label for="Descriere">Descriere</label><br>
    <input type="text" class="form-control" id="Descriere1" placeholder="Descriere" name="description">
  </div>
  <div class="form-group">
    <label for="Pret">Pret</label><br>
    <input type="number" class="form-control" id="Pret1" placeholder="Pret" name="price">
  </div>
  <div class="form-group">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br>
</form>
</html>


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "products";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$prod_name = $_POST['product_name'];
$description = $_POST['description'];
$price = $_POST['price'];
$prod_id = $_POST['id'];

$sql = "UPDATE products SET nume = '$prod_name', descriere = '$description', pret = $price WHERE id = $prod_id";

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);

}
?>

