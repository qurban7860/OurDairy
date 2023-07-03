<?php require('conn.php'); ?>
<!DOCTYPE html>
<html>
  <head>
<title>Diet Plans-Our Dairy</title>
<link rel="stylesheet" href="dashboardstyle.css">
<link rel="stylesheet" href="addanimalstyle.css">
  </head>
  <body>
  <?php require('navbar.php'); ?>
  <br>
  <?php require('vnavbar.php'); ?>
  <br>
  <h1 class="headings">Diet Plans</h1>
<br>

<?php
require('conn.php');

// Fetch all animals with their diet plans
$sql = "SELECT id, breed, price, temperature, status, milk, mtemp, mgroup, diet_plan FROM animal";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='div1'>
            <h2>ID: " . $row["id"] . "</h2>
            <h3>Breed: " . $row["breed"] . "</h3>
            <h3>Price: " . $row["price"] . "</h3>
            <h3>Diet Plan: " . $row["diet_plan"] . "</h3>
            <button onclick='assignDietPlan(" . $row["id"] . ")'>Assign Diet Plan</button>
          </div><br>";
  }
} else {
  echo "No Data currently available!";
}
?>

<script>
  function assignDietPlan(id) {
    window.location.href = "assign-dietplan.php?id=" + id;
  }
</script>


</body>
</head>
</html>