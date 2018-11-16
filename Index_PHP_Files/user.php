<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Search For Donors</title>
    <!-- Latest compiled and minified Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">

</head>

<body>

    <?php
            
        $host = "localhost";
        $host_user = "root";
        $host_pass = "B@ruch123";
        $database = "baruch_donor";
        // $table = "donor";
        $port = "3306";
        
        // connect to mysql
        $mysql = mysqli_connect($host, $host_user, $host_pass);
        if(!$mysql) {
        echo "Cannot connect to database.";
        exit;
        }
        // select the appropriate database
        $selected = mysqli_select_db($mysql, $database);
        if(!$selected) {
        echo "Cannot select database.";
        exit;
        }
    ?>
   <form method="post" action="user.php">
        <h3 class="center">Search For A Donor</h3>
       <br>
       <p>Prefix: <input type="text" name="prefix"></p>
         <p>First Name: <input type="text" name="first_name"></p>
        <p>Last Name: <input type="text" name="last_name"></p>
        <p>Suffix: <input type="text" name="suffix"></p>
        <p>PC Name: <input type="text" name="pc_name"></p>
         <p><input type="submit" name="submit" value="Search"></p>
 </form>
    <?php
        //on click of submit
        if(isset($_POST['submit'])){

            // define the list of fields
            $fields = array('donor_id', 'prefix', 'first_name', 'last_name', 'suffix', 'entry_date');
            $conditions = array();
        
            // loop through the defined fields
            foreach($fields as $field){
                // if the field is set and not empty
                if(isset($_POST[$field]) && $_POST[$field] != '') {
                    // create a new condition while escaping the value inputed by the user (SQL Injection)
                    $conditions[] = "$field = '$_POST[$field]'";
                }
            }
        
            // builds the query
            $donor_query = "SELECT * FROM donor ";
            $pc_query = "SELECT computer.pc_id, donor.donor_id FROM computer INNER JOIN donor ON computer.donor_id_f = donor.donor_id";
            // if there are conditions defined
            if(count($conditions) > 0) {
                // append the conditions
                $donor_query .= "WHERE " . implode (' AND ', $conditions); 
                echo $donor_query;
            }
            
            $donor_result = mysqli_query($mysql, $donor_query);
            $pc_result = mysqli_query($mysql, $pc_query);

            while($donor_row = mysqli_fetch_assoc($donor_result) && $pc_row = mysqli_fetch_assoc($pc_result)){

            ?>
            <h1>
            <?php
                echo $donor_row['donor_id'];
                echo $donor_row['prefix'];
                echo $donor_row['first_name'];
                echo $donor_row['last_name'];
                echo $donor_row['suffix'];  
                echo $pc_row['pc_id'];
            }
            ?>
            </h1>
            <?php
        }

    ?>
</body>

</html>