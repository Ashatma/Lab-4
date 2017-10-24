<?php

@ $db = new mysqli('localhost', 'root', 'root', 'library');

if ($db->connect_error) {
    echo "Error! Could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to Home Page </a>");
    exit();
}

    #the mysqli_real_espace_string function helps us solve the SQL Injection
    #it adds forward-slashes in front of chars that we can't store in the username/pass
    #in order to excecute a SQL Injection you need to use a ' (apostrophe)
    #Basically we want to output something like \' in front, so it is ignored by code and processed as text

if (isset($_POST['username'], $_POST['password'])) {
    #with statement under we're making it SQL Injection-proof
    $uname = mysqli_real_escape_string($db, $_POST['username']);
    
    #without function, so here you can try to implement the SQL injection
    #various types to do it, either add ' -- to the end of a username, which will comment out
    #or simply use 
    #' OR '1'='1' #
    #$uname = $_POST['username'];
    
    #here we hash the password, and we want to have it hashed in the database as well
    #optimally when you create a user (through code) you simply send a hash
    #hasing can be done using different methods, MD5, SHA1 etc.
    
    $upass = sha1 ($_POST['password']);
    
    #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql
    
    $query = ("SELECT * FROM user WHERE username = '{$uname}' AND password = '{$upass}'");
       
    
    $stmt = $db->prepare($query);
    $stmt->execute();
    $stmt->store_result(); 
    
    #here we create a new variable 'totalcount' just to check if there's at least
    #one user with the right combination. If there is, we later on print out "access granted"
    
    $totalcount = $stmt->num_rows();
    

    

        if (isset($totalcount)) {
            if ($totalcount == 1) {

                $_SESSION['login_user'] = $uname;
                 
                header("location: fileUpload.php");  

            } else {   

                $error = "Your Login or Password is invalid"; 

            }
        }
        
    
}
?>


<!DOCTYPE html>

<html>
        
   <link rel="icon" type="image/png" href="img/r_icon.png"/>
   <link rel="stylesheet" type="text/css" href="main.css">
   
   <head>
      <title>READERON: LOGIN</title>
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="image/png" href="img/r_icon.png"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Oswald:300,400,500,600" rel="stylesheet">
   </head>
   
   <body>
    
      <div id="login_container">

         <h1 id="welcome">Welcome to </h1>
         <h2 id="welcome_to">READERON:</h2>
               
               <form action = "" method = "post">

                  <br><input id="browse_form" type = "text" name = "username" class = "box" placeholder="Login">

                  <br><input id="browse_form" type = "password" name = "password" class = "box" placeholder="Password"><br/><br />
                  <input id="submit" type = "submit" value = " SUBMIT "/><br />
               </form>
               
               <div><br><?php echo $error; ?></div>
                    
            </div>
                
         </div>
            
      </div>

   </body>

</html>