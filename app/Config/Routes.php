<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/login', 'Pages::login');
$routes->get('/register', 'Pages::register');
$routes->get('/logout', 'Pages::logout');
$routes->get('/dashboard', 'Pages::dashboard');
$routes->add('addActivityContainer/sendDataToFirebase', 'AddActivityContainer::sendDataToFirebase');

// $routes->add('dashboard', 'Pages::dashboard');
$routes->get('/addActivity', 'Pages::addActivity');
$routes->get('/addActivityContainer', 'Pages::addActivityContainer');
$routes->get('/addData', 'Pages::addData');
$routes->get('/showData', 'Pages::showData');
$routes->get('/uploadImage', 'Pages::uploadImage');
$routes->get('/downloadPdf', 'Pages::downloadPdf');
$routes->get('/profile', 'Pages::profile');
$routes->get('/editData', 'Pages::editData');
$routes->get('/test', 'Testing::test');
$routes->get('/test2', 'Testing::test2');
$routes->get('pdf/generatePdf', 'PdfController::generatePdf');
// $routes->get('/print-data', 'MpdfController::generatePdf');
// $routes->post('/print-data', 'MpdfController::generatePdf');
$routes->add('/print-data', 'MpdfController::generatePdf', ['as' => 'generatePdf']);
$routes->post('/print-data', 'MpdfController::generatePdf');

$routes->add('/generate-pdf', 'MpdfController::generatePdf', ['as' => 'generatePdf']);
$routes->post('/generate-pdf', 'MpdfController::generatePdf');

$routes->post('save-token', 'Pages::saveToken');
