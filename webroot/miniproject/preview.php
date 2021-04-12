<!DOCTYPE html>
<html>
    <head>
<style>
    <?php include "reset.css" ?>
    <?php include "preview.css" ?>
</style>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Storing form details
     $title = $_POST['title'];
     $blogText = $_POST['blogText'];
    echo "<h2>Preview:</h2>
        <table id='posts'>
        <tr>
        <th class='title'>".$title."</th>
        </tr>
        <tr>
        <td class='postText'>".$blogText."</td>
        </tr>
        <tr>
        <td class='date'>".date("jS \of F Y, H:i") ." BST</td>
        </tr>
        </table>
        <form action='addPost.php' method='POST' class='left'>
        <input class='button' type='submit' name='option' value='Edit'>
        <input type='hidden' name='title' value='".$title."'>
        <input type='hidden' name='blogText' value='".$blogText."'>
        </form>
        <form action='addEntry.php' method='POST' class='right'>
        <input class='button' type='submit' name='option' value='Post'>
        <input type='hidden' name='title' value='".$title."'>
        <input type='hidden' name='blogText' value='".$blogText."'>
        </form>
        ";
    

    }
    ?>
    </body>
<html>