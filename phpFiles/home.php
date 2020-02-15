<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>GI Forum</title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-normal">GI Forum</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="#">Modules</a>
            <a class="p-2 text-dark" href="#">Activities</a>
            <a class="p-2 text-dark" href="#">Others</a>
            <a class="p-2 text-dark" href="#">News</a>
        </nav>
        <?php if (isset($_SESSION['userName'])) {
            echo '<form action="inc/logout.inc.php" method="post">
                    <button class="btn btn-outline-primary" type="submit" name="logout">Log Out</button>
                </form>';
        } else {
            echo '<a class="btn btn-outline-primary" name = "sign" href = "http://localhost:10080/Form/phpFiles/loginSingUp.php">Sing In</a>';
        }
        ?>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <?php if (isset($_SESSION['userName'])) {
            echo '<h1 class="display-4">You are logged in</h1>';
            echo '<p class="lead">Make something greate ! </p>';
        } else {
            echo '<h1 class="display-4">You are logged Out</h1>';
            echo '<p class="lead">Go SignIn to join our big familly ! </p>';
        }
        ?>
    </div>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.js"></script>
</body>

</html>