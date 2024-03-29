<?php

    session_start();
    define('TITLE',"Cyber Forums"); 
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?>  
    </head>
    
    <body>

    <section id="cover">
        <div id="cover-caption">
            <div class="container">
                <div class="col-sm-10 offset-sm-1">
                    <img src='img/neko-resize.png'>
                    <h1 class="text-white">Cyber Forum</h1>
                    <br>
                    <h4 class="text-white">Your place to talk about your favorite topics about internet.</h4>
                    <br>
                    <?php
                    
                        if(isset($_GET['error']))
                        {
                            if($_GET['error'] == 'emptyfields')
                            {
                                echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Fill In All The Fields
                                      </div>';
                            }
                            else if($_GET['error'] == 'nouser')
                            {
                                echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Wrong Password or Username
                                        <a class="alert-link">Forgot Password? (Not working for now)</a>
                                      </div>';
                            }
                            else if ($_GET['error'] == 'wrongpwd')
                            {;
                                echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Wrong Password or Username 
                                         <a class="alert-link">Forgot Password? (Not working for now)</a>
                                      </div>';
                            }
                            else if ($_GET['error'] == 'sqlerror')
                            {
                                echo '<div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>Website error. Contact admin to have it fixed
                                      </div>';
                            }
                            
                        }
                        else if(isset($_GET['newpwd']))
                        {
                            if($_GET['newpwd'] == 'passwordupdated')
                            {
                                echo '<div class="alert alert-success" role="alert">
                                        <strong>Password Updated </strong>Login with your new password
                                      </div>';
                            }
                        }
                    ?>
                    <form method="post" action="includes/login.inc.php" class="form-inline justify-content-center">
                        <div class="form-group">
                            <label class="sr-only">Name</label>
                            <input type="text" id="name" name="mailuid"
                                   class="form-control form-control-lg mr-1" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="sr-only">Email</label>
                            <input type="password" id="password" name="pwd"
                                   class="form-control form-control-lg mr-1" placeholder="Password">
                        </div>
                        <input type="submit" class="btn btn-dark btn-lg mr-1" name="login-submit" value="Login">
                    </form>
                    <br><a href="signup.php" class="btn btn-dark btn-lg mr-1">Create Account</a>
                    
                    <br><br>
                    
                </div>
            </div>
        </div>
    </section>

        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js" ></script>
    </body>
</html>