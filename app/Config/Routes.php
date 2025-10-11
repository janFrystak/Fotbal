<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ControlHome::loadHomepage');
$routes->post('login', 'ControlAdmin::login');
$routes->post('logout', 'ControlAdmin::logout');
$routes->post('register','ControlAdmin::register');

$routes->post('article/edit(:num)','ControlArticle::edit/$1');
$routes->post('article/remove(:num)','ControlArticle::remove/$1');
$routes->post('articles/add','ControlArticle::add');

$routes->get('article/(:num)','ControlArticle::load/$1');
$routes->get('league/(:num)/(:num)', 'ControlLeague::loadGames/$1/$2');
$routes->get('seasons','ControlSeason::loadSeasons');
$routes->get('teams','ControlTeams');
