<?php 

include('config/db.php'); 

include('inc/header.php'); 

$id = $_GET['id'];

$query = "select * from appointment where id=$id";

$result = mysqli_query($conn, $query);

$appoint = mysqli_fetch_assoc($result);

?>
<div class="jumbotron">
    <div class="container">
        <h1>Admin</h1>
    </div>
</div>

<div class="container">

    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value='<?php echo $appoint["id"]; ?>'>
        <div class="form-group">
            <label for="name">First Name</label>
            <input type="text" class="form-control" id="name" name="name" value='<?=$appoint["first_name"]; ?>'>
        </div>  
        <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value='<?=$appoint["last_name"]; ?>'>            
        </div> 
        <div class="form-group">
            <label for="name">Email</label>
            <input type="text" class="form-control" id="email" name="email" value='<?=$appoint["email"]; ?>'>            
        </div>  
        <div class="form-group">
            <label for="name">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" value='<?=$appoint["phone_number"]; ?>'>            
        </div>   
        <div class="form-group">
            <label for="body">Purpose</label>
            <textarea rows="5" class="form-control" id="purpose" name="purpose"> <?=$appoint["purpose"]; ?></textarea>               
        </div>
        
        <a href="mail.php?id=<?php echo $appoint["id"]; ?>" class="btn btn-primary">Send Email</a>
        <!-- <input type="submit" class="btn btn-primary" value="submit" /> -->
    </form>

</div>

   
<?php include ('inc/footer.php'); ?>

<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>