<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search For Donors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
</head>

<body>
    <h1>
    Successfully added

    username:
    <?php
    echo $_POST["username"];
    echo " and ";
    echo "password: ";
    echo $_POST["password"];
    ?>
    as a user.
    </h1>
<div class="container">
    <div>
    <?php
        //on click of search_donor button
        if(isset($_POST['submit_add_user'])){
            require_once('../assets/php/connection.php'); //establishes connection to the database

            $username = $_POST["username"];
            $password = $_POST["password"];
            $add_user_query = "INSERT INTO credentials(username, password) VALUES('$username', '$password')"; //builds the query for adding a user
            mysqli_query($mysql, $add_user_query);
        }
    ?>
</body>

</html>