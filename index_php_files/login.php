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
  <?php
    if(isset($_POST['submit_login'])){
      require_once('../assets/php/connection.php');  
      $username = $_POST["username"];
      $password = $_POST["password"];
      $table = "credentials";

      //query the database for username and password
      $query_user = "select username FROM $table WHERE username = '$username' ";
      $query_password = "select password FROM $table WHERE password = '$password' ";

      $user_result = mysqli_query($mysql, $query_user);
      $password_result = mysqli_query($mysql, $query_password);

      //check if there is a matching result
      if (mysqli_num_rows($password_result)>0 && mysqli_num_rows($user_result)>0) {
        // visitor's name and password combination are user credentials
        echo "<script> location.href='user.html'; </script>"; 
        exit; 
      } elseif ($username == "bctcproject" && $password == "B@ruch123"){
        // visitor's name and password combination are admin credentials
        echo "<script> location.href='admin.html'; </script>";
        exit; 
      } 
    } 
  ?> 
</body>

</html>
