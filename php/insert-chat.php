<?php
       session_start();
       if(isset($_SESSION['unique_id'])){
           include_once "config.php";
           $outgoing=mysqli_real_escape_string($conn,$_POST['outgoing-id']);
           $incoming=mysqli_real_escape_string($conn,$_POST['incoming-id']);
           $message=mysqli_real_escape_string($conn,$_POST['message']);
           if(!empty($message)){
               $sql=mysqli_query($conn,"INSERT INTO messages (incoming_msg_id,outgoing_msg_id,msg)
                                VALUES ({$incoming},{$outgoing}, '{$message}')") or die();
                                
           }
       } 
       else{
        header("../login.php");
       }
?>
