<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ControlHome::loadHomepage');
$routes->post('login', 'ControlAdmin::login');
$routes->post('logout', 'ControlAdmin::logout');
$routes->post('register','ControlAdmin::register');

$routes->get('article/loadEdit/(:num)','ControlArticle::loadEdit/$1');
$routes->post('article/edit/(:num)','ControlArticle::edit/$1');

$routes->post('article/remove/(:num)','ControlArticle::remove/$1');
$routes->post('article/create','ControlArticle::create');

$routes->get('article/loadCreate','ControlArticle::loadCreate');
$routes->get('article/overview','ControlArticle::loadOverview');

$routes->get('teams', 'ControlTeam::load');

$routes->get('article/(:num)','ControlArticle::load/$1');
$routes->get('league/(:num)/(:num)', 'ControlLeague::loadGames/$1/$2');
$routes->get('seasons','ControlSeason::loadSeasons');
$routes->get('teams','ControlTeams');
