<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search For Donors</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../assets/JS/html2canvas.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Linking Reset -->
    <!-- <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css"> -->
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
    
    
</head>

<body>

    <?php
        require_once('../assets/php/connection.php'); //establishes connection to the database
        session_start();

        $prefix = $_SESSION['prefix'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $suffix = $_SESSION['suffix'];
        $pc_name = $_SESSION['pc_name'];

        //add donor to database

        $add_donor_query = "INSERT INTO donor(prefix,first_name,last_name,suffix) VALUES('$prefix','$first_name','$last_name','$suffix')"; //builds the query for adding a donor
        mysqli_query($mysql, $add_donor_query); //runs the add_donor_query

        $latest_donor_id = "SELECT donor_id FROM donor ORDER BY donor_id DESC LIMIT 1"; //grab the most recent donor_id entry 
        $id_row = mysqli_fetch_assoc(mysqli_query($mysql, $latest_donor_id));
        $id_result = $id_row['donor_id'];
        $add_pc_query = "INSERT INTO computer(pc_id, donor_id_f) VALUES('$pc_name','$id_result')"; //builds the query for adding a computer to the donor
        mysqli_query($mysql, $add_pc_query); //runs the add_pc_query

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

</body>

</html>