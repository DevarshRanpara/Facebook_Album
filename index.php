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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Album Slide Show</title>
</head>
<body>
    <button onclick="window.location.href='<?php echo $loginURL?>'">Login With facebook</button>
</body>
</html>