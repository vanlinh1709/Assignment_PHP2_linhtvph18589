<?php
  $url = !isset($_GET['url']) ? "/" : $_GET['url'];
  use Phroute\Phroute\RouteCollector;
  $router = new RouteCollector();
  //SIDE USER.
  $router->get('/', [App\Controllers\HomeController::class, 'index_Client']);
  $router->get('/shoeCollection', [App\Controllers\ProductController::class, 'listProduct_client']);
  $router->get('/detailProduct', [App\Controllers\ProductController::class, 'detailProduct']);
  // filter check đăng nhập
$router->filter('auth', function(){
  if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
      header('location: ' . BASE_URL . 'login');die;
  }
});
$router->get('login', [App\Controllers\AuthController::class, 'loginForm']);
$router->post('login', [App\Controllers\AuthController::class, 'postLogin']);

$router->any('logout', [App\Controllers\AuthController::class, 'logout']);
// tất cả các đường dẫn nằm trong này thì phải thỏa mãn điều kiện đã đăng nhập
$router->group(['before' => 'auth'], function($router){

  
//SIDE ADMIN
  //
  $router->get('/admin', [App\Controllers\HomeController::class, 'index']);

//
  $router->get('/list-user', [App\Controllers\HomeController::class, 'listUser']);
  $router->get('/add-new-user', [App\Controllers\HomeController::class, 'userAddForm']);
  $router->post('/add-new-user', [App\Controllers\HomeController::class, 'addNewUser']);
  $router->get('/edit-user', [App\Controllers\HomeController::class, 'userEditForm']);
  $router->get('/delete-user', [App\Controllers\HomeController::class, 'delUser']);
  $router->post('/edit-user', [App\Controllers\HomeController::class, 'saveEditUser']);
//
$router->get('/list-product', [App\Controllers\ProductController::class, 'listProduct']);
  $router->get('/add-new-product', [App\Controllers\ProductController::class, 'productAddForm']);
  $router->post('/add-new-product', [App\Controllers\ProductController::class, 'addNewProduct']);
  $router->get('/edit-product', [App\Controllers\ProductController::class, 'productEditForm']);
  $router->get('/delete-product', [App\Controllers\ProductController::class, 'delProduct']);
  $router->post('/edit-product', [App\Controllers\ProductController::class, 'saveEditProduct']);
  //
  $router->get('/list-categories', [App\Controllers\CategoryController::class, 'listCategories']);
  $router->get('/add-new-category', [App\Controllers\CategoryController::class, 'categoryAddForm']);
  $router->post('/add-new-category', [App\Controllers\CategoryController::class, 'addNewCategory']);
  $router->get('/edit-category', [App\Controllers\CategoryController::class, 'categoryEditForm']);
  $router->get('/delete-category', [App\Controllers\CategoryController::class, 'delCategory']);
  $router->post('/edit-category', [App\Controllers\CategoryController::class, 'saveEditCategory']);
  //

  //
});
  $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
  $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
  // Print out the value returned from the dispatched function
  echo $response;
?>