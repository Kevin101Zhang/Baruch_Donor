<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>This is the background</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/Background.css" type="text/css">
    <!-- Linking js -->
    <script defer src="../Assets/js/admin.js"></script>
</head>
<body>
<div class="row container-fluid" id="background-pic">
    
    <div class="col-2"></div>
   
    <div class="col-8">
    <div id="start"></div>

    <div id="center"><h2 id="name_here"></h2>


</div>
    <div id="end"></div>
    </div>
    
    <div class="col-2"></div>

</div>
<?php
    require_once('../assets/php/connection.php'); //establishes connection to the database
    $latest_query = "SELECT * FROM donor ORDER BY donor_id DESC LIMIT 1";
   
    $latest_result = mysqli_query($mysql, $latest_query);


    while($donor_row = mysqli_fetch_assoc($latest_result)){
        $prefix = $donor_row['prefix'];
        $first_name = $donor_row['first_name'];
        $last_name = $donor_row['last_name'];
        $suffix = $donor_row['suffix'];
?>
  <script>
          $("#name_here").html("<?php 
            echo $prefix;
            echo " ";
            echo $first_name;
            echo " ";
            echo $last_name;
            echo " ";
            echo $suffix;  
    }
?>");
    </script>
</body>
</html>
