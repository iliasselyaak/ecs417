<!DOCTYPE html>
<html>
    <head>
<style>
    <?php include "reset.css" ?>
    <?php include "login.css" ?>
</style>
</head>
<body>
    <div id="main">
<?php
    $dbhost = getenv("MYSQL_SERVICE_HOST");
    $dbport = getenv("MYSQL_SERVICE_PORT");
    $dbuser = getenv("DATABASE_USER");
    $dbpwd = getenv("DATABASE_PASSWORD");
    $dbname = getenv("DATABASE_NAME");
    // Creates connection
    $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Storing form credentials
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //create query
        $sql = "SELECT * FROM CREDENTIALS WHERE email = '$email' AND password = '$password'";

        $result = $conn->query($sql);
        if($result->num_rows==1)
        {
            session_start();
            $_SESSION['isLogged'] = "true";
            echo "<h2>Login Successful</h2>
            <a href='addPost.php' class='button'>Add Post</a>";
        }
        else{
            echo "<h2>Login failed!</h2>
            <a href='login.html' class='button'>Try again</a>
            <a href='blog.php' class='button'>Return to Blog</a>";

        }
        $conn->close();
    }
?>
    </div>
    </body>
<html>