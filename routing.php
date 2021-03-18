<?php
namespace Routing;

use App\Controllers\Backend\CategoryController;
use App\Controllers\Backend\HomeController;
use App\Controllers\Backend\LoginController;
use App\Controllers\Backend\OrderController;
use App\Controllers\Backend\ProductController;
use App\Controllers\Backend\UserController;
use App\Controllers\Frontend\HomePageController;
use App\Controllers\Frontend\CartController;
use App\Validations\Admin\Validate;
use App\Validations\Client\Info;
use App\Validations\Auth;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();
// @validate
$router->filter('checkCategoryData', [Validate::class, 'checkCategoryData']);
$router->filter('checkProductData', [Validate::class, 'checkProductData']);
$router->filter('checkUserData', [Validate::class, 'checkUserData']);
$router->filter('checkInfoData', [Info::class, 'checkInfoData']);


// @ fontend
$router->get('/', [HomePageController::class, 'index']);
$router->get('/category/{id:i}', [HomePageController::class, 'getProductOfCategory']);
$router->get('/product', [HomePageController::class, 'getAll']);
$router->get('/product/{page:i}', [HomePageController::class, 'getAll']);
$router->get('/product-detail/{id:i}', [HomePageController::class, 'detail']);
$router->post('/search', [HomePageController::class, 'search']);

$router->get('/cart', [CartController::class, 'index']);
$router->get('/add-to-cart/{id}', [CartController::class, 'addToCart']);
$router->post('/cart/update', [CartController::class, 'updateCart']);
$router->get('/cart/delete/{id:i}', [CartController::class, 'clearCart']);
$router->get('/checkout', [CartController::class, 'checkout']);
$router->post('/checkout/store', [CartController::class, 'storeOrder'], ['before'=>'checkInfoData']);
$router->get('/cart/detail', [CartController::class, 'cartDetail']);

// @ backend
    // @ authentication
$router->filter('auth', [Auth::class, 'checkLogin']);
$router->filter('superUser', [Auth::class, 'checkAuth']);

    // @ acess
$router->get('login', [LoginController::class, 'login']);
$router->get('login/{mes:c}', [LoginController::class, 'login']);
$router->post('post-login', [LoginController::class, 'postLogin']);
$router->get('logout', [LoginController::class, 'logout']);

$router->group(['prefix' => 'admin', 'before' => 'auth'], function ($router) {
    $router->get('/', [HomeController::class, 'index']);
    $router->group(['prefix' => 'category'], function ($router) {
        $router->get('/', [CategoryController::class, 'index']);
        $router->get('/{page:i}', [CategoryController::class, 'index']);
        $router->get('insert', [CategoryController::class, 'insert']);
        $router->post('store', [CategoryController::class, 'store'], ['before'=>'checkCategoryData']);
        $router->get('edit/{id:i}', [CategoryController::class, 'edit']);
        $router->post('update', [CategoryController::class, 'update'], ['before'=>'checkCategoryData']);
        $router->get('delete/{id:i}', [CategoryController::class, 'delete']);
    });
    $router->group(['prefix' => 'product'], function ($router) {
        $router->get('', [ProductController::class, 'index']);
        $router->get('/{page:i}', [ProductController::class, 'index']);
        $router->get('/insert', [ProductController::class, 'insert']);
        $router->post('/store', [ProductController::class, 'store'], ['before'=>'checkProductData']);
        $router->get('/edit/{id:i}', [ProductController::class, 'edit']);
        $router->post('/update', [ProductController::class, 'update'], ['before'=>'checkProductData']);
        $router->get('/delete/{id:i}', [ProductController::class, 'delete']);
    });
    $router->group(['prefix' => 'user', 'before' => 'superUser'], function ($router) {
        $router->get('', [UserController::class, 'index']);
        $router->get('/insert', [UserController::class, 'insert']);
        $router->post('/store', [UserController::class, 'store'], ['before'=>'checkUserData']);
        $router->get('/edit/{id:i}', [UserController::class, 'edit']);
        $router->post('/update', [UserController::class, 'update'], ['before'=>'checkUserData']);
        $router->get('/delete/{id:i}', [UserController::class, 'delete']);
    });
    $router->group(['prefix' => 'order'], function ($router) {
        $router->get('', [OrderController::class, 'index']);
        $router->get('/insert', [OrderController::class, 'insert']);
        $router->post('/store', [OrderController::class, 'store']);
        $router->get('/edit/{id:i}', [OrderController::class, 'edit']);
        $router->post('/update', [OrderController::class, 'update']);
        $router->get('/delete/{id:i}', [OrderController::class, 'delete']);
        $router->get('/detail/{id:i}', [OrderController::class, 'detail']);
        $router->post('/detail/edit/{id:i}', [OrderController::class, 'updateDetail']);
        $router->get('/detail/delete/{id:i}/{p:i}', [OrderController::class, 'removeDetail']);
    });

});

$dispatcher = new Dispatcher($router->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);
} catch (HttpRouteNotFoundException $e) {
    echo '<pre>';
    // var_dump($e);
    echo '404';
    die();
} catch (HttpMethodNotAllowedException $e) {
    echo '405';
    //var_dump($e);
    die();
}
