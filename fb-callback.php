<?php

    require_once "config.php";

    try{
        $accestoken = $helper->getAccessToken();
    }
    catch(\Facebook\Exception\FacebookResponceException $e){
        echo "Responce Exception : ".$e->getMessage();
        exit();
    }
    catch(\Facebook\Exception\FacebookSDKException $e){
        echo "SDK Exception : ".$e->getMessage();
        exit();
    }

    if(!$accestoken){
        header('Location : login.php');
        exit();
    }

    $oAuth2Client = $FB->getOAuth2Client();
    if(!$accestoken->isLongLived())
        $accestoken = $oAuth2Client->getLongLivedAccessToken($accestoken);

    // $responce = $FB->get('me?fields=id,name,email,picture.type(large)',$accestoken);
    $responce = $FB->get('me?fields=name,email,picture.type(large),albums{id,name,photos{source}}',$accestoken);
    $userData = $responce->getGraphNode()->asArray();
    // echo "<pre>";
    // $data=json_encode($userData);
    // echo $data;
    // var_dump($data);

    $_SESSION['userData'] = $userData;
    $_SESSION['accesToken'] = (string)$accestoken;

    header('Location: home.php');
    exit();

?>