<?php

include('config/db.php'); 

include('inc/header.php'); 

$query = "SELECT * FROM appointment";

$result = mysqli_query($conn, $query);

?>
<div class="jumbotron">
    <div class="container">
        <h1>Admin</h1>
    </div>
</div>

<div class="container mt-5">
    
    <?php



        echo' <table class="table">';
        echo' <thead class="thead-dark">';
        echo' <tr>';   
        echo' <th>' . 'ID' . '</th>';
        echo' <th>' . 'First name' . '</th>';
        echo' <th>' . 'Last name' . '</th>';
        echo' <th>' . 'Email' . '</th>';
        echo' <th>' . 'Phone Number' . '</th>';
        echo' <th>' . 'Date' . '</th>';
        echo' <th>' . 'Purpose' . '</th>';
        echo' <th>' . 'Show details' . '</th>';
        echo '</tr>';
        echo '</thead>';
            while($row=mysqli_fetch_assoc($result)){
                    $id             =   $row['id'];
                    $first_name     =   $row['first_name'];
                    $last_name      =   $row['last_name'];
                    $email          =   $row['email'];
                    $phone_number   =   $row['phone_number'];
                    $date           =   $row['date'];
                    $purpose         =   substr($row['purpose'], 0, 20);
                    

                    echo  "<tbody><tr><td>$id</td><td>$first_name</td><td>$last_name</td><td>$email</td><td>$phone_number</td><td>$date</td><td>$purpose</td>
                    <td><a href=show.php?id=$id>Show Details</a></td></tr></tbody>";
                }
                echo "</table>";

    ?>



</div>
