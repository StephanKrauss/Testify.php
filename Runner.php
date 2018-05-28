<?php
namespace Runner;

include_once('vendor/autoload.php');

class Runner
{
	protected static $instance = null;
	protected $testFiles = array();
	protected $htmlView = false;
	protected $evaluationText = null;

	public static function getInstance()
	{
		if (!isset(self::$instance))
		{
			self::$instance = new static;
		}

		return self::$instance;
	}

	public function setHtmlView($htmlView = false)
	{
		$this->htmlView = $htmlView;

		return $this;
	}

	public function getDirContents($dir)
	{
		$files = scandir($dir);

		foreach($files as $key => $testFile)
		{
			if( ($testFile == '.') or ($testFile == '..') )
				continue;

			if(!is_dir($dir. DIRECTORY_SEPARATOR .$testFile)){
				if(strstr($testFile, 'Test.php')){
					include_once($dir. DIRECTORY_SEPARATOR .$testFile);

					$this->evaluationText = $tf->run($this->htmlView);
				}
			}
			else if(is_dir($dir. DIRECTORY_SEPARATOR .$testFile)) {
				$this->getDirContents($dir. DIRECTORY_SEPARATOR .$testFile);
			}
		}

		return $this;
	}

	protected function addTest($test)
	{
		$this->append($test);
	}

}

$runner = Runner::getInstance();
$runner->setHtmlView(true)->getDirContents('test');