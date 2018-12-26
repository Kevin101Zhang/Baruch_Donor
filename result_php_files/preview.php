<?php
        //on click of add_donor button
        if(isset($_POST['submit_add_donor'])){
            require_once('../assets/php/connection.php'); //establishes connection to the database
            session_start();
?>   
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
            <div class="container-fluid box">
                <div class="jumbotron">
                    <div class="row container-fluid" id="background_pic">      
                        <div class="col-2"></div>

                        <div class="col-8">
                            <div id="start"></div>

                            <div id="center"><h2 id="name_here"></h2></div>

                            <div id="end"></div>
                        </div>

                        <div class="col-2"></div>
                    </div>

                    <?php
                        // sets the form inputs as variables
                        $prefix = $_POST["prefix"];
                        $first_name = $_POST["first_name"];
                        $last_name = $_POST["last_name"];
                        $suffix = $_POST["suffix"];
                        $pc_name = $_POST["pc_name"];

                        $_SESSION['prefix'] = $prefix;
                        $_SESSION['first_name'] = $first_name;
                        $_SESSION['last_name'] = $last_name;
                        $_SESSION['suffix'] = $suffix;
                        $_SESSION['pc_name'] = $pc_name;

                        $existing_donor = "SELECT * FROM donor WHERE first_name = '$first_name' AND last_name = '$last_name'";
                        //there is a matching result
                        if (mysqli_num_rows(mysqli_query($mysql, $existing_donor)) > 0){ 
                    ?>
                            <div class="alert alert-danger">
                                <strong> <?php echo $prefix." ".$first_name." ".$last_name." ".$suffix; ?> </strong>
                                is already an existing donor. Do you want to override the existing donor with the new PC?
                            </div>
                            <form method="post" action="add_donor_result.php">
                                <input id="input_img" name="img" type="hidden" value="">
                                <input id="" type="submit" value="Confirm" class="btn btn-primary">
                            </form>
                    <?php
                        }else{ //there are NO matching results
                    ?>
                            <form method="post" action="add_donor_result.php">
                                <input id="input_img" name="img" type="hidden" value="">
                                <input id="" type="submit" value="Confirm" class="btn btn-primary">
                            </form>  

                        <?php } //closing for else ?>
                        <button type="submit" class="btn btn-primary" onclick="window.history.back();">Return</button>
                </div>  <!-- closing for jumbotron -->
            </div> <!-- closing for container -->
    <?php }//closing for ifset ?>

    <script>
        $("#name_here").html("<?php echo $prefix." ".$first_name." ".$last_name." ".$suffix;; ?>");
        html2canvas(document.querySelector("#background_pic")).then(canvas => {
            document.body.appendChild(canvas);
            document.getElementById('input_img').value = canvas.toDataURL();
            canvas.style.display="none";
        });
    
    if ( window.history.replaceState ) {
        window.history.replaceState( {} , 'foo', '../index_php_files/user.php' );
    }
    
    </script>


</body>

</html>