<?php

use Testify\Testify;

// include_once('../../vendor/autoload.php');

$tf = new Testify();

$tf->test(__FILE__, function($tf)
{
	$tf->assert(true, "To be sure that initial test pass !");
	$tf->assertFalse(false);
});

$tf->test(__FILE__, function($tf)
{
	$tf->assert(true, "To be sure that initial test pass !");
	$tf->assertFalse(false);
	$tf->assertTrue(false,'Fehler');
});

// echo $tf->run();