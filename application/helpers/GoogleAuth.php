<?php 

  include_once APPPATH . "libraries/vendor/autoload.php";

    $google_client = new Google_Client();
 $google_client->setClientId('118050298198-oqmhk6bklh5idpfe6or0gq48ealghic9.apps.googleusercontent.com');
 $google_client->setClientSecret('HAReSiDTYzK9YSuCAOjvRMcb'); //Define your Client Secret Key
    $google_client->setRedirectUri('http://shubh.neplar.in/login'); //Define your Redirect Uri

 


?>