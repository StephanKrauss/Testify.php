<?php
	include_once('vendor/autoload.php');

	$container = new Pimple\Container();

	$container[App\Controller\Login\LoginController::class] = function($container){
		return new App\Controller\Login\LoginController();
	};