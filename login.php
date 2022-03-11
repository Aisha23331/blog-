<?php

require(login.html);

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


if(isset($_POST['login'])){
if(isset($_POST['email']) && !empty($_POST['email']) AND isset($_POST['password']) && !empty($_POST['password'])){
        $email = mysql_escape_string($_POST['email']);
        $password = mysql_escape_string(md5($_POST['password']));
   
    //fetch info 
        $search = mysql_query("SELECT email, password FROM users WHERE email='".$email."' AND password='".password."") or die(mysql_error()); 
                
        $found  = mysql_num_rows($search);

        if( $found > 0)
            {
                sessin_start();
                $loginsuccess = '“Welcome User”.';
                header("location:addPost.html");
            
            }
            else
            {
                $loginfailed = 'Login Failed, use correct email/password.';
            }
        }else
        { ?>
        echo "<script type='text/javascript'>
            $('login').submit(function(e){
                
            e.preventDefault();

                if (email.value.length == 0 || password.value.length == 0){
                alert('Please select value');
                };
            });
            </script>"; 
            <?php
    
        }
    }

?>

    

