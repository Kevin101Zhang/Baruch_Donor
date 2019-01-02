<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search For Donors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
</head>

<body>

<?php

    require_once('../assets/php/connection.php'); //establishes connection to the database
    session_start();

    //on click of delete button
    if(isset($_POST['delete_button'])) {
        $delete_pc = $_POST['delete_button'];
        $delete_query = "DELETE FROM computer WHERE pc_id = '$delete_pc' ";
        mysqli_query($mysql, $delete_query);
        $donor_query = $_SESSION['donor_query'];

        $donor_result = mysqli_query($mysql, $donor_query);
        require('holder.php'); 
    }

?>
</body>

</html>