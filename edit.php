<?php  
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

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
       <form action="./api/signup_api.php" method="post" enctype="multipart/form-data">
       <div class="form-group">
            <div class="image">
               <input type="file" name="image"   id="image">
            </div>
       </div>
       
       <div class="form-group">
        <button type="submit" id="signup" name="edit">Edit</button>
      
       </div>

       <div class="form-group">
                <div class="form-control  ">
                    <span id="message" style="color: red;"><?php if(isset($_GET['error']))echo $_GET['error']?></span>
                    
                </div>
            </div>
       <input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">
       </form>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="login.js"></script>

    <script>
        function SetTost(message, background_Color) {
    Toastify({
        text: message, duration: 3000,
        // destination: "https://github.com/apvarun/toastify-js",
        newWindow: true,
        close: true,
        gravity: "right", // `top` or `bottom`
        position: "right", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: background_Color,
            fontFamily: "poppins",
            borderRadius: "4px"
        },
        onClick: function () { } // Callback after click
    }).showToast();
}

errorColor = "#C73E1D";
successColor = "#42ba96";
if (isset($_GET['error']))
        SetTost($_GET['error'],errorColor);

    </script>
</body>
</html>