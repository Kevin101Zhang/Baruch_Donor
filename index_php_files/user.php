<?php
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login'] == "user"){
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">

            <title>User</title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

            <link rel="stylesheet" href="../Assets/CSS/index.css" type="text/css">
        </head>

        <body>
            <div class="row">
                <div class="container col-2 col-lg-4"></div>

                <div class="container col-8 col-lg-4 box">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#search_donor">Search/Edit Donors</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#add_donor">Add Donor/PC</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content jumbotron" id="form_container">
                        <div id="search_donor" class="container tab-pane active"><br>
                            <h4>Search/Edit Donors by Name</h4>
                            <br>
                            <form method="post" action="../result_php_files/search_donor_result.php">
                                <div class="form-group">
                                    <input id="prefix" type="text" class="block form-control" placeholder="Prefix" name="prefix">
                                </div>
                                <div class="form-group">
                                    <input id="first_name" type="text" class="block form-control" placeholder="First Name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <input id="last_name" type="text" class="block form-control" placeholder="Last Name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <input id="suffix" type="text" class="block form-control" placeholder="Suffix" name="suffix">
                                </div>
                            <hr>
                                <h4>Search/Edit Donors by PC</h4>
                                <br>
                                <div class="form-group">
                                    <input id="pc_id" type="text" class="form-control" placeholder="PC" name="pc_id">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit_search_donor">Search</button>
                            </form>
                        </div>
                        <div id="add_donor" class="container tab-pane fade"><br>
                            <h4>Add Donor/PC</h4>
                            <br>
                            <form method="post" action="../result_php_files/preview.php">
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
                                    <input id="pc_id" type="text" class="form-control" placeholder="PC Name" name="pc_name" required>
                                </div>
                                <button id="submit" type="submit" class="btn btn-primary" name="submit_add_donor">Add</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="container col-2 col-lg-4"></div>
            </div>
            <script src="../assets/js/disable_input.js"></script>
        </body>

        </html>
<?php
    }else{
        session_destroy(); //clears all login information
        header("Location:index.php");
    }
?>

