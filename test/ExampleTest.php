<?php

require '../vendor/autoload.php';

use Testify\Testify;
use App\Controller\Login\LoginController;

$tf = new Testify("LoginException");
$loginController = new LoginController();

$loginController->setData(array(4,5,6));

$tf->beforeEach(function($tf) use($loginController) {
	$loginController->setData(array(1, 2, 3));
});

$tf->test("test1", function($tf) use($loginController)
{
	$tf->assertTrue($loginController->insert(), 'Vergleich');

	$tf->assertEquals($loginController->insert(),'abc'. 'mein Test');

	$test = $loginController->getData();
});

$tf->test("test2", function($tf) use($loginController)
{
	$tf->assertTrue($loginController->insert(), 'Vergleich');

	$tf->assertEquals($loginController->insert(),'abc'. 'mein Test');

	$test = $loginController->getData();
});

$tf->test("Exception abfangen", function($tf) use($loginController)
{
	try{
		$loginController->run();
	}
	catch(Throwable $e){
		$tf->assertTrue($e instanceof Exception,'Exception abfangen');
	}
});


$tf->run();