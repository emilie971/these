<?php
/**
 * Created by PhpStorm.
 * User: emilie
 * Date: 16/09/18
 * Time: 22:39
 */
$server = '127.0.0.1';
$db = 'these';
$login = 'emilie';
$pwd = 'guadeloupe';

$pdo = new \PDO("mysql:host=$server;dbname=$db;charset=utf8", $login, $pwd);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "select * from these order by 1 asc";
$query = $pdo->prepare($sql);
$query->execute();
$fields = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($fields as $index => $patient){
    $id = $patient['id'];
    $age = calculerAge($patient['date_de_naissance'], $patient['periode_mois'], $patient['periode_annee']);
    $nom = ucfirst($patient['nom']);
    $prenom = ucfirst($patient['prenom']);
    $sql = "UPDATE these set age=$age, prenom='$prenom', nom='$nom' where id = $id;";
    $query = $pdo->prepare($sql);
    $query->execute();
}

function calculerAge($dateDeNaissance, $moisDentree, $anneDentree)
{
    $dateDeNaissance = new DateTime($dateDeNaissance);
    $mois = array(
        'juin' => '06',
        'decembre' => '12',
    );
    $periode = new DateTime('01-' . $mois[$moisDentree]. '-' . $anneDentree);
    $diff = $periode->diff($dateDeNaissance);
    $age = $diff->y;
    $post['age'] = $age;
    return $age;
}