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

            <title>Search For Donors</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css"> 
        </head>

        <body>
            <?php
            
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
                    $_SESSION['donor_query'] = $donor_query;
                    $donor_result = mysqli_query($mysql, $donor_query);

                    require('holder.php');   
                }
                
                ?>
        </body>

        </html>
<?php
    }else{
        header("Location:../index_php_files/index.html");
    }
?>