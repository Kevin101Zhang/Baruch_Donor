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
        require_once('../assets/php/connection.php'); //establishes connection to the database

        if(isset($_POST['1'])) {
            $delete_query = "DELETE FROM donor WHERE donor_id = 6 ";
            mysqli_query($mysql, $delete_query);
        }
        //on click of search_donor button
        if(isset($_POST['submit_search_donor'])){
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

            $num_rows = mysqli_num_rows($donor_result);
    ?>
            <div class="container box">
                <div class="jumbotron">
                    <div class="alert alert-success">
                        <div class="container">
                        <h2>Search Results:</h2>         
                        <table class="table table-striped" id="donor_table">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Donor ID</th>
                                <th>Prefix</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Suffix</th>
                                <th>Entry Date</th>
                                <th>PC Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                        </table>
                        </div>
                        <script>
                            var row_count = 0;
                        </script>

                            <?php
                                while($donor_row = mysqli_fetch_assoc($donor_result)){

                                    $donor_id = $donor_row['donor_id'];
                                    $prefix = $donor_row['prefix'];
                                    $first_name = $donor_row['first_name'];
                                    $last_name = $donor_row['last_name'];
                                    $suffix = $donor_row['suffix'];
                                    
                                    $entry_date = $donor_row['entry_date'];
                            ?>
                                    <script>
                                        var table = document.getElementById("donor_table");
                                        var row = table.insertRow(-1);
                                        var delete_cell = row.insertCell(0);
                                        var donor_id_cell = row.insertCell(1);
                                        var prefix_cell = row.insertCell(2);
                                        var first_name_cell = row.insertCell(3);
                                        var last_name_cell = row.insertCell(4);
                                        var suffix_cell = row.insertCell(5);
                                        var entry_date_cell = row.insertCell(6);
                                        
                                        delete_cell.innerHTML = '<form method="post" action="search_donor_result.php"> <input class="btn btn-default btn-sm" type="submit" name="' + row_count + '" value="Delete"> </form>'
                                        donor_id_cell.innerHTML = "<?php echo $donor_id ?>";
                                        prefix_cell.innerHTML = "<?php echo $prefix ?>";
                                        first_name_cell.innerHTML = "<?php echo $first_name ?>";
                                        last_name_cell.innerHTML = "<?php echo $last_name ?>";
                                        suffix_cell.innerHTML = "<?php echo $suffix ?>";
                                        entry_date_cell.innerHTML = "<?php echo $entry_date ?>";
                                    </script>
                            <?php
                                    $pc_query = "SELECT DISTINCT computer.pc_id FROM computer INNER JOIN donor ON computer.donor_id_f = '$donor_id'"; //builds the query to find matching pc_id
                                    $pc_result = mysqli_query($mysql, $pc_query); 
                                    while($pc_row = mysqli_fetch_assoc($pc_result)){
                                        $pc_id = $pc_row['pc_id'];
                            ?>
                                        <script>
                                            var pc_id_cell = row.insertCell(7);
                                            pc_id_cell.innerHTML = "<?php echo $pc_id ?>"; 
                                        </script>
                            <?php
                                    }
                            ?>
                                    <script>row_count++;</script>
                            <?php
                                }
        }
                            ?>
                            <br>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="window.location.href='../index_php_files/user.php'">Return</button>
                </div>  
            </div>
    
    <script>
        var find_cell = document.getElementById("donor_table").rows[row_count].cells[1].innerHTML;
        console.log(find_cell);
    </script>
</body>

</html>