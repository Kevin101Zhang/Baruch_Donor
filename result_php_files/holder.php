<?php

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
                                        
                                        delete_cell.innerHTML = 'a';
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
                                            pc_id_cell.innerHTML = '<form method="post" action="search_donor_result.php"> <button class="delete_button" type="submit" name="delete_button" id="delete_button" >x</button> </form>' + 
                                            '<?php echo $pc_id; ?>'; 
                                            $('#delete_button').val("<?php echo $pc_id; ?>");
                                        </script>
                            <?php
                                    }
                                }
                            ?>