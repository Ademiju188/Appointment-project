<?php
include ('config/db.php');
// if(empty(trim($_POST['first_name']))){
//     $_SESSION['first_name_error'] = "First name is Required";
// }elseif(strlen($_POST['first_name']) < 3){
//     $_SESSION['first_name_error'] = "Must be greater than 3 characters";
// }else{
//     $first_name =   $_POST['first_name'];
//     $_SESSION['first_name'] =   $_POST['first_name'];
// }

// if(empty(trim($_POST['last_name']))){
//     $_SESSION['last_name_error'] = "Last name is Required";
// }elseif(strlen($_POST['last_name']) < 3){
//     $_SESSION['last_name_error'] = "Must be greater than 3 characters";
// }else{
//     $last_name =   $_POST['last_name'];
//     $_SESSION['last_name'] =   $_POST['last_name'];
// }



// if(empty(trim($_POST['phone_number']))){
//     $_SESSION['phone_number_error'] =   "Phone Number is Required!";
// }elseif(strlen($_POST['phone_number']) < 8) {
//     $_SESSION['phone_number_error'] =   "Enter a valid Phone Number";
// }else{
//     $phone_number   =   $_POST['phone_number'];
//     $_SESSION['phone_number']   =   $_POST['phone_number'];
// }
// if(empty(trim($_POST['email']))){
//     $_SESSION['email_error'] =   "Email is Required!";
// }
// else{
//     $email  =   $_POST['email'];
//     $_SESSION['email']  =   $_POST['email'];
// }
// $date    =   $_POST['date'];
// if(empty(trim($_POST['purpose']))){
//     $_SESSION['purpose_error'] =   "Purpose is Required!";
// }
// else{
//     $purpose  =   $_POST['purpose'];
//     $_SESSION['purpose']  =   $_POST['purpose'];
// }

// if(
//     !empty($_SESSION['first_name_error']) || !empty($_SESSION['last_name_error']) || 
//     !empty($_SESSION['phone_number_error']) || !empty($_SESSION['email_error']) || 
//    !empty($_SESSION['purpose_error']) 
// ) 
// {
//     return header('Location: appoint.php');

// }

$first_name     =       $_POST['first_name'];
$last_name      =       $_POST['last_name'];
$phone_number   =       $_POST['phone_number'];
$email          =       $_POST['email'];
$date           =       $_POST['date'];
$purpose        =       $_POST['purpose'];

$sql = "INSERT INTO appointment (first_name, last_name, phone_number, email, date, purpose) VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$date', '$purpose')";



if (mysqli_query($conn, $sql)) {
    $_SESSION['success'] = true;
    header('Location: welcome.php');
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}