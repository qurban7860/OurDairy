<!--Assign DietPlan-->

<?php
require('conn.php');

if (isset($_GET['id'])) {
  $animalId = $_GET['id'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dietPlan = $_POST['diet_plan'];

    $sql = "UPDATE animal SET diet_plan = '$dietPlan' WHERE id = '$animalId'";
    if (mysqli_query($conn, $sql)) {
      echo "Diet Plan Assigned Successfully";
      exit;
    } else {
      echo "Diet Plan assignment failed: " . mysqli_error($conn);
    }
  }

  $sql = "SELECT id, breed, price, temperature, status, milk, mtemp, mgroup, diet_plan FROM animal WHERE id = '$animalId'";
  $result = mysqli_query($conn, $sql);
  $animal = mysqli_fetch_assoc($result);

  if ($animal) {
    echo "<h1>Assign Diet Plan for Animal ID: " . $animal['id'] . "</h1>";
    echo "<form method='POST' action='assign-dietplan.php?id=" . $animal['id'] . "'>
            <label for='diet_plan'>Diet Plan:</label>
            <input type='text' id='diet_plan' name='diet_plan' value='" . $animal['diet_plan'] . "'>
            <br>
            <input type='submit' value='Assign Diet Plan'>
          </form>";
  } else {
    echo "Animal not found!";
  }
} else {
  echo "Animal ID not provided!";
}

mysqli_close($conn);
?>
