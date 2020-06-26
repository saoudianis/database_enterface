 <doctype html>
    <html>
    <head>
         <!-- the meta tags -->
        <meta charset="utf-8">
        <meta name="author" content="Anis Saoudi">
        <meta name="description" content="learn hacking">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width-devuce-widht, initial-scale=1">
        <meta http-equiv="content-language" content="EN,AR" />
         <!-- the icon of the page -->
        <link rel="icon" href="imgs/icon.ico">
              <title>Contact Form</title>
        <!-- the link tags -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            .emailh{
                text-align: center;
                border: 1px solid grey;
                border-radius: 10px;
                margin-top: 20px;
            }
            textarea{
                height: 120px;
            }
            form{
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <!-- the page body -->        
    <div>
       
        </div>
        <div class="container center_div">
            <div class="row">
                 
                <div class="col-md-12 col-md-offset-3 emailh">
        <h1>Admin Login Page</h1>
                    <!-- php Code -->
                    <?php 
                    error_reporting(0);
                    session_start();
                    
                    /* php alert functions */
                    $result='<div class="alert alert-info">Please Enter Your Information</div>';
                    
                    /* if user want logout */
                    if($_GET["logout"]==1 AND ($_SESSION['id']=="admin")){
                        session_destroy();
                        /* If user logout */
                    $result='<div class="alert alert-success">You Have Been Logged Out</div>';
                    }
                    
                    
                    /* if all info was right do */
                     if (($_POST["submit"]) AND (($_POST["password"]) AND ($_POST["email"]) )){
       
                     /* if the info was right */
                         if((($_POST["password"]=="admin") AND ($_POST["email"]=="admin") )){
                             
                        $result='<div class="alert alert-success">You LogIn ✓</div>'; 
                             
                        $_SESSION['id']="admin";     
                        header("location:login.php");     
                         
                     } 
                         /* if the info was wrong */
                         else {
                            
                             $result='<div class="alert alert-Danger">Sorry there is a error please enter a valid info </div>';
                     }
                     }
            /* if One of the enter info are missing */
                     if (($_POST["submit"]) AND (!($_POST["password"]) OR !($_POST["email"]))){
                       $result='<div class="alert alert-Danger">Please Enter All Your Info</div>';  
                         
                     }
        echo $result;
                    ?>
                    <!-- .../php -->
                    
                    
                    
                    <form method="post">
                    <div class="form-group">
                        <label for="email">Your UserName:</label>
                        <input type="text" name="email" class="form-control" placeholder="Your Email" />
                        </div>   
                        
                        
                    <div class="form-group">
                        <label for="name">Your Password:</label>
                        <input type="password" name="password" class="form-control" placeholder="Your Password" />
                        </div>
                        
                        
                        
                        <input type="submit" class="btn btn-success bnt-lg" value="Submit" name="submit" />
                    
                    
                    </form>
                    </div>
            </div>
        </div>
        
        
        
        
       
        
        
        
        
        
        
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
        </body>
    
    </html>