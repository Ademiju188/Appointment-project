<?php include ('inc/header.php');
session_start();
function validate($first_name)
{
  if(isset($_SESSION[$first_name])) {
    return "<p class='text-danger'>". $_SESSION[$first_name]."</p>";
  }
}

function old($first_name)
{
  if(isset($_SESSION[$first_name])) {
    return $_SESSION[$first_name];
  }
  return;
}

?>
<style>


</style>
<div class="bg-image">
    <div class="c">
        <h1 class="font">Register</h1>
    </div>
    <div class="c2">
        <a class="gd" href="index.php">
            <h6 class="text-secondary">Home
        </a> / Sign up</h6>
    </div>
</div>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card p-5">
            <h1>Sign Up</h1>
            <p>Please fill this form to create an account</p>
            <form action="store.php" method="POST">
                <div class="form-group">
                    <label for="name">First Name</label>
                    <input type="name" class="form-control" id="name" placeholder="First Name" name="first_name"
                        value="<?=old('first_name');?>"> <?=validate('first_name_error');?>
                </div>
                <div class="form-group">
                    <label for="name">Last Name</label>
                    <input type="name" class="form-control" id="name" placeholder="Last Name" name="last_name"
                        value="<?=old('last_name');?>">
                    <?=validate('last_name_error');?>
                </div>
                <div class="form-group">
                    <label for="number">Phone Number</label>
                    <input type="number" class="form-control" id="number" placeholder="Phone Number" name="phone_number"
                        value="<?=old('phone_number');?>">
                    <?=validate('phone_number_error');?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email"
                        value="<?=old('email');?>">
                    <?=validate('email_error');?>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"
                        value="<?=old('password');?>">
                    <?=validate('password_error');?>
                </div>
                <div class="form-group">
                    <label for="pwd">Repeat Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Repeat password"
                        name="repeat_password" value="<?=old('repeat_password');?>">
                    <?=validate('repeat_password_error');?>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <p class="mt-5">Already have an account? <a class="non" href="index.php">Login</a></p>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>
<?php include ('inc/footer.php');
session_unset(); 

// destroy the session 
session_destroy(); 
?>