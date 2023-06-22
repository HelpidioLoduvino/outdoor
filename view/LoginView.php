<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/controller/AdminController.php';
require_once '/Applications/XAMPP/xamppfiles/htdocs/outdoor-angola/model/User.php';
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>OUTDOORS</title>
        <link rel="stylesheet" href="../content/bootstrap/css/bootstrap.min.css"/>
        <link href="../content/css/style.css" rel="stylesheet" type="text/css" media="screen"/> 
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand justify-content-center title" href="#" ></a>
        </nav>

        <div class="logo">

            <p id="o">O</p>
            <p id="l">UTDOORS</p>

        </div>

        <div class="container center">
            <form method="POST">
                <div class="form-group">
                    <label for="email">Email</label><br/>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required=""><br/>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br/>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required><br/>
                </div>
                <button type="submit" name="login_button" class="btn btn-success">Login</button>
                <a href="../view/UserView.php" class="btn btn-primary">Guest User</a>
            </form>
        </div>
        
        <?php 
        if(isset($_POST['login_button'])){
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $adminController->entrar($email, $password);
        }
        ?>

        <script src="../scripts/bootstrap/css/bootstrap.min.js"></script>
    </body>
</html>
