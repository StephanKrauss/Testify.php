<?php
$check = $suiteResults['fail'] === 0 ? 'pass' : 'fail';

$errorMessage = '';

if($check == 'fail'){
	foreach($cases as $fileName => $value){
		$errorMessage .= 'Datei: '.$fileName."\n";
		$errorMessage .= 'Fehleranzahl: '.$cases[$fileName]['pass']."\n";

		for($i=0; $i < count($cases[$fileName]['tests']); $i++){
			if($cases[$fileName]['tests'][$i]['result'] == 'fail'){
				$errorMessage .= "Fehler: ".$cases[$fileName]['tests'][$i]['file']."\n";
				$errorMessage .= "Zeile: ".$cases[$fileName]['tests'][$i]['line']."\n";
				$errorMessage .= "Test: ".$cases[$fileName]['tests'][$i]['source']."\n #### \n";
			}
		}
	}

	echo $errorMessage;
}
