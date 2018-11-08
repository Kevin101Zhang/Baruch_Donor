<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css" media="screen" title="no title" charset="utf-8">
  <!-- All using Index CSS until styled -->
</head>

<body>
  <form method="post" action="index.php">
    <h1>Please Log In</h1>
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <p><input type="submit" name="submit" value="Log In"></p>
  </form>

  <?php

  if(isset($_POST['submit'])){
    
    $host = "localhost";
    $host_user = "root";
    $host_pass = "B@ruch123";
    $database = "baruch_donor";
    $table = "credentials";
    $port = "3306";
    $username = $_POST["username"];
    $password = $_POST["password"];
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

      // query the database to see if there is a record which matches
      // $query = "select count(*) from $table where username = '$username' and password = '$password' ";
      $query = "select * from $table where username = '$username' and password = '$password' ";
      $result = mysqli_query($mysql, $query);
      
      // if(!$result) {
      //   echo "Cannot run query.";
      //   exit;
      // }
      if($result) {
        echo "$result";
        exit;
      }
      $row = mysqli_fetch_row($result);

      $count = $row[0];

      if ($count > 0) {
        // visitor's name and password combination are correct
              echo "<script> location.href='admin.html'; </script>";
              exit;  
              
    } else {
      // visitor's name and password combination are not correct
      echo "<script> location.href='index.php'; </script>"; 
            exit; 
    }
  }
  ?>
</body>

</html>