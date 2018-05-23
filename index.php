<?php

require 'vendor/autoload.php';
require_once('src/container.php');

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

$tf->test(__FILE__, function($tf) use($container)
{
	/** @var $jsonValidator JsonSchema\Validator */
	$jsonValidator = $container[JsonSchema\Validator::class];

	/** @var  $controller App\Controller\Login\LoginController */
	// $controller = $container[App\Controller\Login\LoginController::class];
	// $test = $controller->response();

	$jsonResponse = '{
  		"blah": "foobar",
  		"foo": "bar"
	}';

	$schema='{
	  "type": "object",
	  "properties": {
	    "blah": {
	      "type": "string"
	    },
	    "version": {
	      "type": "string",
	      "default": "v1.0.0"
	    }
	  }
	}';

	$jsonValidator->validate($jsonResponse, $schema);

	$tf->assertTrue($jsonValidator->isValid(),'Test JSON Response');
});

$tf->run(true);