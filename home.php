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
        <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
        <link rel="icon" href="images/icon.png" type="image" sizes="16x16">
    </head>

    <body onload='onload()' class="home" >
        <div id="album_list">
            <center style='margin-top:100px;'>
                <h3> Hi, <?php echo $_SESSION['userData']['name'] ;?> <br>Your Memories...!</h3>
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
                                // echo '<label>'.$i['name'].'</label></td>';
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
                <img id="slide" class="slide">
            </div>   
        </body>

        <script>

            var jsonData=JSON.parse('<?php echo $_SESSION['josnData']; ?>');
            var albumIndex;
            var images = [];
            var noOfImages;

            function onload()
            {
                document.getElementById('album_list').style.display='block';
                document.getElementById('slide_show').style.display='none';
            }
            function albumClick(x)
            {
                albumIndex=x;
                document.getElementById('album_list').style.display='none';
                document.getElementById('slide_show').style.display='block';

                noOfImages=jsonData.albums[albumIndex].photos.length;
                var i;

                for(i=0;i<noOfImages;i++)
                {
                    images[i]=jsonData.albums[albumIndex].photos[i].source;
                }
                
                console.log("Album Index : "+albumIndex);
                console.log("Number of images : "+noOfImages);
                
                console.log(images[1]);
                document.getElementById('slide').src=images[2];

            }

        </script>

</html>