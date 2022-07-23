<?php
  require 'navbar.html';
?>
<html>
  <head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
<form method="post" action="addproduct.php">
  <div class="form-group" >
    <label for="numeProd">Nume Produs</label>
    <input type="text" class="form-control" id="numeProd" placeholder="Product Name" name="product_name">
  </div>
  <div class="form-group">
    <label for="Descriere">Descriere</label>
    <input type="text" class="form-control" id="Descriere" placeholder="Descriere" name="description">
  </div>
  <div class="form-group">
    <label for="Pret">Pret</label>
    <input type="number" class="form-control" id="Pret" placeholder="Pret" name="price">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</html>

<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  echo "post";
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

  $prod_name = $_POST['product_name'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $sql = "INSERT INTO products(nume,descriere,pret) VALUES 
  ('$prod_name','$description',$price)";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
else
{
  echo "notpost";
}

 

?>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> -->
