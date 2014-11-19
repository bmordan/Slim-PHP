<?php 

  require '../vendor/autoload.php';
  
  use Illuminate\Database\Capsule\Manager as Capsule;
  $capsule = new Capsule;
  $capsule->addConnection(array(
    'driver'    => 'pgsql',
    'host'      => 'localhost',
    'database'  => 'php_cats',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => ''  
  ));
  $capsule->setAsGlobal();
  $capsule->bootEloquent();
  date_default_timezone_set('UTC');

  require '../models/cats.php';

?>

<?php

  $app = new \Slim\Slim();

  $view = $app->view();
  $view->setTemplatesDirectory('../views');

  $app->get('/', function() use ($app){
    
    $cats = new \Cat();
    $app->render('home.php', array( 'cats' => $cats->all() ));

  });

  $app->post('/add/', function($data) use ($app){

    print_r($data);

  });

  $app->get('/add/:data', function($data) use ($app){

    $cat = new \Cat();
    $cat->url = $data;
    $cat->save();
    $app->redirect('/public/');

  });

  $app->run();

?>