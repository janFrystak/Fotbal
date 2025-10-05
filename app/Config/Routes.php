<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ControlHome::loadHomepage');
$routes->post('login', 'ControlAdmin::login');
$routes->post('logout', 'ControlAdmin::logout');

$routes->get('article/(:num)','ControlArticle::load/$1');
$routes->get('seasons','ControlSeason::loadSeasons');
$routes->get('teams','ControlTeams');
