<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/admin.css" type="text/css">
 
    <!-- Jquery -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
  


  </script>

    <!-- Linking JS -->
    <script src="../assets/js/admin.js"></script>

</head>

<body>

<div class="tab">
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/search_donor.php'">Search for Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/add_donor.php'">Add Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/admin.php'">Add User</button>
</div>

    <form method="post">
        <h1>Add A Donor</h1>
        <p>Prefix: <input id="prefix" type="text" name="Prefix"></p>
        <p>First Name: <input id="firstName" type="text" name="First_Name"></p>
        <p>Last Name: <input id="lastName" type="text" name="Last_Name"></p>
        <p>Suffix <input id="suffix" type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>
        <!-- <div class="testing">Hello</div> -->
        <input id="submit" type="submit" name="submit" value="Add User">
    </form>
<?php

$add_donor_query = "INSERT INTO donor('$prefix','$prefix','$first_name','$last_name','$suffix','$pc_id')"

?>

</body>

</html>