<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>

    <!-- Linking Reset -->
    <link rel="stylesheet" href="../Assets/CSS/reset.css" type="text/css">
    <!-- Linking CSS -->
    <link rel="stylesheet" href="../Assets/CSS/admin.css" type="text/css">
 
    <!-- Jquery -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous">
  </script>

    <!-- Linking JS -->
    <!-- <script src="../assets/js/admin.js"></script> -->

</head>

<div class="tab">
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/search_donor.php'">Search for Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/add_donor.php'">Add Donor</button>
  <button class="tablinks" onclick="window.location.href='../index_PHP_Files/admin.php'">Add User</button>
</div>

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

  <form method="post">
    <h1>Search for a Donor</h1>
    <p>Prefix: <input type="text" name="Prefix"></p>
    <p>First Name: <input type="text" name="First_Name"></p>
    <p>Last Name: <input type="text" name="Last_Name"></p>
    <p>Suffix <input type="text" name="Suffix"></p>
    <p>PC Name: <input type="text" name="PC_Name"></p>

    <p><input type="submit" name="submit" value="Search"></p>
  </form>

  <?php
  
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
        $pc_query = "SELECT computer.pc_id, donor.donor_id FROM computer INNER JOIN donor ON computer.donor_id_f = donor.donor_id";
        // if there are conditions defined
        if(count($conditions) > 0) {
            // append the conditions
            $query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
            echo $query;
        }
        $result = mysqli_query($mysql, $query);
        $pc_result = mysqli_query($mysql, $pc_query);
        while($row = mysqli_fetch_assoc($result)){
    ?>

    <h1>
    <?php
        // echo $donor_row['donor_id'];
        // echo $donor_row['prefix'];
        // echo $donor_row['first_name'];
        // echo $donor_row['last_name'];
        // echo $donor_row['suffix'];  
        echo $row['donor_id'];
        echo $row['prefix'];
        echo $row['first_name'];
        echo $row['last_name'];
        echo $row['suffix'];  
        // echo $pc_row['pc_id'];
    }
    ?>
    </h1>
  <?php
  }
  ?>
</body>

</html>