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

    <div class="container">
        <div class="jumbotron">
            <div class="alert alert-success">
                <strong>Sucessfully added</strong> 
                <?php 
                    echo $_POST["prefix"];
                    echo " ";
                    echo $_POST["first_name"];
                    echo " "; 
                    echo $_POST["last_name"]; 
                    echo " ";
                    echo $_POST["suffix"]; 
                ?>
                <strong>to</strong>
                <?php
                    echo $_POST["pc_name"]; 
                ?>
            </div>
            <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/user.html'">Return</button>
        </div>  
    </div>
    <?php
        //on click of add_donor button
        if(isset($_POST['submit_add_donor'])){
            require_once('../assets/php/connection.php'); //establishes connection to the database
            
            // sets the form inputs as variables
            $prefix = $_POST["prefix"];
            $first_name = $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $suffix = $_POST["suffix"];
            $pc_name = $_POST["pc_name"];
        
            $add_donor_query = "INSERT INTO donor(prefix,first_name,last_name,suffix) VALUES('$prefix','$first_name','$last_name','$suffix')"; //builds the query for adding a donor
            mysqli_query($mysql, $add_donor_query); //runs the add_donor_query

            $latest_donor_id = "SELECT donor_id FROM donor ORDER BY donor_id DESC LIMIT 1"; //grab the most recent donor_id entry 
            $id_row = mysqli_fetch_assoc(mysqli_query($mysql, $latest_donor_id));
            $id_result = $id_row['donor_id'];
            $add_pc_query = "INSERT INTO computer(pc_id, donor_id_f) VALUES('$pc_name','$id_result')"; //builds the query for adding a computer to the donor
            mysqli_query($mysql, $add_pc_query); //runs the add_pc_query

            mkdir("../donor_backgrounds/$pc_name");

            $image_link = "https://printing.baruch.cuny.edu/custom/login-bg.jpg";//Direct link to image
            $split_image = pathinfo($image_link);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL , $image_link);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
            $response= curl_exec ($ch);
            curl_close($ch);
            $file_name = "../donor_backgrounds/$pc_name/".$split_image['filename'].".".$split_image['extension'];
            $file = fopen($file_name , 'w') or die("X_x");
            fwrite($file, $response);
            fclose($file);
        }
    ?>
</body>

</html>