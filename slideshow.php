<?php

    session_start();

    $c=0;

    echo '<table>';
    foreach($_SESSION['userData']['albums']['5']['photos'] as $i )
    {
        if($c%4==0){
            echo "<tr>";
        }
        echo "<td><img src=".$i['source']." height='200' width='200' ></td>";
        if($c%4==3){
            echo "</tr>";
        }
        $c++;
    }
    echo '</table>';

?>