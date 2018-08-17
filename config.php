<?php

    session_start();

    require_once "lib/Facebook/autoload.php";

    $FB = new \Facebook\Facebook([
        'app_id' => '1161329700689969',
        'app_secret' => 'b2ab8339d351b74b45bb4c61e45b8585',
        'default_graph_version' => 'v3.1'
    ]);

    $helper = $FB->getRedirectLoginHelper();

?>
