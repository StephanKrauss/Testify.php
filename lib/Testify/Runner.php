<?php

namespace Testify;

class Runner extends \ArrayIterator
{
	/** @var  $instance null */
	protected static $instance = null;

	/** @var $tester array  */
	protected static $tester = array();

	/**
	 * Call this method to get singleton
	 *
	 * @return UserFactory
	 */
	public static function getInstance()
	{
		$cls = get_called_class(); // late-static-bound class name

		if (self::$instance === null) {
			self::$instances = new static();
		}

		return self::$instances;
	}

	protected function __construct(){}

	protected function __clone(){}



	public function __wakeup()
	{
		throw new Exception("Cannot unserialize singleton");
	}

}
