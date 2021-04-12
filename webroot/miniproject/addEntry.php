<!DOCTYPE html>
<html>
    <head>
<style>
    <?php include "reset.css" ?>
    <?php include "addEntry.css" ?>
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
       //Storing form details
        $title = $_POST['title'];
        $blogText = $_POST['blogText'];

        //create query
        date_default_timezone_set('Etc/GMT-1');
        $date = date("jS \of F Y, H:i") ." BST";
        $sql = "INSERT INTO BLOGS (title, postText, date) VALUES ('$title','$blogText','$date')";

        if($conn->query($sql) === TRUE)
        {
            echo "<h2>Post has been submitted successfully!</h2>
            <a href='blog.php' class='button'>Check Post</a>";
        }
        else{
            echo "The server has failed to post!
            <a href='addPost.php' class='button'>Try again</a>
            <a href='blog.php' class='button'>Return to Blog</a>";

        }

        $conn->close();
    }
?>
    </div>
    </body>
<html>