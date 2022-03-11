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


if(isset($_POST['post'])){
    if(empty($_POST['title'])){
        echo "please add title";
    }
    else if(empty($_POST['text'])){
         echo "please add text";
    }
}


if(array_filter($errors)){
    echo"error in the form";
    header('Location:addPost.html');
}
else{
    $title = mysql_real_escape_string($conn, $_POST['title']);
    $text = mysql_real_escape_string($conn, $_POST['text']);
    
    sql = "INSERT INTO blog(title,text) VALUES('$title','$text')";
    
    //save to database 
    if(mysql_query($conn,mysql)){
        header('Location:viewBlog.php');
        
    }else{
        echo "query error:". mysql_error($conn);
    }
    
}

//adds a new post to a simple table within a MySQL database and redirects to