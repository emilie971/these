<?php
/**
 * Created by PhpStorm.
 * User: royglen
 * Date: 16/08/18
 * Time: 19:56
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . '/ChargeurDeClasses.php');

$chargeur = new ChargeurDeClasses();
$chargeur->charger();

if (isset($_POST['suivant']) && $_POST['suivant'] == 'suivant') {
    $persisteur = new PersisteurDeDonnees($_POST);
    $persisteur->sauvegarger($_POST);
} elseif (isset($_POST['enregistrer']) && $_POST['enregistrer'] == 'enregistrer') {
    $persisteur = new PersisteurDeDonnees($_POST);
    $persisteur->editer($_POST, $_GET['id']);
}

if (isset($_GET['fiche_de_recueil'])) {
    $formulaire = new Formulaire();
    $formulaire->afficher();
} elseif (isset($_GET['expoter'])) {
    $exporteur = new Exporteur();
    $exporteur->export();
} elseif (isset($_GET['afficher'])) {
    $afficheur = new Afficheur();
    $afficheur->afficher($_GET['id']);
} elseif (isset($_GET['editer'])) {
    $editeur = new Editeur();
    $editeur->editer($_GET['id']);
}
$index = new Liste();
$index->afficher();


exit;

