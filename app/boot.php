<?php
/**
 * @author: Jonty Sponselee <jsponselee@student.scalda.nl>
 * @since: 3/17/2019
 */

require_once '../vendor/autoload.php';

// Determine if the requested page is an admin page or a userview page

// For admin:
    // Login (system where a user can log into the admin section):
    // Determine if the user is logged in, otherwise show the login page
    // If the user is logged in, redirect the user to the requested page or the dashboard
    // Or show the 404 Admin page if the requested page isn't found

    // Manage Page (pages are dynamically made and shown to the client):
    // Actions: add, edit, delete, list

    // Manage Post ()

// For userview:
    // Show the content of the current page
    // Or show the 404 page if the requested page isn't found

// Goal: CMS where admin can manage pages and users can view said pages
$routeCollection = include 'Router/routecollection.php';

$Router = new \RinCMS\Router\Router( new \RinCMS\Router\RouteParser( new \RinCMS\Router\Route()));

$Router->addCollection($routeCollection);

$Route = $Router->route();

// todo:
// HTTP REQUEST
// HTTP RESPONSE
// ADMIN LOGIN

switch($Router->status){
    case $Router::NOT_FOUND:
        echo 'not found';
        break;
    case $Router::METHOD_NOT_ALLOWED:
        echo 'Method not alllowed';
        break;
    case $Router::FOUND:
        $RouteDispatcher = new \RinCMS\Router\RouteDispatcher($Route);

        $RouteDispatcher->dispatch();
        break;
}