<?php
    if(isset($_REQUEST['submit'])){
        $to = $_REQUEST['to'];
        $subject = $_REQUEST['subject'];
        $body = $_REQUEST['body'];
        $from = "#";
        $headers = "From: $from";

        if($to && $subject &&  $body){
            mail($to,$subject,$body,$headers);
            echo "Your email has been sent!";
            header('admin.appoint.com');
        }else{
            echo "Please fill up all fields!";
        }
    }

?>