<?php
/**
 * Created by PhpStorm.
 * User: royglen
 * Date: 16/08/18
 * Time: 20:04
 */

class PersisteurDeDonnees
{
	public function recuprerPatient($id){
			$server = '127.0.0.1';
	        $db = 'these';
	        $login = 'emilie';
	        $pwd = 'guadeloupe';
			$pdo = new \PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pwd);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM these WHERE id = $id ORDER BY nom ASC;";
			$query = $pdo->prepare($sql);
			$query->execute();
			$patient = $query->fetch(PDO::FETCH_ASSOC);
			return $patient;
		}
		
	public function toutRecuperer(){
		$server = '127.0.0.1';
	        $db = 'these';
	        $login = 'emilie';
	        $pwd = 'guadeloupe';
		$pdo = new \PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pwd);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM these ORDER BY nom ASC;";
		$query = $pdo->prepare($sql);
		$query->execute();
		$patients = $query->fetchAll(PDO::FETCH_ASSOC);
		$output = array();
		foreach($patients as $patient){
				$output[strtoupper($patient['nom'][0])][] = $patient;
		}
		return $output;
	}

	protected function calculerAge(array $post = array()){
	    if(!empty($post['date_de_naissance']) && !empty($post['periode_mois']) && !empty($post['periode_annee'])){
	        $dateDeNaissance = new DateTime($post['date_de_naissance']);
	        $mois = array(
	            'juin' => '06',
	            'decembre' => '12',
            );
	        $periode = new DateTime('01-' . $mois[$post['periode_mois']] . '-' . $post['periode_annee']);
            $diff = $periode->diff($dateDeNaissance);
            $age = $diff->y;
            $post['age'] = $age;
        }
        return $post;
    }

    public function editer($post, $id)
    {
        $post = $this->calculerAge($post);
        $post['id'] = (int)$id;
        $server = '127.0.0.1';
        $db = 'these';
        $login = 'emilie';
        $pwd = 'guadeloupe';

        if (isset($post['enregistrer'])) {
            unset($post['enregistrer']);
        }
        if (isset($post['suivant'])) {
            unset($post['suivant']);
        }

        $pdo = new \PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $champs = '`' . implode('`,`', array_keys($post)) . '`';
        $valeurs = '"' . implode('","', array_values($post)) . '"';

        $sql = "REPLACE INTO these ($champs) VALUES ($valeurs);";

        $query = $pdo->prepare($sql);
        $query->execute();

        header('location: index.php');
    }

    public function sauvegarger(array $post)
    {
        $post = $this->calculerAge($post);
        $server = '127.0.0.1';
        $db = 'these';
        $login = 'emilie';
        $pwd = 'guadeloupe';

        if (isset($post['suivant'])) {
            unset($post['suivant']);
        }
        if (isset($post['enregistrer'])) {
            unset($post['enregistrer']);
        }

        $pdo = new \PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DESCRIBE `these`";
        $query = $pdo->prepare($sql);
        $query->execute();
        $fields = $query->fetchAll(PDO::FETCH_COLUMN);
        $i = 0;
        $champs = '`' . implode('`,`', array_keys($post)) . '`';
        $valeurs = '"' . implode('","', array_values($post)) . '"';
        foreach ($post as $item => $value) {
            if (!in_array($item, $fields)) {
                $sql = "ALTER TABLE these ADD COLUMN $item VARCHAR(255);";
                $query = $pdo->prepare($sql);
                $query->execute();
            }
        }
        $sql = "INSERT INTO these ($champs) VALUES ($valeurs);";
        $query = $pdo->prepare($sql);
        $query->execute();
    }
}
