<?php
require('conn.php');

if (isset($_GET['id'])) {
  $animalId = $_GET['id'];

  $sql = "SELECT id, breed, price, temperature, status, milk, mtemp, mgroup FROM animal WHERE id = '$animalId'";
  $result = mysqli_query($conn, $sql);
  $animal = mysqli_fetch_assoc($result);

  if ($animal) {

    echo "<form method='POST' action='update-animal.php'>
            <input type='hidden' name='animal_id' value='" . $animal['id'] . "'>
            <div class='div1'>
              <h2>ID: " . $animal['id'] . "</h2>
              <h3>Breed: <input type='text' name='breed' value='" . $animal['breed'] . "'></h3>
              <h3>Price: <input type='text' name='price' value='" . $animal['price'] . "'></h3>
              <!-- Add other fields here for updating animal information -->
              <button type='submit'>Update</button>
            </div>
          </form>";
  } else {
    echo "Animal not found!";
  }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $animalId = $_POST['animal_id'];
  $breed = $_POST['breed'];
  $price = $_POST['price'];

  $sql = "UPDATE animal SET breed = '$breed', price = '$price' WHERE id = '$animalId'";
  if (mysqli_query($conn, $sql)) {
    echo "Update Successful";
    exit;
  } else {
    echo "Update failed: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
