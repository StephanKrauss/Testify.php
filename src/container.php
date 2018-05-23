<?php
	include_once('vendor/autoload.php');

	$container = new Pimple\Container();

	$container[App\Controller\Login\LoginController::class] = function($c)
	{
		return new App\Controller\Login\LoginController();
	};

	$container[JsonSchema\Validator::class] = function($c)
	{
		return new JsonSchema\Validator();
	};