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

    //query the database for username and password
    $query_user = "select username FROM $table WHERE username = '$username' ";
    $query_password = "select password FROM $table WHERE password = '$password' ";

    $user_result = mysqli_query($mysql, $query_user);
    $password_result = mysqli_query($mysql, $query_password);

    //check if there is a matching result
    if (mysqli_num_rows($password_result)>0 && mysqli_num_rows($user_result)>0) {
      // visitor's name and password combination are user credentials
      echo "<script> location.href='user.php'; </script>"; 
      exit; 
    } elseif ($username == "bctcproject" && $password == "B@ruch123"){
      // visitor's name and password combination are admin credentials
      echo "<script> location.href='admin.php'; </script>";
      exit; 
    } 
  } 
  ?>
</body>

</html>