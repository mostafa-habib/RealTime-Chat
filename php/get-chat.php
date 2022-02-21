<?php
       session_start();
       if(isset($_SESSION['unique_id'])){
           include_once "config.php";
           $outgoing=mysqli_real_escape_string($conn,$_POST['outgoing-id']);
           $incoming=mysqli_real_escape_string($conn,$_POST['incoming-id']);
           $output = "";
           $sql= " SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id WHERE (outgoing_msg_id = {$outgoing} AND incoming_msg_id = {$incoming}) OR (outgoing_msg_id = {$incoming} AND incoming_msg_id = {$outgoing}) ORDER BY msg_id";

            $query=mysqli_query($conn,$sql);
            if(mysqli_num_rows($query) >0){
                while($row  = mysqli_fetch_assoc($query)){
                    if($row['outgoing_msg_id'] === $outgoing ){
                        $output .= '<div class="chat outgoing">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>';
                    }
                    else{
                        $output .= '<div class="chat incoming">
                         <img src="php/image/'. $row['image'] .'" alt="">
                        <div class="details">
                            <p>'. $row['msg'] .'</p>
                        </div>
                    </div>';
                    }
                }
                echo $output;
            }
           
           
       } 
       else{
        header("location: login.php");
       }
?>
