<?php
    session_start();
    define('TITLE',"Signup | Cyber Forums");
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
    include 'includes/HTML-head.php';
?>  
    </head>
    <body>
    	<div id="signup">
        	<div class="container">
          		<div class="row">
    				<div class="col-sm-6 offset-sm-1">  
             			<div class="signup-left position-fixed text-center"> 
                			<img src="img/neko-resize.png">
                      <h1 class="text-white">Cyber Forum</h1>
                			<br>
                            <?php
                            
                                if(isset($_GET['error']))
                                {
                                    if($_GET['error'] == 'emptyfields')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Fill In All The Fields
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidmailuid')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid email and user name
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidmail')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid email
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invaliduid')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Please enter a valid user name
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'passwordcheck')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Passwords donot match
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'usertaken')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> This User name is already taken
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'invalidimagetype')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Invalid image type 
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'imguploaderror')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Image upload error, please try again
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'imgsizeexceeded')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Error: </strong> Image too large
                                              </div>';
                                    }
                                    else if ($_GET['error'] == 'sqlerror')
                                    {
                                        echo '<div class="alert alert-danger" role="alert">
                                                <strong>Website Error: </strong> Contact admin to have the issue fixed
                                              </div>';
                                    }
                                }
                                else if (isset($_GET['signup']) == 'success')
                                {
                                    echo '<div class="alert alert-success" role="alert">
                                            <strong>Signup Successful</strong> Please Login from the login menu
                                          </div>';
                                }
                            ?>
                            <form id="signup-form" action="includes/signup.inc.php" method='post' 
                                  enctype="multipart/form-data">
                        
                                <input type="submit" class="btn btn-black btn-lg" name="signup-submit" value="Create Account">
                                
                                <br><br>
                                
                                    <a  href="login.php">
                                        <i class="fa fa-sign-in fa-2x social-icon" aria-hidden="true"></i>
                                    </a>                                                         
                        </div>
                    </div>
                    
                    <div class="col-sm-6 offset-sm-6 text-center">
                        <h1 class="mt-5 text-white">Signup and Lets Go!</h1>
                        <br><br><br>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="name" class="text-white">Username</label>
                            <input type="text" class="form-control" id="name" name="uid" placeholder="Username" maxlength="25">
                          </div>

                          <div class="form-group col-md-6">
                            <label for="email" class="text-white">Email</label>
                            <input type="email" class="form-control" id="email" name="mail" placeholder="Email">
                          </div>
                        </div>

                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="pwd" class="text-white">Password</label>
                            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
                          </div>

                          <div class="form-group col-md-6">
                            <label for="pwd-repeat" class="text-white">Confirmation</label>
                            <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat Password">
                          </div>

                          <div class="form-group col-md-12 align-self-center">
                                <label class="text-white">Gender</label><br>
                                <div class="form-check form-check-inline">
                                  <input id="male" class="form-check-input" name="gender" value="m" type="radio" checked>
                                  <label for="male" class="form-check-label text-white">M</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input id="female" class="form-check-input" name="gender" value="f" type="radio">
                                  <label for="female" class="form-check-label text-white">F</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input id="none" class="form-check-input" name="gender" value="n" type="radio">
                                  <label for="none" class="form-check-label text-white">None</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row border-top my-3">
                            <div class="form-group col-md-12">
                                <h2 class="text-white">Optional</h2>
                            </div>
                        </div>

                        <div class="form-row ">
                          <div class="form-group col-md-6">
                            <label for="f-name" class="text-white">First Name</label>
                            <input type="text" class="form-control" id="f-name" name="f-name" placeholder="First name" maxlength="35">
                          </div>

                          <div class="form-group col-md-6">
                            <label for="l-name" class="text-white">Last Name</label>
                            <input type="text" class="form-control" id="l-name" name="l-name" placeholder="Last name" maxlength="35">
                          </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 align-self-center">
                                <img id="blah" class="rounded" src="#" alt="your image" class="img-responsive rounded"
                                     style="height: 200px; width: 190px; object-fit: cover;">
                                <br><br><label class="btn btn-primary ">
                                    Set Avatar <input type="file" id="imgInp" name='dp' hidden>
                              </label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="headline" class="text-white">Headline</label>
                            <input type="text" class="form-control" id="headline" name="headline" 
                                   placeholder="Your profile headline" 
                                   maxlength="120">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="bio" class="text-white">Bio</label>
                            <textarea class="form-control" id="bio" name="bio" rows="6" maxlength="1000"
                            placeholder="Tell people about yourself"></textarea>
                        </div>
                  	</form>
                </div>
            </div>
        </div>
    </div>

      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js" ></script>
      <script>
        $('#blah').attr('src', 'uploads/default.png');
          function readURL(input) 
          {
              if (input.files && input.files[0]) 
              {
                var reader = new FileReader();

                reader.onload = function(e) 
                {
                  $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
              }
            }

            $("#imgInp").change(function() 
            {
               readURL(this);
            });
      </script>
    </body>
</html>