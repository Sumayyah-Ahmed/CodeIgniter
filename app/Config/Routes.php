<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * //$routes->get('/','Home::index');
 */




$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);





$routes->group('admin', function ($routes){
    $routes->add('user', 'Admin\Users::index');
    $routes->add('users', 'Admin\Users::getAllUsers');
    $routes->add('product/(:any)/(:any)','Admin\Shop::product/$1/$2');

    $routes->add('blog', 'Admin\Blog::index');
    $routes->get('blog/new', 'Admin\Blog::createNew');
    $routes->post('blog/new', 'Admin\Blog::saveBlog');
    


});

