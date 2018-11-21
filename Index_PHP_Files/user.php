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
    <!-- $add_donor_query = "INSERT INTO donor('$prefix','$first_name','$last_name','$suffix','$pc_id')" -->
    <div class="container">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#search_donor">Search for a donor</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#add_donor">Add Donor</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="form_container">
            <div id="search_donor" class="container tab-pane active"><br>
                <form method="post" action="user.php">
                    <p>Prefix: <input type="text" name="prefix"></p>
                    <p>First Name: <input type="text" name="first_name"></p>
                    <p>Last Name: <input type="text" name="last_name"></p>
                    <p>Suffix: <input type="text" name="suffix"></p>
                    <p><input type="submit" name="submit" value="Search"></p>
                </form>
            </div>
            <div id="add_donor" class="container tab-pane fade"><br>
                <form method="post" action="user.php">
                    <p>Prefix: <input type="text" name="prefix"></p>
                    <p>First Name: <input type="text" name="first_name"></p>
                    <p>Last Name: <input type="text" name="last_name"></p>
                    <p>Suffix: <input type="text" name="suffix"></p>
                    <p>PC Name: <input type="text" name="pc_name"></p>
                    <p><input type="submit" name="submit" value="Search"></p>
                </form>
            </div>
        </div>
    </div>
    <?php
        //on click of submit
        if(isset($_POST['submit'])){
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
            
            while($donor_row = mysqli_fetch_assoc($donor_result)){
            ?>
            <h1>
            <?php
                $donor_id = $donor_row['donor_id'];
                
                //prints each of the matching results
                echo $donor_id;
                echo $donor_row['prefix'];
                echo $donor_row['first_name'];
                echo $donor_row['last_name'];
                echo $donor_row['suffix'];  
                echo $donor_row['entry_date'];  

                $pc_query = "SELECT DISTINCT computer.pc_id FROM computer INNER JOIN donor ON computer.donor_id_f = '$donor_id'"; //builds the query for pc_id
                $pc_result = mysqli_query($mysql, $pc_query);

                while($pc_row = mysqli_fetch_assoc($pc_result)){
                    echo $pc_row['pc_id'];
                }
            }
            ?>
            </h1>
            <?php
        }
    ?>
</body>

</html>