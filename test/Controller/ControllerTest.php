<?php

use Testify\Testify;

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
});