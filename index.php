<?php
 include ('inc/header.php');
 session_start();



function validate($email)
{
  if(isset($_SESSION[$email])) {
    return "<p class='text-danger'>". $_SESSION[$email]."</p>";
  }
}


?>


<div class="bg-image">
    <div class="c">
        <h1 class="font">Login</h1>
    </div>
    <div class="c2">
        <a class="gd" href="index.php">
            <h6 class="text-secondary">Home
        </a> / Sign in</h6>
    </div>
</div>
<div class="bd-image">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <div class="bg">
                    <div class="centered">
                        <h3 class="text-light text-center">Don't have an account</h3>
                    </div>
                    <div class="center">
                        <a href="register.php">
                            <button type="button" class="btn btn-outline-light btn-lg">Sign Up</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1"></div>
            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                <h3 class="mt-5">Welcome Back!<br> Please Sign in now</h3>
                <form class="mt-4" action="process.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email"
                            name="email"><?=validate('email_error');?>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter Password"
                            name="password"><?=validate('pass_error');?>
                    </div>
                    <div class="form-group form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-outline-primary btn-lg w-100">Log in</button>
                    <div class="float-right mt-5 ">
                        <a class="forget" href="forget.php">Forget Password?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include ('inc/footer.php');
session_unset(); 

// destroy the session 
session_destroy(); 
?>