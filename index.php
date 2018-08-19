<?php
    require_once "config.php";

    $redirectURL = "http://localhost/fb/fb-callback.php";
    $permissions = ['email'];
    $loginURL = $helper->getLoginUrl($redirectURL,$permissions);

    // if(isset($_SESSION['accesToken']))
    // {
    //     header('Location: home.php');
    //     exit();
    // }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Memorise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="wrapper">
        <h1>Memorise</h1>
        <p>The place where you live back your memoris,<br> Get your facebook photos and have fun.</p>
        <div class="btn">
            <button onclick="window.location.href='<?php echo $loginURL?>'" type="button">Login With Facebook</button>
        </div>
    </div>
</body>
</html>