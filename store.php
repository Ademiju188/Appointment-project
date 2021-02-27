<?php
include ('config/db.php');
// include ('config/table.php');

if(empty(trim($_POST['first_name']))){
    $_SESSION['first_name_error'] = "First name is Required";
}elseif(strlen($_POST['first_name']) < 3){
    $_SESSION['first_name_error'] = "Must be greater than 3 characters";
}else{
    $first_name =   $_POST['first_name'];
    $_SESSION['first_name'] =   $_POST['first_name'];
}

if(empty(trim($_POST['last_name']))){
    $_SESSION['last_name_error'] = "Last name is Required";
}elseif(strlen($_POST['last_name']) < 3){
    $_SESSION['last_name_error'] = "Must be greater than 3 characters";
}else{
    $last_name =   $_POST['last_name'];
    $_SESSION['last_name'] =   $_POST['last_name'];
}

if(empty(trim($_POST['phone_number']))){
    $_SESSION['phone_number_error'] =   "Phone Number is Required!";
}elseif(strlen($_POST['phone_number']) <=10) {
    $_SESSION['phone_number_error'] =   "Enter a valid Phone Number";
}else{
    $phone_number   =   $_POST['phone_number'];
    $_SESSION['phone_number']   =   $_POST['phone_number'];
}

if(empty(trim($_POST['email']))){
    $_SESSION['email_error'] =   "Email is Required!";
}
else{
    $email  =   $_POST['email'];
    $_SESSION['email']  =   $_POST['email'];
}

if(empty(trim($_POST['password']))){
    $_SESSION['password_error']    =   "Password is Required!";
}elseif(strlen($_POST['password']) < 8) {
    $_SESSION['password_error']     =   "Must be greater than 8 charaters!";
}else{
    $password   =   $_POST['password'];
    $_SESSION['password']   =   $_POST['password'];
}
if(empty(trim($_POST['repeat_password']))){
    $_SESSION['repeat_password_error']    =   "Password is Required!";
}
elseif($_POST['password']  !=  $_POST['repeat_password']){
    $_SESSION['repeat_password_error']  =   "Password not match";
}
else {
    $repeat_password                       =   $_POST['repeat_password'];
    $_SESSION['repeat_password']           =   $_POST['repeat_password'];

}





if(
    !empty($_SESSION['first_name_error']) || !empty($_SESSION['last_name_error']) || 
    !empty($_SESSION['phone_number_error']) || !empty($_SESSION['email_error']) || 
    !empty($_SESSION['password_error']) || !empty($_SESSION['repeat_password_error']) 
) 
{
    return header('Location: register.php');

}

$check_email  =   mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' and password='$password'");
if(mysqli_num_rows($check_email) > 0){
    header('Location: register.php');
    $_SESSION['email_error']    =   "Email is already in use!";
}

else{
$sql = "INSERT INTO users (first_name, last_name, phone_number, email, password, repeat_password) VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$password', '$repeat_password')";



if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = true;
    header('Location: index.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
$conn->close();
session_unset(); 

// destroy the session 
session_destroy(); 
?>