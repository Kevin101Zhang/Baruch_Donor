<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
     <!-- Linking Reset -->
     <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
     <!-- Linking CSS -->
     <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css"> 
</head>

<body>
  <form method="post" action="index.php">
    <h1>Please Log In</h1>
    <br>
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <p><input type="submit" name="submit" value="Log In"></p>
  </form>

 <?php
  if(isset($_POST['submit'])){
    
    require_once('../assets/php/connection.php');  

    //query the database for username and password
    $query_user = "select username FROM $table WHERE username = '$username' ";
    $query_password = "select password FROM $table WHERE password = '$password' ";

    $user_result = mysqli_query($mysql, $query_user);
    $password_result = mysqli_query($mysql, $query_password);

    //check if there is a matching result
    if (mysqli_num_rows($password_result)>0 && mysqli_num_rows($user_result)>0) {
      // visitor's name and password combination are user credentials
      echo "<script> location.href='search_donor.php'; </script>"; 
      exit; 
    } elseif ($username == "bctcproject" && $password == "B@ruch123"){
      // visitor's name and password combination are admin credentials
      echo "<script> location.href='add_user.php'; </script>";
      exit; 
    } 
  } 
  ?> 
</body>

</html>
