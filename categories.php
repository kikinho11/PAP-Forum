<?php
    session_start();
    //Calls for the database info
    require 'includes/dbh.inc.php';
    
    //Defines a title for the website
    define('TITLE',"Categories | Cyber Forums");
    
    //Verifies if the user has a account signed in
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    //This is a include for the tags that all web pages call. (This is used to reduze the ammount of unnecessary code.)
    include 'includes/HTML-head.php';
?>  
        
        <link rel="stylesheet" type="text/css" href="css/list-page.css">
    </head>
    
    <body style="background: #f1f1f1">
        <!--Same logic as the HTML-head.php include-->
        <?php include 'includes/navbar.php'; ?>

        <main role="main" class="container">
      <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-dark rounded shadow-sm">
          <img class="mr-3" src="img/neko-resize.png" alt="" width="48" height="48">
        <div class="lh-100">
          <h1 class="mb-0 text-white lh-100">Cyber Forums</h1>
          <small>Your place to talk about your favorite topics about internet.</small>
        </div>
      </div>

      <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h5 class="border-bottom border-gray pb-2 mb-0">All Categories</h5>
        
        
        <?php
            //This is a search to check which categories exist in the forum
            $sql = "select cat_id, cat_name, cat_description, (
                        select count(*) from topics
                        where topics.topic_cat = cat_id
                        ) as forums
                    from categories
                    order by cat_id asc";
            
            $stmt = mysqli_stmt_init($conn);    

            if (!mysqli_stmt_prepare($stmt, $sql))
            {
                die('SQL error');
            }
            else
            {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result))
                {
                    
                    echo '<a href="topics.php?cat='.$row['cat_id'].'">
                        <div class="media text-muted pt-3">
                            <img src="img/black-bg.jpg" alt="" class="mr-2 rounded div-img ">
                            <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray ">
                              <strong class="d-block text-dark">'.ucwords($row['cat_name']).'</strong></a>
                                  <br>'.$row['cat_description'].'
                            </p>
                            <span class="text-right text-dark"> 
                                Forums: '.$row['forums'].' <i class="fa fa-book" aria-hidden="true"></i><br>';

                    echo '</div>';
                }
           }
        ?>
        </small>
      </div>
    </main>
        
        <?php include 'includes/footer.php'; ?>
        
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    </body>
</html>
