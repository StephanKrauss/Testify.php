<?php

use Testify\Testify;
use App\Controller\Login\LoginController;

$tf = new Testify();
$loginController = new LoginController();

$loginController->setData(array(4,5,6));

$tf->beforeEach(function($tf) use($loginController) {
	$loginController->setData(array(1, 2, 3));
});

$tf->test(__FILE__, function($tf) use($loginController)
{
	$tf->assertTrue($loginController->insert(), 'Vergleich true');

	$tf->assertEquals($loginController->insert(),'abc'. 'Vergleich abc');

	$test = $loginController->getData();
});

$tf->test(__FILE__, function($tf) use($loginController)
{
	$tf->assertTrue($loginController->insert(), 'Vergleich');

	$tf->assertEquals($loginController->insert(),'abc'. 'mein Test');

	$test = $loginController->getData();
});

$tf->test(__FILE__, function($tf) use($loginController)
{
	try{
		$loginController->run();
	}
	catch(Throwable $e){
		$tf->assertTrue($e instanceof Exception,'Exception abfangen');
	}
});