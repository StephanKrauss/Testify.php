<?php
$check = $suiteResults['fail'] === 0 ? 'pass' : 'fail';

$errorMessage = null;

if($check == 'fail'){
	foreach($cases as $fileName => $value){
		$errorMessage .= 'Testdatei: '.$fileName."\n";
		$errorMessage .= 'Fehleranzahl: '.$cases[$fileName]['fail']."\n ##### \n";

		for($i=0; $i < count($cases[$fileName]['tests']); $i++){
			if($cases[$fileName]['tests'][$i]['result'] == 'fail'){
				$errorMessage .= "Fehler: ".$cases[$fileName]['tests'][$i]['file']."\n";
				$errorMessage .= "Zeile: ".$cases[$fileName]['tests'][$i]['line']."\n";
				$errorMessage .= "Test: ".$cases[$fileName]['tests'][$i]['source']."\n #### \n";
			}
		}
	}
}