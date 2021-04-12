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
        $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
        // Checks connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

        
        //create query
        $sql = "SELECT * FROM CREDENTIALS WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows==1) {
                echo "Success";
                 
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
        ?>
    </body>
</html>