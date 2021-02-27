<?php 

include('config/db.php'); 

include('inc/header.php'); 

$id = $_GET['id'];

$query = "select * from appointment where id=$id";

$result = mysqli_query($conn, $query);

$appoint = mysqli_fetch_assoc($result);

function validate($subject)
{
  if(isset($_SESSION[$subject])) {
    return "<p class='text-danger'>". $_SESSION[$subject]."</p>";
  }
}


?>
<div class="jumbotron">
    <div class="container">
        <h1>Admin</h1>
    </div>
</div>

<div class="container">

    <form action="process.email.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value='<?php echo $appoint["id"]; ?>'>
        <div class="form-group">
            <label for="name">Email To:</label>
            <input type="text" class="form-control" name="to" value='<?=$appoint["email"]; ?>'>

        </div>
        <div class="form-group">
            <label for="name">Subject:</label>
            <input type="text" class="form-control" name="subject" required />
        </div>
        <div class="form-group">
            <label for="body">Message: </label>
            <textarea rows="5" class="form-control" name="body"> </textarea>
        </div>


        <input type="submit" name="submit" class="btn btn-primary float-right" value="Send" />
    </form>

</div>




<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>