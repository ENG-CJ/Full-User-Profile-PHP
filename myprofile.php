<?php  
include './config/conn.php';
session_start();

    if (!isset($_SESSION['id']))
      {
        header("location: ./login.php");
        die();
      }

      $id=$_SESSION['id'];
$sql= "SELECT *FROM users where id='$id';";
$result = $conn->query($sql);
$data=array();
if (mysqli_num_rows($result)>0){
    $row=$result->fetch_assoc();
    $data=array("name"=>$row['username'],"email"=>$row['Email'],"image"=>$row['image']);
}

  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .content{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form_container content">
        <div class="title">
            <h2>My Profile</h2>
        </div>
       <div class="form-group">
            <div class="image">
                <?php if(count($data)>0) if($data['image']=="NoProfile"):?>
                  
                <img src="./uploads/default.png" width="190px" height="190px" alt="user">
                <?php endif;?>
                <?php if(count($data)>0)  if($data['image']!="NoProfile"):?>
                  
                <img src="./uploads/<?php if(count($data)>0)  echo $data['image'] ?>" width="190px" height="190px" alt="user">
                <?php endif;?>
            </div>
       </div>
       <div class="form-group">
           <h3><?php if(count($data)>0)  echo $data['name']; else echo "No Data"?></h3>
       </div>
       <div class="form-group">
        <button type="button" id="signup"><a href="./edit.php?id=<?php echo $_SESSION['id']?>" style="color: white; text-decoration:none;">Edit</a></button>
        <button type="button" id="signup"><a href="./api/logout.php" style="color: white; text-decoration:none;">Logout</a></button>
       <form action="./api/signup_api.php" method="post">
       <button type="submit" name="delete" id="signup">Del</button>
       <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']?>">
       </form>
       </div>
    </div>

    <script src="jquery-3.6.0.min.js"></script>
    <script src="login.js"></script>
</body>
</html>