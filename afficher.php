<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recueil de données</title>
    <link rel="stylesheet" href="boostsrap/bootstrap.min.css">
    <style>
    </style>
</head>
<body class="container">
<h1 class="card-title" style="text-align: center">Fiche patient</h1>
<a class="btn btn-success" style="color: white" href="index.php">Retour à la liste</a>
<a class="btn btn-success" style="color: white" href="index.php?editer&id=<?php echo $_GET['id'];?>">modifier</a>
<div class="row">
<?php 
$persisteur = new PersisteurDeDonnees();
$patient = $persisteur->recuprerPatient($_GET['id']);

foreach($patient as $champ => $valeur){
		echo '<div class="col-4">'.preg_replace('/_/',' ',ucfirst($champ)) . ': ' . $valeur.'</div>';
	}
?>
</div>
<script src="boostsrap/jquery-3.2.1.slim.min.js"></script>
<script src="boostsrap/popper.min.js"></script>
<script src="boostsrap/bootstrap.min.js"></script>
</body>
</html>
