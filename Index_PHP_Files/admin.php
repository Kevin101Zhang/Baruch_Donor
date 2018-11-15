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
    <form method="post">
        <h1 class="test">Add A Donor</h1>
        <p>Prefix: <input id="prefix" type="text" name="Prefix"></p>
        <p>First Name: <input id="firstName" type="text" name="First_Name"></p>
        <p>Last Name: <input id="lastName" type="text" name="Last_Name"></p>
        <p>Suffix <input id="suffix" type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>

        <p><input id="submit" type="submit" name="submit" value="Add User"></p>
    </form>

</body>

</html>