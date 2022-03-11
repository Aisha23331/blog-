<?php
if(isset($_POST['logout'])){
    session_destroy();
    unset($_SESSION['email']);
    header('location: blog.php');
}

<?
    
    
    
    
<html>
 <form action="logout.php" method="post">
                    <button type="submit" name="logout">Logout</button>
                </form>
    </html>