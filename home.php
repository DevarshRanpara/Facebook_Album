<?php

    session_start();
    
    // if(!isset($_SESSION['accesToken']))
    // {
    //     header('Location: index.php');
    //     exit();
    // }

    function redirect($id)
    {
        $_SESSION['albumID']=$id;
        header('Location: slideshow.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<form mehod="POST">
    <div class='container' style='margin-top: 100px'>
        <div class='row justify-content-center'>
            <div class='col-md-3'>
                <img src="<?php echo $_SESSION['userData']['picture']['url'] ?>">
            </div>
            <div class='col-md-9'>
                <table class="table table-hover table-bordered">
                    <tbody> 
                        <tr>
                            <td>Name</td>
                            <td><?php echo $_SESSION['userData']['name'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $_SESSION['userData']['email'] ?></td>
                        </tr>
                        <tr>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <!-- <td> <img src="<?php echo $_SESSION['userData']['albums']['0']['photos']['0']['source'] ?>"> </td> -->

                        </tr>
                    </tbody>
                </table>
                <?php
                
                    foreach($_SESSION['userData']['albums'] as $i)
                    {
                        // echo '<img src='.$_SESSION['userData']['albums']['$i']['photos']['0']['source'].'><br>';
                        echo '<img onclick="alert('.$i['id'].')" src='.$i['photos']['0']['source'].'><br>';
                        echo '<img onclick="" src='.$i['photos']['0']['source'].'><br>';
                        echo '<label>'.$i['name'].'</label><br>';
                    }
                
                ?>
            </div>
            <button class="btn" id="logout" name="logout">Logout</button>
        </div>
    </div>
</form>
</body>
</html>