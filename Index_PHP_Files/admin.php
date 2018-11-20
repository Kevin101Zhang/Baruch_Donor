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

    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
    <!-- Jquery -->
    <script> src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Linking JS -->
    <script src="../main.js"></script>

</head>

<body>

<div class="tab">
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/search_donor.php'">Search for Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/add_donor.php'">Add Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/admin.php'">Add User</button>
</div>

    <form method="post">
        <h1>Add a User</h1>
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="text" name="password"></p>
        <p><input id="submit" type="submit" name="submit" value="Add User"></p>
    </form>

</body>

</html>