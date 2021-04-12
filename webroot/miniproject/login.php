<!DOCTYPE html>
<html>
    <body>
        <?php
       $dbhost = getenv("MYSQL_SERVICE_HOST");
       $dbport = getenv("MYSQL_SERVICE_PORT");
       $dbuser = getenv("DATABASE_USER");
       $dbpwd = getenv("DATABASE_PASSWORD");
       $dbname = getenv("DATABASE_NAME");
        // Creates connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            if ($conn->query($sql) === TRUE) {
                echo "Success";
                 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
        ?>
    </body>
</html>