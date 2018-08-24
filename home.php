<?php

    session_start();
    
    if(!isset($_SESSION['accesToken']))
    {
        header('Location: index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Memorise</title>
        <link rel="icon" href="images/icon.png" type="image" sizes="16x16">
        <link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script type="text/javascript" src="js/main.js" ></script>
    </head>

    <body onload='onload()' class="home" >
        <div id="album_list">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <ul class="navbar-nav " >
                <li class="nav-item"> 
                    <img src="<?php echo $_SESSION['userData']['picture']['url'];?>" class="ico" >  
                </li>
                <li class="nav-item">
                    <h5 class="head" > Hi, <?php echo $_SESSION['userData']['name'] ;?> <br>Your Memories...!</h5> 
                </li>
                <li class="nav-item">
                    <button class="btn" >Download All</button>
                </li>
                <li class="nav-item">
                    <button class="btn" >Download Selected</button>
                </li>
                <li class="nav-item">
                    <button class="btn" >Move all to Google Drive</button>
                </li>
                <li class="nav-item">
                    <button class="btn" >Move selected to Google Drive</button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-danger" >Logout</button>
                </li>
            </ul>
        </nav>
            <center style='padding-top:50px;'>
                
                    <table cellpadding="10px" >
                        <?php
                            $album_index=0;
                            $c=0;

                            foreach($_SESSION['userData']['albums'] as $i)
                            {
                                if($c%3==0)
                                {
                                    echo '<tr>';
                                }
                                echo '<td  class="box" ><img onclick="albumClick('.$album_index.')" src='.$i['photos']['0']['source'].' class="thumb" ><br>';
                                echo '<label>'.$i['name'].'</label><label>('.sizeof($i['photos']).')</label></td>';
                                if($c%3==2)
                                {
                                    echo '</tr>';
                                }
                                $c++;
                                $album_index++;
                            }
                                    
                        ?>
                        </table>
                </center>    
            </div> 

            <div id="slide_show">

                <button onclick="window.location.reload()" id="btnBack" >Back</button>
                <button onclick="changeImg(-1)" id="btnPrev" >Prev</button>
                <button onclick="changeImg(+1)" id="btnNext" >Next</button>
                <img id="slide" class="slide">
                
            </div>   
        </body>
</html>

