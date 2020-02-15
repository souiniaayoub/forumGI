<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/loginStyle.css">
    <title>GI Forum</title>
</head>

<body>
    <h2 id="title">Your Road To Computer Science Golry !</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="inc/signup.inc.php" method="post" class="needs-validation" novalidate>
                <h1 id="sec">Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social spherFb"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social spherTw"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social spherLi"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="userName" class="form-control" id="validationCustom01" required />
                <input type="email" placeholder="Email" name="email" class="form-control" id="validationCustom02" required />
                <input type="password" placeholder="Password" name="password" class="form-control" id="validationCustom03" required />
                <button style="margin-top: 10px" type="submit" name="singUp">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="inc/login.inc.php" method="post" class="needs-validation" novalidate>
                <h1 id="sec">Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social spherFb"><i class="fab fa-facebook-f "></i></a>
                    <a href="#" class="social spherTw"><i class="fab fa-twitter "></i></a>
                    <a href="#" class="social spherLi"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="text" placeholder="UserName" name="userName" class="form-control" id="validationCustom04" required />
                <input type="password" placeholder="Password" name="password" class="form-control" id="validationCustom05" required />
                <a href="#">Forgot your password?</a>
                <button type="submit" name="singIn">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn" type="submit" name="singIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.js"></script>
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add('right-panel-active');
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active');
    });
</script>

</html>