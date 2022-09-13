<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form_container">
        <div class="title">
            <h2>Login</h2>
        </div>
        <form action="./api/signup_api.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <div class="form-control">
                    <label for="">Email</label>
                    <input type="text" id="email" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <label for="">Password</label>
                    <input type="text" id="password" name="password">
                </div>
            </div>
            <div class="form-group">
                <div class="form-control">
                    <button type="submit" name="login" id="login">Login</button>
                </div>
            </div>
            <div class="form-group">
                <div class="form-control spans hide">
                    <span id="message">Invalid Input</span>
                    
                </div>
            </div>
        </form>
    </div>

    <script src="jquery-3.6.0.min.js"></script>
    <script src="login.js"></script>
</body>
</html>