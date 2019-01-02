<?php
    session_start();
    $admin = $_SESSION['login'];
    if(isset($admin) && $admin == "admin"){
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
            <script defer src="../Assets/js/admin.js"></script>
        </head>

        <body>
            <div class="row">
                <div class="container col-2 col-lg-4"></div>

                <div class="container col-8 col-lg-4 box">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#search_donor">Search Donors</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#add_donor">Add Donor</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#add_user">Add User</a>
                        </li>
                    </ul>
                    
                    <!-- Tab panes -->
                    <div class="tab-content jumbotron" id="form_container">
                        <div id="search_donor" class="container tab-pane active">
                            <h2>Search for a donor</h2>
                            <br>
                            <form method="post" action="../result_php_files/search_donor_result.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Prefix" name="prefix">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Suffix" name="suffix">
                                </div>
                                <div class="text-center"> 
                                <button type="submit" class="btn btn-primary" name="submit_search_donor">Search</button>
                                </div>
                            </form>
                        </div>
                        <div id="add_donor" class="container tab-pane fade">
                            <h2>Add a Donor</h2>
                            <br>
                            <form method="POST" action="../result_php_files/preview.php">
                                <div class="form-group">
                                    <input type="text" class="form-control prefix" placeholder="Prefix" name="prefix">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control first_name" placeholder="First Name" name="first_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control last_name" placeholder="Last Name" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control suffix" placeholder="Suffix" name="suffix">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="PC Name" name="pc_name" required>
                                </div>
                                <div class="text-center"> 
                                <button type="submit" id="add_donor_button" class="btn btn-primary" name="submit_add_donor">Add</button>
                                </div>
                            </form>
                        </div>
                        <div id="add_user" class="container tab-pane fade">
                            <h2>Add a User</h2>
                            <br>
                            <form method="post" action="../result_php_files/add_user_result.php">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <div class="text-center"> 
                                    <button type="submit" class="btn btn-primary" name="submit_add_user">Add</button>
                                </div>
                                </form>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container col-2 col-lg-4"></div>
            </div>
        </body>

        </html>
<?php
    }else{
        header("Location:index.html");
    }
?>