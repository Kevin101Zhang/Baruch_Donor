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

<div id="nav">
    <ul>
        <li><a href="admin.php">Add User</a><li>
        <li><a href="add_donor.php">Add Donor</a><li>
        <li><a href="search.php">Search Donor</a><li>
    <ul>
</div>

<div id="add_donor" class="tabcontent">
    <form method="post">
        <h1>Add a Donor</h1>
        <p>Prefix: <input type="text" name="Prefix"></p>
        <p>First Name: <input type="text" name="First_Name"></p>
        <p>Last Name: <input type="text" name="Last_Name"></p>
        <p>Suffix <input type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>

        <p><input type="submit" name="submit" value="Add User"></p>
        <h1> add donor</h1>
    </form>
</div>

</body>

</html>