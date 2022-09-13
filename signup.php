<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
    <div class="form_container">
        <div class="title">
            <h2>Signup</h2>
        </div>
        <form  method="POST" action="./api/signup_api.php" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-control">
                    <label for="">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email" required >
                </div>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="">Password</label>
                    <input type="text" id="password" name="password" required>
                </div>
            </div>
            
            <div class="form-group">
                <div class="form-control">
                    <button type="submit" name="submit" id="signup">Signup</button>
                </div>
            </div>
            <div class="form-group">
                <div class="form-control spans hide">
                    <span id="message">Invalid Input</span>
                    
                </div>
            </div>
        </form>
    </div>

    <script src="./js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- <script src="./js/signup.js"></script> -->
</body>
</html>