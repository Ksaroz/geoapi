<?php

//start the session

session_start();

//include autoload file from vendor folder

require './vendor/autoload.php';

$fb = new Facebook\Facebook([
    'app_id' => '843581752746768',
    'app_secret' => '0b3d54881c0f8bfef03c52f1ef4bf80a',
    'default_graph_version' => 'v5.0'
]);

$helper = $fb->getRedirectLoginHelper();
$login_url = $helper->getLoginUrl("http://localhost/geoapi/");


try {
    $accessToken = $helper->getAccessToken();

    if(isset($accessToken)) {
        $_SESSION['access_token'] = (string)$accessToken; //convert to string

        //if session is set we can redirect a user to any page
        header('Location:index.php');
    }
}
catch(Exception $e){
    echo $e->getTraceAsString();
}

//now we will get users firstName, email, lastName

if(isset($_SESSION['access_token'])) {

    try {
        $fb->setDefaultAccessToken($_SESSION['access_token']);
        $res = $fb->get('./me?locale=en_US&fields=name,email');
        $user = $res->getGraphUser();
        echo 'Hello, ',$user->getField('name');
    }
    catch(Exception $e) {
        echo $e->getTraceAsString();
    }
}

?>