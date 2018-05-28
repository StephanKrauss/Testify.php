<?php

require 'vendor/autoload.php';
require_once('src/container.php');

//use Webmozart\Json\JsonDecoder;
//use Webmozart\Json\JsonValidator;
//use Webmozart\Json\ValidationFailedException;

use Testify\Testify;

$tf = new Testify();

$tf->before(function() use($container)
{
	/** @var  $controller App\Controller\Login\LoginController */
	$controller = $container[App\Controller\Login\LoginController::class];
	$controller->setData(['aa','bb','cc']);
});

// add a test case
$tf->test(__FILE__, function($tf)
{
    $tf->assert(true, 'einfacher Test');
    $tf->assertFalse(!true);
    $tf->assertEquals(1337, '1337');
	$tf->assertNotEquals(array('a', 'b', 'c'), array('a', 'c', 'd'), "Not the same order");
    $tf->assertEquals(new stdClass, new stdClass, "Classes are equals");
});

$tf->test(__FILE__,function($tf)
{
    $tf->assert(true, "Always true !");
    $tf->assertSame(1024, pow(2, 10));
    $tf->assertNotSame(new stdClass, new stdClass, "Not the same classes !");
});

$tf->test(__FILE__, function($tf) use($container)
{
	/** @var  $controller App\Controller\Login\LoginController */
	$controller = $container[App\Controller\Login\LoginController::class];

    $tf->assertException($controller, 'wert', 'Test einer Exception');

    $tf->assertIsArray($controller->getData(), 'Kontrolle Array');

    $tf->assertRegExpr("^([0-9]+)([a-z]+)$", '1235456987452sdfsdWECDsdfsd1', 'Test RegEx');
});

//$tf->test(__FILE__, function($tf) use($container)
//{
//	/** @var $controller App\Controller\Login\LoginController */
//	// $controller = new App\Controller\Login\LoginController();
//	// $data = $controller->response();
//
//	try{
//		// $decoder = new JsonDecoder();
//		$validator = new JsonValidator();
//
//		$controller = new App\Controller\Login\LoginController();
//		$data = $controller->response();
//
//		// $data = $decoder->decodeFile('c:/xampp/htdocs/testify/src/app/Controller/Login/data.json');
//
//		$errors = $validator->validate($data, 'c:/xampp/htdocs/testify/src/app/Controller/Login/schema.json');
//
//		if (count($errors) > 0) {
//		    $tf->assertTrue(false, 'JSON Validierung fehlgeschlagen');
//		}
//		else{
//			$tf->assertTrue(true, 'JSON Validierung gelungen');
//		}
//	}
//	catch(\Throwable $e){
//		$test = 123;
//	}
//});

$tf->run(true);