<?php

    session_start();
    
    // if(!isset($_SESSION['accesToken']))
    // {
    //     header('Location: index.php');
    //     exit();
    // }

?>

<html>
<head>
</head>
<script>
    // function hello()
    // {
    //    
    // }
</script>
<body>
   
<center style='margin-top:100px;'>
 <h3>Your Albums</h3>
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
            // echo '<td><img onclick="alert('.$i['id'].')" src='.$i['photos']['0']['source'].' height="200" width="200"  ><br>';
            echo '<td><img onclick="" src='.$i['photos']['0']['source'].' height="200" width="200"  ><br>';
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