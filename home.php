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
        echo "hello";
    }

?>

<html>
<head>
</head>
<body>
<center style='margin-top:100px;' >
<table>

    <?php
        $c=0;
        $link='slideshow.php';

        foreach($_SESSION['userData']['albums'] as $i)
        {
            if($c%3==0)
            {
                echo '<tr>';
            }
            // echo '<img onclick="alert('.$i['id'].')" src='.$i['photos']['0']['source'].' height="100" width="100"  >';
            echo '<td><img onclick="window.location.href='.$link.'" src='.$i['photos']['0']['source'].' height="200" width="200"><br>';
            echo '<label>'.$i['name'].'</label></td>';
            if($c%3==2)
            {
                echo '</tr>';
            }
            $c++;
        }
                
    ?>
</table>
</center>        
</body>
</html>