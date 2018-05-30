<?php
namespace Unit;

include_once('vendor/autoload.php');

class Unit
{
	/** @var $htmlView bool Anzeige als Html oder Text  */
	protected $htmlView = false;

	/** @var $evaluationText null Inhalt der Anzeige  */
	protected $evaluationText = null;

	/**
	 * ermittelt die Testfiles. Erstellt Ausgabe der Test.
	 *
	 * @param $dir
	 *
	 * @return $this
	 */
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

					$this->evaluationText .= $tf->run($this->htmlView);
				}
			}
			else if(is_dir($dir. DIRECTORY_SEPARATOR .$testFile)) {
				$this->getDirContents($dir. DIRECTORY_SEPARATOR .$testFile);
			}
		}

		echo $this->evaluationText;
	}
}

$unit = new Unit();

$unit->getDirContents('test');