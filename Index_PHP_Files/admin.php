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
  
  $(document).ready(function(){
console.log("working");
function admin_function(evt, funct) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(funct).style.display = "block";
    evt.currentTarget.className += " active";
}


});

  </script>

    <!-- Linking JS -->
    <script src="../assets/js/admin.js"></script>

</head>

<body>

<div class="tab">
  <button class="tablinks" onclick="admin_function(event, 'search')">Search for Donor</button>
  <button class="tablinks" onclick="admin_function(event, 'add_donor')">Add Donor</button>
  <button class="tablinks" onclick="admin_function(event, 'add_user')">Add User</button>
</div>

<div id="search" class="tabcontent">
    <form method="post">
        <h1>Search for a Donor</h1>
        <p>Prefix: <input type="text" name="Prefix"></p>
        <p>First Name: <input type="text" name="First_Name"></p>
        <p>Last Name: <input type="text" name="Last_Name"></p>
        <p>Suffix <input type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>

        <p><input type="submit" name="submit" value="Add User"></p>
    </form>
</div>

<div id="add_donor" class="tabcontent">
    <form method="post">
        <h1>Add a Donor</h1>
        <p>Prefix: <input type="text" name="Prefix"></p>
        <p>First Name: <input type="text" name="First_Name"></p>
        <p>Last Name: <input type="text" name="Last_Name"></p>
        <p>Suffix <input type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>

        <p><input type="submit" name="submit" value="Add User"></p>
        <h1> add donor</h1>
    </form>
</div>

<div id="add_user" class="tabcontent">
    <form method="post">
        <h1>Add a User</h1>
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="text" name="password"></p>

        <p><input type="submit" name="submit" value="Add User"></p>
    </form>
</div>

<form method="post">
        <h1>Add A Donor</h1>
        <p>Prefix: <input id="prefix" type="text" name="Prefix"></p>
        <p>First Name: <input id="firstName" type="text" name="First_Name"></p>
        <p>Last Name: <input id="lastName" type="text" name="Last_Name"></p>
        <p>Suffix <input id="suffix" type="text" name="Suffix"></p>
        <p>PC Name: <input type="text" name="PC_Name"></p>
        <div class="testing">Hello</div>
        <input id="submit" type="submit" name="submit" value="Add User">
    </form>

</body>

</html>