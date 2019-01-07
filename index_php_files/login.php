<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css"> 
</head>

<body>
  <?php 
    
    if(isset($_POST['submit_login'])){
      session_start();
      require_once('../assets/php/connection.php');  
      $username = $_POST["username"];
      $password = $_POST["password"];
      $table = "credentials";
      $_SESSION['user'] = $username;

      //query the database for username and password
      $query_user = "select username FROM $table WHERE username = '$username' ";
      $query_password = "select password FROM $table WHERE password = '$password' ";
      $user_result = mysqli_query($mysql, $query_user);
      $password_result = mysqli_query($mysql, $query_password);

      //log user action
      $log_file = fopen("../assets/log.txt", "a") or die("Unable to open log file!");
      $log_user = "$username";
      $log_message = "Log in";

      // visitor's name and password combination are user credentials
      if (mysqli_num_rows($password_result)>0 && mysqli_num_rows($user_result)>0) {
         require_once('../assets/php/log.php'); //log user action

        $_SESSION['login'] = "user";
        echo "<script> location.href='user.php'; </script>"; //redirect to user page
      
      // visitor's name and password combination are admin credentials
      }elseif ($username == "bctcproject" && $password == "B@ruch123"){
        require_once('../assets/php/log.php'); //log user action
        
        $_SESSION['login'] = "admin";
        echo "<script> location.href='admin.php'; </script>"; //redirect to admin page
      } 
    } 
  ?> 
</body>

</html>
