<?php require '../vendor/autoload.php';?>




<?php

  $app = new \Slim\Slim();
  $app->get('/', function(){
    echo "My Favourite Cats";
  });
  $app->run();

?>