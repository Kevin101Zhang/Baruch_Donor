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

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
            <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script src="../assets/JS/html2canvas.js"></script>
        </head>

        <body>

            <?php
                $prefix = $_SESSION['prefix'];
                $first_name = $_SESSION['first_name'];
                $last_name = $_SESSION['last_name'];
                $suffix = $_SESSION['suffix'];
                $pc_name = $_SESSION['pc_name'];

                $existing_donor = "SELECT prefix, first_name, last_name, suffix FROM donor WHERE prefix = '$prefix' AND first_name = '$first_name' AND last_name = '$last_name' AND suffix = '$suffix'"; 
                    if (mysqli_num_rows(mysqli_query($mysql, $existing_donor)) > 0){
                        $id_result = "SELECT donor_id FROM donor WHERE first_name = '$first_name' AND last_name = '$last_name' AND suffix = '$suffix'";
                        $id_row = mysqli_fetch_assoc(mysqli_query($mysql, $id_result));
                        $id = $id_row['donor_id'];
                        $add_pc = "INSERT INTO computer(pc_id, donor_id_f) VALUES('$pc_name','$id')"; 
                        mysqli_query($mysql, $add_pc);
                    }else{
                        //add donor to database
                        $add_donor_query = "INSERT INTO donor(prefix,first_name,last_name,suffix) VALUES('$prefix','$first_name','$last_name','$suffix')"; //builds the query for adding a donor
                        mysqli_query($mysql, $add_donor_query); //runs the add_donor_query

                        $latest_donor_id = "SELECT donor_id FROM donor ORDER BY donor_id DESC LIMIT 1"; //grab the most recent donor_id entry 
                        $id_row = mysqli_fetch_assoc(mysqli_query($mysql, $latest_donor_id));
                        $id_result = $id_row['donor_id'];
                        $add_pc_query = "INSERT INTO computer(pc_id, donor_id_f) VALUES('$pc_name','$id_result')"; //builds the query for adding a computer to the donor
                        mysqli_query($mysql, $add_pc_query);} //runs the add_pc_query
                            
                        //create file and directory
                        mkdir("../donor_backgrounds/$pc_name"); //create directory for generated background
                        if (count($_POST) && (strpos($_POST['img'], 'data:image/png;base64') === 0)) {
                            
                            $img = $_POST['img'];
                            $img = str_replace('data:image/png;base64,', '', $img);
                            $img = str_replace(' ', '+', $img);
                            $data = base64_decode($img);
                            $file = "../donor_backgrounds/$pc_name/Baruch-College-Background-Wallpaper".".png";
                        
                            if (file_put_contents($file, $data)) {
            ?>
                        <br>
                        <div class="alert alert-success" id="success">
                            Sucessfully added
                            <strong> <?php echo $prefix." ".$first_name." ".$last_name." ".$suffix; ?></strong>
                            to
                            <strong> <?php echo $pc_name; ?> </strong>
                        </div>
            <?php
                    } else {
                        echo "<p>The file could not be saved.</p>";
                    }
                }

            ?>
            <?php 
            if(isset($_SESSION['admin'])){
            ?>
                <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/admin.php'">Return</button>
            <?php
            }else{
            ?>
                <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/user.php'">Return</button>
            <?php
            }  
            ?>
            
        </body>

        </html>
<?php
    }else{
        header("Location:../index_php_files/index.html");
    }
?>