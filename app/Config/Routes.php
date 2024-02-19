<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// CRUD Routes (student)
$routes->get('student', 'Student::index');
$routes->post('student/store', 'Student::store');
$routes->get('student/edit/(:num)', 'Student::edit/$1');
$routes->get('student/delete/(:num)', 'Student::delete/$1');
$routes->get('student/view/(:num)', 'Student::view/$1');
$routes->post('student/update', 'Student::update');

// Grades Routes
$routes->get('grade/view(:num)', 'Grade::view/$1');



