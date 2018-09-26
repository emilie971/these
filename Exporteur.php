<?php


class Exporteur{
	
	public function export(){
	    $date = new DateTime();
        $filename = 'Export_' . $date->format('Ymd_His');
		header("Content-Disposition: attachment; filename=\"".$filename."\"");
		header("Content-Type: application/vnd.ms-excel;");
		header("Pragma: no-cache");
		header("Expires: 0");
		$persisteurDeDonnees = new PersisteurDeDonnees();
		$patients = $persisteurDeDonnees->toutRecuperer();
		$date = new \DateTime;
		$filename = 'export_' . $date->format('Ymd') . '_' . $date->getTimestamp() . '.xls';
		$out = fopen("php://output", 'w');
		$entete = false;
		foreach ($patients as $letter => $liste){
				foreach($liste as $patient){
					if($entete == false){
					$tetes = array_keys($patient);
					fputcsv($out, $tetes, "\t");
					$entete = true;
					}
					fputcsv($out, $patient, "\t");
				}
		}
		fclose($out);
		exit;
	}
	
}
