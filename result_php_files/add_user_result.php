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
    <div class="container box">
        <div class="jumbotron">
            <?php
                //on click of search_donor button
                if(isset($_POST['submit_add_user'])){
                    require_once('../assets/php/connection.php'); //establishes connection to the database
                    
                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $existing_user = "SELECT * FROM credentials WHERE username = '$username'";
                    //if no results are returned
                    if (mysqli_num_rows(mysqli_query($mysql, $existing_user)) == 0){ 
            ?>
                        <div class="alert alert-success">
                            <p>Sucessfully added</p>
                            <strong>
                                <?php
                                    echo $_POST["username"];
                                    $add_user_query = "INSERT INTO credentials(username, password) VALUES('$username', '$password')"; //builds the query for adding a user
                                    mysqli_query($mysql, $add_user_query);
                                ?>
                            </strong>
                            <p>as a user</p>  
                        </div>
                <?php
                    }
                    else{          
                ?>
                       <div class="alert alert-danger">
                            <?php
                                echo $_POST["username"];
                            ?>
                            <strong>
                                already exists.
                            </strong>
                        </div> 
                    <?php
                        }

                }
                    ?>
            <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/admin.html'">Return</button>
        </div>
    <div>
</body>

</html>