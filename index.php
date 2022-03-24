<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    
    <div class="login-pg container">
        <div class="form-era">

            <div class="alert alert-success" role="alert">
                <?php  
                    if(isset($_POST['register'])){ echo "Your Profile Succesfully register"; }
                    else if(isset($_POST['create'])){  echo "Register Yourself Here ...";  }
                    else{  echo "Login Here  ...";  }
                ?>
            </div>
            <form action= '<?php echo $_SERVER['PHP_SELF']; ?>' method="post" >
                <?php
                    if(isset($_POST['create'])){
                        echo '<div class="mb-3">';
                        echo '<label for="exampleusername" class="form-label">Username</label>';
                        echo '<input type="text" name="username" class="form-control" id="exampleusername">';
                        echo '</div>';
                    }
                ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
        
                <?php

                    // code for display create and login page
                    if( isset( $_POST['create'])){
                        echo '<button type="submit" name="register" class="btn btn-primary">Register</button>&nbsp &nbsp';
                        echo '<button type="submit" name="login-pg" class="btn btn-primary">Go to login!</button>';
                    }else if( isset( $_POST['login-pg'])){
                        echo '<button type="submit" name="login" class="btn btn-primary">Login</button> &nbsp &nbsp';
                        echo '<button type="submit" name="create" class="btn btn-primary">Create</button>';
                    }else{
                        echo '<button type="submit" name="login" class="btn btn-primary">Login</button> &nbsp &nbsp';
                        echo '<button type="submit" name="create" class="btn btn-primary">Create</button>';
                    }
                    // code to register and login
                    if(isset($_POST['register'])){
                        require_once "dbconfig/config.php";  // $sql_connection <- variable
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $pass = $_POST['pass'];
                        $sql = "INSERT INTO user (username,email,pass) VALUES (?,?,?)";
                        if($stmnt = mysqli_prepare($sql_connection,$sql)){
                            mysqli_stmt_bind_param($stmnt,"sss",$username,$email,$pass);
                            if(mysqli_stmt_execute($stmnt)){
                                // Record created successfully
                                // echo "succesfully inserted";
                                exit();
                            }else{
                                echo "Oops! Something went wrong.";
                            }
                        }
                        mysqli_stmt_close($stmnt);
                        mysqli_close($sql_connection);
                    }
                    // for login
                    if(isset($_POST['login'])){
                        header('location: home.php');
                        exit();
                    }

                ?>
            </form>
        </div>
    </div>


    <!-- Botstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>