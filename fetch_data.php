<?php

    function redirect()
    {
        header('Location: index.php');
    }

    session_start();
    echo $_SESSION['josnData'];

?>