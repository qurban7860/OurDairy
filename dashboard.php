<?php require('conn.php'); ?>

<!DOCTYPE html>
<html>
  <head>
<title>Dashboard-Our Dairy</title>
<link rel="stylesheet" href="dashboardstyle.css">
  </head>
  <body>
  <?php require('navbar.php'); ?>
  <br>
  <?php require('vnavbar.php'); ?>
  <br>
  <h1 class="headings">Milk Production</h1>
<br>
<div id="daily" class="mproduction">
<h3>Daily</h3>
<br>
<h2 id="daily1"></h2>
<h3>10 ltr</h3>
</div>

<div id="weekly" class="mproduction">
<h3>Weekly</h3>
<br>
<h2 id="weekly1"></h2>
<h3>70 ltr</h3>
</div>

<div id="monthly" class="mproduction">
<h3>Monthly</h3>
<br>
<h2 id="monthly1"></h2>
<h3>280 ltr</h3>
</div>
<div id="annualy" class="mproduction">
<h3>Annualy</h3>
<br>
<h2 id="annualy1"></h2>
<h3>3000 ltr</h3>
</div>
<br><br><br>
<h1 class="headings">Cows List</h1><br>
<style>

</style>
<?php
$error = "";
$sql = "SELECT id, breed, price, temperature, status, milk, mtemp, mgroup FROM animal";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='div1'>
            <h2>ID: " . $row["id"] . "</h2>
            <h3>Breed: " . $row["breed"] . "</h3>
            <h3>Price: " . $row["price"] . "</h3>
            <button onclick='editAnimal(" . $row["id"] . ")'>Edit</button>
            <button onclick='updateAnimal(" . $row["id"] . ")'>Update</button>
            <button onclick='deleteAnimal(" . $row["id"] . ")'>Delete</button>
          </div><br>";
  }
} else {
  $error = "No Data currently available!";
}
?>

<span><?php echo $error ?></span>

    <script>

  function editAnimal(id) {
    window.location.href = "dashboard.php?id=" + id;
  }

  function updateAnimal(id) {
    window.location.href = "dashboard.php?id=" + id;
  }

  function deleteAnimal(id) {
    if (confirm("Are you sure you want to delete this animal?")) {
      window.location.href = "dashboard.php?id=" + id;
    }
  }
</script>

  </body>
</html>