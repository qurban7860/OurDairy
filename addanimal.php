<?php require('conn.php'); ?>
<?php
$error = "";
$message = "";
if(isset($_REQUEST["addAnimal"])){
  
  $breed = $_REQUEST["breed"];
  $price = $_REQUEST["price"];
  $temp = $_REQUEST["temperature"];
  $status = $_REQUEST["status"];
  $mtemp = $_REQUEST["m_t"];
  $milk = $_REQUEST["milk"];
  
   $m_d=(int)$milk;

   $m_g="";
  if($m_d<10){
    $m_g="G0";
  }
  elseif($m_d>=10&&$m_d<=25){
    $m_g="G1";
  }
  elseif($m_d>25&&$m_d<=35){
    $m_g="G2";
  }
  else
  {
    $m_g="G3";
  }

  $m_w=7*($m_d);
  $m_m=4*($m_w);
  $m_a=12*($m_m);

  $sql = "INSERT INTO animal (id, breed, price, temperature, status, milk, mtemp, mgroup) 
                       VALUES (' ', '$breed', '$price', '$temp', '$status', '$milk', '$mtemp', '$m_g')";
  if ($conn->query($sql) === TRUE) {
     $message = "Animal Added Successfully!";
  }
  else {
   $error = "Error In Adding Animal!";
   }
  }
?>




<!DOCTYPE html>
<html>
  <head>
<title>Add Animal-Our Dairy</title>
<link rel="stylesheet" href="dashboardstyle.css">
<link rel="stylesheet" href="addanimalstyle.css">
  </head>
  <body>
  <?php require('navbar.php'); ?>
  <br>
  <?php require('vnavbar.php'); ?>
  <br>
  <h1 class="headings">Add Animal</h1>
<br>

<div id="container1">
		<form action="addanimal.php" method="POST">
			<h2>Add animal record</h2>
			<input type="text" placeholder="Enter Breed" name="breed" required/>
			<input type="text" placeholder="Enter Price" name="price" required/>
      <input type="text" placeholder="Enter Temperature" name="temperature" required/>
			<input type="text" placeholder="Enter Health Status" name="status" required/>
			<input type="text" placeholder="Enter Milk Production" name="milk" required/>
			<input type="text" placeholder="Enter Milk Temperature" name="m_t" required/>

            <button type="submit" name="addAnimal">Add</button>

			<span style='color:red'><?php echo $error ?></span>

		</form>
</div>

</body>
</html>