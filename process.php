<?php

include ('config/db.php');

if($_POST){
$_SESSION['email']   =  $_POST['email'];
$_SESSION['password']   =  $_POST['password'];
$_SESSION['first_name']   =  $_POST['first_name'];

if ($_SESSION['email'] && $_SESSION['password']) {
   

   
   $query=mysqli_query($conn, "SELECT * FROM users WHERE email='".$_SESSION['email']."'");
   $numrows=mysqli_num_rows($query);

   if ($numrows !=0){

      while ($row=mysqli_fetch_assoc($query)){
         $dbemail=$row['email'];
         $dbpassword=$row['password'];
         // $dbfirst_name=$row['first_name'];
      }
         if($_SESSION['email']==$dbemail) {
            if($_SESSION['password']==$dbpassword) {
               header('Location: welcome.php');
             

            }else{
               header('Location:index.php');
               $_SESSION['pass_error']    =   "Password does not exist!";
            }
         }else{
            header('Location:index.php');
            $_SESSION['email_error']    =   "Email does not exist!";
         }
      
   }else{
      header('Location:index.php');
      $_SESSION['email_error']    =   "Email or Password not exist!";
   }
}
else{
   header('Location:index.php');
   $_SESSION['email_error']    =   "Email is Required!";
   $_SESSION['pass_error']    =   "Password is Required!";
}
}else{
   echo "Not acceptable";
}

  
?>