<?php 
    session_start();
    include_once 'config.php';
    $outgoing=$_SESSION['unique_id'];
    $sql = mysqli_query($conn , "SELECT * FROM users WHERE NOT unique_id = {$outgoing} ");
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .= "No users avalible to chat with";
    }
    elseif(mysqli_num_rows($sql) > 0){
      include "data.php";
    }
    echo $output;

?>