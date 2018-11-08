<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search For Donors</title>

    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">

</head>

<body>

<?php
        
        $host = "localhost";
        $host_user = "root";
        $host_pass = "B@ruch123";
        $database = "baruch_donor";
        $table = "donor";
        $port = "3306";
        
        $donorID = "donorID";
        $firstName = "first_name";
        $lastName = "last_name";
        $prefix = "prefix";
        $suffix = "suffix";
        // $username = $_POST["username"];
        // $password = $_POST["password"];

        
         
        // connect to mysql
        $mysql = mysqli_connect($host, $host_user, $host_pass);
         if(!$mysql) {
            echo "Cannot connect to database.";
            exit;
          }
          // select the appropriate database
          $selected = mysqli_select_db($mysql, $database);
          if(!$selected) {
            echo "Cannot select database.";
            exit;
          }

         $sql = "SELECT donorID, first_name, last_name, prefix, suffix FROM donor";
         $result = $mysql>query($sql);

         if ($result->num_rows > 0) {
            echo "<table> <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Prefix</th><th><Suffix</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["donorID"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["prefix"]. "</td><td>" . $row["suffix"]. "</td></tr>";
            }
            echo "</table>";
            } else {
            echo "0 Search Results";
            }
   
         $conn->close();
?>

    <form method="post">
        <h1>Search For A Donor</h1>
        <p>Prefix: <input type="text" name="Prefix"></p>
        <p>First Name: <input type="text" name="First_Name"></p>
        <p>Last Name: <input type="text" name="Last_Name"></p>
        <p>Suffix <input type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>

        <p><input type="submit" name="submit" value="Search"></p>
    </form>
    <!-- Include Script for PHP -->
</body>

</html>