<?php

    // Redirect if someone try to access file
    // header('Location: index.php');

    // Start session 
    session_start();

    // Add Facebook Library
    require_once "lib/Facebook/autoload.php";

    $FB = new \Facebook\Facebook([
        'app_id' => '1161329700689969',                         // Facebook App ID
        'app_secret' => 'b2ab8339d351b74b45bb4c61e45b8585',     // Facebook App Secret key
        'default_graph_version' => 'v3.1'
    ]);

    $helper = $FB->getRedirectLoginHelper();

?>
