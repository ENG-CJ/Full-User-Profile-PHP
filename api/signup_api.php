
<?php
session_start();
include '../config/conn.php';
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if (empty($username) || empty($email) || empty($pass))
    header("location: ./signup.php?error=true&message=All Fields Are required");
  else
   {
    $query = "INSERT INTO users(`username`,`Email`,`Password`,`image`)
    VALUES ('$username','$email','$pass','NoProfile')";
    $result =$conn->query($query);
    if($result){
      header("location: ../login.php");
    }else
    header("location: ../signup.php?success=false&message=Something Went Wrong");

   }
}

if(isset($_POST['login'])){
 
  $email = $_POST['email'];
  $pass = $_POST['password'];
  if (empty($email) || empty($pass))
    header("location: ../login.php?error=true&message=All Fields Are required");
  else
   {
    $query = "SELECT *from users where Email='$email' AND Password='$pass';";
    $result =$conn->query($query);
   
    if(mysqli_num_rows($result) > 0){
     {
      $row = $result->fetch_assoc();
      $_SESSION['id']=$row['id'];
      $_SESSION['email']=$row['email'];
      header("location: ../myprofile.php?");
     }
    }else
    header("location: ../login.php?success=false");

   }
}

if (isset($_POST['edit'])){
  $id = $_POST['id'];
  $filename = $_FILES['image']['name'];
  $type = $_FILES['image']['type'];
  $size = $_FILES['image']['size'];
  $error = $_FILES['image']['error'];
  $temp_name = $_FILES['image']['tmp_name'];
  $sql = "SELECT *from users WHERE id='$id';";
  $result = $conn->query($sql);
  $row= $result->fetch_assoc();
 
  if(empty($filename) && $row['image']=="NoProfile")
     header("location: ../edit.php?error=all Fileds Are Required");
 
  else
    {
     if(empty($filename) && $row['image'] != "NoProfile")
        header("location: ../myprofile.php");
      else
      {
      $extension= explode(".",$filename);
      $actualExtension=strtolower(end($extension));
      $alowed=array("jpg","png","gif");

      if (in_array($actualExtension,$alowed)){
          if ($size<=5242880){
            if ($error==0){
                $fileDes="../uploads/profile".$id.".".$actualExtension."";
                print_r($fileDes);
                if(file_exists($fileDes))
                 {
                   if(!unlink($fileDes))  
                     echo "Error Occured";
                    else
                     {
                         $user_image_name="profile".$id.".".$actualExtension."";
                      move_uploaded_file($temp_name,$fileDes);
                      $sql = "UPDATE users SET image='$user_image_name' WHERE id='$id';";
                      $result=$conn->query($sql);
                      if($result){
                        header("location: ../edit.php?success=Updated");
                        sleep(2);
                        header("location: ../myprofile.php");
                                  
                    }
                     }
                 }
                else
                 {
               
                $user_image_name="profile".$id.".".$actualExtension."";
                move_uploaded_file($temp_name,$fileDes);
                $sql = "UPDATE users SET image='$user_image_name' WHERE id='$id';";
                $result=$conn->query($sql);
                if($result){
                  header("location: ../edit.php?success=Updated");
                  sleep(2);
                  header("location: ../myprofile.php");
                }    
              }
            }
            else
            header("location: ../edit.php?error=Something Went Wrong");

          }
          else
          header("location: ../edit.php?error=File Must be less then 5MB");
      }
      else
      header("location: ../edit.php?error=This Extension is Not Allowed");
       
    }
    }
}

if(isset($_POST['delete'])){
  $id = $_POST['user_id'];
  $user_image="../uploads/profile".$id."*";
  $filename = glob($user_image);
  $actualFileName = $filename[0];

  if(file_exists($actualFileName)){
      if(!unlink($actualFileName))
      header("location: ../myprofile.php?error=Something Went Wrong");
    else
    {
      $query = "UPDATE users SET image='NoProfile' WHERE id='$id';";
      $result = $conn->query($query);
      if($result){
        sleep(2);
        echo "<script>alert('Profile deleted succcessfully')</script>";
        header("location: ../myprofile.php");
      }
    }
  }
  else
    header("location: ../myprofile.php?error=this file is not exist in the root folder");

}

?>