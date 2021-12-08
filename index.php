<?php

include 'router/Request.php';
include_once 'router/Router.php';
include 'private/config.php';
include 'controller/database.php';
$router = new Router(new Request);

//============================================================//
//                         Public Routes                      //
//============================================================//

$router->get('/', function () {
  include 'view/countdowns.php';
});

$sql = "SELECT * FROM tu_countdowns";
$results = $pdo->query($sql);

foreach ($results as $row) {
  $router->get('/' . $row['slug'], function ($request) {
    include 'view/countdown.php';
  });
}

//============================================================//
//                         Admin Routes                       //
//============================================================//

$router->get('/login', function () {
  include 'server/login.php';
});

$router->get('/logout', function () {
  include 'server/logout.php';
});


$router->get('/dashboard', function () {
  include 'server/dashboard.php';
});

$router->get('/password', function () {
  include 'server/password.php';
});

$router->get('/add', function () {
  include 'server/add.php';
});

$router->get('/edit', function () {
  include 'server/edit.php';
});

$sql = "SELECT * FROM tu_countdowns";
$results = $pdo->query($sql);

foreach ($results as $row) {
  $router->get('/edit/' . $row['slug'], function ($request) {
    include 'server/editor.php';
  });
}
