<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="css/main.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script></head>

<body>
    <div class="row h-100">
        <div class="col-sm-8 d-none d-sm-block p-0">
            <img src="assets/login.svg" class="w-100">
        </div>
        <div class="col-sm-4 p-0 bg-custom ">
            <form class="main-form p-0 w-75" id="login-form" action="/userProfile.html">
                <div class="welcome-back">WELCOME BACK!</div>
                <div class="form-group mb-3">
                    <label for="email" class="email-label">E-mail</label>
                    <input type="text" class="form-control" id="email" placeholder="e-mail" name="email">
                    <div class="error" id="check-email">* Please enter email.</div> 
                </div>
                <div class="form-group mb-3">
                    <label for="show_hide_password" class="password-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input class="form-control" id="password" placeholder="password" type="password" name="password">
                      <div class="input-group-addon">
                        <a href="" ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    <div class="error" id="check-pass">* Please enter a valid password.</div> 
                </div>
                <button type="submit" id="submitbtn" class="btn btn-custom btn-lg btn-block mt-3 mb-3" name="signIn-button">Login Now</button>
                <div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
					<div id="result"></div>
				</div>
                <div class="signUp-signIn">
                    New Here? <a href="register.html" class="signUp">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>

</html>
