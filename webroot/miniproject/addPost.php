<!DOCTYPE html>
<html>
    <?php
    session_start();
    if(!isset($_SESSION['isLogged'])){
        header('Location: login.html');
        die();
    }


    ?>
    <head>
        <meta charset="utf-8">
        <title>Add Post</title>
        <link rel="stylesheet" href="reset.css" type="text/css"/>
        <link rel="stylesheet" href="addPost.css" type="text/css"/>
    </head>
    <body>
        <form method="POST" action="addEntry.php">
            <fieldset>
                <legend>Add Blog</legend>
                <p>
                    <label>Title</label><br>
                    <input type="text" id="title" name="title" placeholder="Enter Title" value="<?php if(isset($_POST['title'])){echo $_POST['title'];} ?>">
                </p>
                <p>
                    <label>Text</label><br>
                    <textarea name="blogText" id="blogText" placeholder="Enter text here"><?php if(isset($_POST['blogText'])){echo $_POST['blogText'];} ?></textarea>
                </p>
            </fieldset>
            <footer>
                <p class="buttons">
                <script src="addPost.js"></script>
                    <br><input type="submit" name="option" id="post" value="Post">
                    <input type="button" onclick="return clearFields();" value="Clear">
                    <input type="submit" name="preview" id="preview" value="Preview" formaction="preview.php">
                </p>
                <script src="addPost.js"></script>
            </footer>
        </form>
    </body>
</html>