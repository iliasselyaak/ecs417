<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Iliass' Portfolio</title>
        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="portfolio.css" type="text/css"/>
    </head>
    <body>
        <nav class="navBar" role="navigation">
            <ul>
                <li class="name"><a href="portfolio.html">Iliass Elyaakoubi Benssaleh</a></li>                    
                <li><a href ="portfolio.html">About Me</a></li>
                <li><a href ="skills.html">Skills</a></li>
                <li><a href ="education.html">Education</a></li>
                <li><a href ="experience.html">Experience</a></li>
                <li><a href ="projects.html">Projects</a></li>
                <li><a class="navRight" href =#contacts>Contacts</a></li>
                <li><a class="navRight" href ="#blog">Blog</a></li>
            </ul>
        </nav>
        <header>
            <hgroup>
                <h1>Iliass Elyaakoubi Benssaleh</h1>
                <h3>Queen Mary University of London Student</h3>
            </hgroup>
            <figure>
                <img class="background" src="background1.jpg"><br>
                <img class="portrait" src="iliass.jpg" alt="Iliass Elyaakoubi Benssaleh" width="200"/>
                <figcaption>Future Software Engineer</figcaption>
                <a href="#blog"><img class="downArrow" src="downArrow.png"></a>
            </figure>
        </header>
        <div id="main">
            <section id="blog">
                <h2>My Personal Blog</h2>
                <?php
                    session_start();
                    if(!isset($_SESSION['isLogged'])){
                        $buttonLabel ="Login";
                        $isLogged = True;
                    }
                    else{
                        $buttonLabel="Logout";
                        $isLogged = False;
                    }
                    
                ?>
                <a href=<?php if($isLogged){echo "login.html";}else{echo "logout.php";}?>><button class="login"><?php echo $buttonLabel ?></button></a>
                <a href="addPost.php"><button class="addPost">Add Post</button></a>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="sortForm">
                    <label for="month">Please select the month:</label>
                    <select name="month" id="month">
                        <option value="all">Select Month</option>
                        <option value="all">All</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                        <input type="submit" value ="Sort" class="sort">
                </form>
                <style>
                    <?php include "portfolio.css" ?>
                </style>
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
                    //Sql Query
                    $sql = "SELECT * FROM BLOG";
                    $result = $conn->query($sql);

                    //Store all data into an associative array with fetch_assos()
                    $data = array();
                    while($row = $result->fetch_assoc()){
                        $data[] = $row;
                    }

                    //Sorts the array in reverse order as the latest post are stored at the end of the array
                    rsort($data);

                    //Checks value from form
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        //Store month option
                        $month = $_POST['month'];

                        if($month != 'all'){
                            echo "<p class='displayMonth'>Displaying ".$month." posts.</p>";
                            $count = count($data);
                            for($i=0; $i< $count;$i++){
                                if(!str_contains($data[$i]['date'],$month))
                                    unset($data[$i]);
                            }
                        }
                    }

                    //Display posts in a table
                    echo "<table id='posts'>";
                    foreach ($data as $value){
                        echo  "<tr>
                            <th class='title'>".$value['title']."</th>
                            </tr>
                            <tr>
                            <td class='postText'>".$value['postText']."</td>
                            </tr>
                            <tr>
                            <td class='date'>".$value['date']."</td>
                            </tr>";
                    }
                    echo "</table>";
                ?>
            </section>
        </div>
        <footer id="contacts">
            <h3>Contacts</h4>
            <ul>
                <li><a href="https://github.com/iliasselyaak"><img src="gitHub.png"></a></li>
                <li><a href="https://www.linkedin.com/in/iliass-elyaakoubi-benssaleh-2840561b4/"><img src="linkedIn.png"></a></li>
                <li><a href="https://www.instagram.com/iliasselyaa/"><img src="insta.png"></a></li>
            </ul>
            <p>
                <br>Email: iliasselyaa@hotmail.com | Telephone: +44 7770956895<br>
                <i>Copyright © 2021 Iliass Elyaakoubi Benssaleh</i>
            </p>
        </footer>
    </body>
</html>