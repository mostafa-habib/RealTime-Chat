<?php
     
     session_start();
     include_once "config.php";
     //bring date enter by user
     $fristName = mysqli_real_escape_string($conn ,$_POST['fristName']);
     $lastName = mysqli_real_escape_string($conn ,$_POST['lastName']);
     $email = mysqli_real_escape_string($conn ,$_POST['email']);
     $password = mysqli_real_escape_string($conn ,$_POST['password']);
      //check if any input field empty
     if(!empty($fristName) && !empty($lastName) && !empty($email) && !empty($password) ){
          //check if email invaid
          if(filter_var($email , FILTER_VALIDATE_EMAIL)){
               //check if email already exist in database
               $sql = mysqli_query($conn , "SELECT email FROM users WHERE email = '{$email}'");
               if(mysqli_num_rows($sql) > 0){ //if found
                    echo "$email - already found in database";
               }
               else{//check if user upload a photo

                    if(isset($_FILES['image'])){//if file is uploaded
                         $img_name = $_FILES['image']['name'];//getting user upload img name
                         $tmp_name = $_FILES['image']['tmp_name'];//this use for save or move file in our folder

                         //show extension of image
                         $img_explode = explode('.',$img_name);
                         $img_ext = end($img_explode);//get the extesnsion of image

                         $extension = ['png','jpeg','jpg'];
                         if(in_array($img_ext , $extension) === true)
                         {
                              $time = time();
                              $new_img_name = $time.$img_name;
                              if(move_uploaded_file($tmp_name,"image/".$new_img_name))
                              {
                                   $status = "Active now" ;
     
                                   $random_id = rand(time() , 10000000);
                                   $sql2 = mysqli_query($conn , "INSERT INTO users (unique_id, fristName, lastName, email, password, image, status) VALUES({$random_id},'{$fristName}' ,'{$lastName}','{$email}', '{$password}','{$new_img_name}','{$status}')");
                                   if($sql2){
                                        $sql3 = mysqli_query($conn , "SELECT * FROM users WHERE email = '{$email}'");
                                        if(mysqli_num_rows($sql3) > 0){
                                             $row = mysqli_fetch_assoc($sql3);
                                             $_SESSION['unique_id'] = $row['unique_id'];
                                             echo "success";
                                        }
                                   }
                                   else{
                                        echo "something went wrong";
                                   }
                              } 
                         }
                         else{
                              echo "please select valid image extension like png , jpeg , jpg";
                         }
                    }
                    else{
                         echo "please select an image";
                    }

               }
               

          }
          else{
               echo "$email - must be invalid email";
          }

     }
     else{
          echo "All input must be fild";
     }



?>