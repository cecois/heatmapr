<?php

/**
 * Step 1: Require the Slim PHP 5 Framework
 *
 * If using the default file layout, the `Slim/` directory
 * will already be on your include path. If you move the `Slim/`
 * directory elsewhere, ensure that it is added to your include path
 * or update this file path as needed.
 */
require 'Slim/Slim.php';

/**
 * Step 2: Instantiate the Slim application
 *
 * Here we instantiate the Slim application with its default settings.
 * However, we could also pass a key-value array of settings.
 * Refer to the online documentation for available settings.
 */
$app = new Slim();

//$app->response()->headers();
//$app->response()->header('Content-Type', 'application/xml');
//print_r($app->response()->headers());

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, and `Slim::delete`
 * is an anonymous function. If you are using PHP < 5.3, the
 * second argument should be any variable that returns `true` for
 * `is_callable()`. An example GET route for PHP < 5.3 is:
 *
 * $app = new Slim();
 * $app->get('/hello/:name', 'myFunction');
 * function myFunction($name) { echo "Hello, $name"; }
 *
 * The routes below work with PHP >= 5.3.
 */

function debugMe(){
//header("Content-Type: application/xml");
//$app->response()->header('Content-Type', 'application/xml');
}

function setHTML(){
//header("Content-Type: application/xml");
/* $app->response()->header('Content-Type', 'application/xml'); */
}
 
require_once 'routes/describeapi.php';
require_once 'routes/dispatch.php';


$app->get('/api/:formin/:width/:themeout','initHeatMap');
 
$app->get('/hello/:name/:ptype', 'myFunction');

function myFunction($name,$ptype) {
echo "Hello, $name. You $ptype."; 
}
 
//GET route
//$app->get('/', 'defaultFunction');
$app->get('/', 'describeAPI');

//POST route
$app->post('/post', 'postFunction');

function postFunction(){
    echo 'This is a POST route';
}

//PUT route
$app->put('/put', 'putFunction');
function putFunction(){
    echo 'This is a POST route';
}

//DELETE route
$app->delete('/delete', 'deleteFunction');
function deleteFunction(){
    echo 'This is a DELETE route';
}

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This is responsible for executing
 * the Slim application using the settings and routes defined above.
 */
$app->run();