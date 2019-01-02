<?php
    require_once('../assets/php/connection.php'); //establishes connection to the database
    session_start();
    $login = $_SESSION['login'];
    if(isset($login)){
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Delete</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </head>

    <body>

    <?php
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
<?php
    }else{
        header("Location:../index_php_files/index.html");
    }
?>