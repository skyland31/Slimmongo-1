<?php
require_once '/lib/Slim/Slim/Slim.php';
require_once '/controllers/StudentController.php';

  Slim\Slim::registerAutoloader();
  $app = new Slim\Slim();

  function response($status, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status);
    $app->contentType('application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  $app->get('/student',['StudentController', 'student']);
  $app->get('/course',['StudentController', 'course']);


  $app->post('/search-std', function() use($app){
    StudentController::searchSTD($app->request()); //id-student
  });
  $app->post('/search-course', function() use($app){
    StudentController::searchCourse($app->request()); //id-subject
  });
   $app->post('/insert', function() use($app){
    StudentController::insert($app->request()); //$name , $age, $education , $address
  });


  // $app->get('/', ['TestController', 'index']);
  // $app->post('/insert', function() use($app){
  //   TestController::insert($app->request());
  // });
  // $app->get('/search/:name', function ($name) {
  //   TestController::search($name);
  // });
  // $app->get('/getdata/:age', function ($age) {
  //   TestController::getdata($age);
  // });

  $app->run();
?>
