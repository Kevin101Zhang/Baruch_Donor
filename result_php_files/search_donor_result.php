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
    <?php
        //on click of search_donor button
        if(isset($_POST['submit_search_donor'])){
            require_once('../assets/php/connection.php'); //establishes connection to the database

            // define the list of fields
            $fields = array('donor_id', 'prefix', 'first_name', 'last_name', 'suffix', 'entry_date');
            $conditions = array();
        
            // loop through the defined fields
            foreach($fields as $field){
                // if the field is set and not empty
                if(isset($_POST[$field]) && $_POST[$field] != '') {
                    $conditions[] = "$field = '$_POST[$field]'"; // create a new condition while escaping the value inputed by the user (SQL Injection)
                }
            }
        
            $donor_query = "SELECT * FROM donor ";
            $donor_query .= "WHERE " . implode (' AND ', $conditions); //appends the conditions
            $donor_result = mysqli_query($mysql, $donor_query);
    ?>
            <div class="container">
                <div class="jumbotron">
                    <div class="alert alert-success">
                        <strong>Matching Results:</strong> 
                        <br>
                            <?php
                                while($donor_row = mysqli_fetch_assoc($donor_result)){
                                    $donor_id = $donor_row['donor_id'];
                            
                                    echo "Donor Id: ", $donor_id;
                                    echo " Prefix: ", $donor_row['prefix'];
                                    echo " First Name: ", $donor_row['first_name'];
                                    echo " Last Name: ",$donor_row['last_name'];
                                    echo " Suffix: ",$donor_row['suffix'];  
                                    echo " Entry Date: ",$donor_row['entry_date'], " ";  
 
                                    $pc_query = "SELECT DISTINCT computer.pc_id FROM computer INNER JOIN donor ON computer.donor_id_f = '$donor_id'"; //builds the query to find matching pc_id
                                    $pc_result = mysqli_query($mysql, $pc_query); //runs the pc_query

                                    while($pc_row = mysqli_fetch_assoc($pc_result)){
                                        echo $pc_row['pc_id'];
                                    }
                            ?>
                            <br>
                            <?php
                                }
        }
                            ?>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/user.html'">Return</button>
                </div>  
            </div>
</body>

</html>