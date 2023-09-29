<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Pages::register');
$routes->get('/dashboard', 'Pages::dashboard');
$routes->get('/addActivity', 'Pages::addActivity');
$routes->get('/addData', 'Pages::addData');
$routes->get('/showData', 'Pages::showData');
$routes->get('/uploadImage', 'Pages::uploadImage');
$routes->get('/test', 'Pages::test');
