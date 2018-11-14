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
        <h1>Search For A Donor</h1>
        <p>Prefix: <input type="text" name="prefix"></p>
        <p>First Name: <input type="text" name="first_name"></p>
        <p>Last Name: <input type="text" name="last_name"></p>
        <p>Suffix <input type="text" name="suffix"></p>
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
            $query = "SELECT * FROM donor ";
            // if there are conditions defined
            if(count($conditions) > 0) {
                // append the conditions
                $query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
                echo $query;
            }
            $result = mysqli_query($mysql, $query);

            while($row = mysqli_fetch_assoc($result)){
            ?>
            <h1>
            <?php
                echo $row['donor_id'];
                echo $row['prefix'];
                echo $row['first_name'];
                echo $row['last_name'];
                echo $row['suffix'];  
            }
            ?>
            </h1>
            <?php
        }
    ?>
</body>

</html>