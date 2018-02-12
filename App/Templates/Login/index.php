<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login">
        <div class="title-login">
            <div class="container">
                <h1>Login Page</h1>
            </div>
        </div>
        <div class="box-login">
            <span class="help-login">Please login with your information.</span> 
            <form class="form login-form" action="<?=url('login.check')?>" method="post">
                <div class="form-field">
                    <label>Username : </label>
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="form-field">
                    <label>Password :</label>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="grid-5">&nbsp;</div>
                <div class="grid-5"><button class="btn btn-primary btn-login">Login</button></div>
                <div class="clear"></div>
            </form>
        </div>
    </div>
</body>
</html>
