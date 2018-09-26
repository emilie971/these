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
<h1 class="card-title" style="text-align: center">Liste</h1>
<form action="index.php?expoter" method="post">
<input type="submit" class="btn btn-success" value="Exporter en format Excel" name="exporter">
<a class="btn btn-success" style="color: white" href="index.php?fiche_de_recueil">Ajouter des fiches</a>
</form>
<hr>
<?php
$persisteurDeDonnees = new PersisteurDeDonnees();
$patients = $persisteurDeDonnees->toutRecuperer();
$total = 0;
foreach($patients as $patient){
	$total += count($patient);
}
echo '<h5>Total: '.$total.'</h5>';
foreach($patients as $letter => $liste){
?>
<h2><?php echo $letter;?></h2>
<?php
	foreach($liste as $patient){
?>
<a href="index.php?afficher&id=<?php echo $patient['id'];?>" style="margin-left: 15px"><?php echo $patient['nom'] . ' ' . $patient['prenom'];?></a>
<a style="font-size: 12px"  href="index.php?editer&id=<?php echo $patient['id'];?>">modifier</a>
</br>
<?php
	}
}
?>
<script src="boostsrap/jquery-3.2.1.slim.min.js"></script>
<script src="boostsrap/popper.min.js"></script>
<script src="boostsrap/bootstrap.min.js"></script>
</body>
</html>
