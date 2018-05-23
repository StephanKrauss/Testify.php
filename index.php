<?php

require 'vendor/autoload.php';

use Testify\Testify;

$tf = new Testify();

$container = new stdClass();

$tf->before(function() use(&$container)
{
    $container->bla = new App\Controller\Login\LoginController();
});

// add a test case
$tf->test(__FILE__, function($tf)
{
    $tf->assert(true, 'einfacher Test');
    $tf->assertFalse(!true);
    $tf->assertEquals(1337, '1338');
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
    $tf->assertException($loginController, 'wert', 'Test einer Exception');
    $test = 123;
});

$tf->run(true);

$test = 123;