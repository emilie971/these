<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Recueil de données</title>
    <link rel="stylesheet" href="boostsrap/bootstrap.min.css">
    <style>
        .form-control {
            margin-top: 2px;
            margin-bottom: 2px;
        }
    </style>
</head>
<body class="container" >
<h1 class="card-title" style="text-align: center">
<?php
$edit = false;
$patient = null;
if(isset($_GET['editer']) && !empty($_GET['id'])){
	echo 'Modification de fiche';
	$persisteur = new PersisteurDeDonnees();
    $patient = $persisteur->recuprerPatient($_GET['id']);
    if(is_array($patient) && !empty($patient)){
		$edit = true;
	}
} else {
	echo 'Création fiche de recueil des données';
}
?>
</h1>
<a class="btn btn-success" style="color: white" href="index.php">Retour à la liste</a>
<?php
if($edit == true){
    $action = 'index.php?fiche_de_recueil&id=' . $_GET['id'];
} else  {
    $action = 'index.php?fiche_de_recueil';
}
echo "<form method=\"post\" action=\"$action\">"
?>    <div class="row">
        <div class="col">
            <?php include_once(__DIR__ . '/form_blocks/patient.php'); ?>
            <?php include_once(__DIR__ . '/form_blocks/poids.php'); ?>
            <?php include_once(__DIR__ . '/form_blocks/bilan_para.php'); ?>
        </div>
        <div class="col">
            <?php include_once(__DIR__ . '/form_blocks/chimio.php'); ?>
            <?php include_once(__DIR__ . '/form_blocks/dietetic.php'); ?>
            <?php include_once(__DIR__ . '/form_blocks/adjuvant.php'); ?>
            <?php include_once(__DIR__ . '/form_blocks/rum.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php include_once(__DIR__ . '/form_blocks/coms.php'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
            if($edit == true){
                $nom_du_bouton = 'enregistrer';
            } else  {
                $nom_du_bouton = 'suivant';
            }
            echo "<input class=\"btn btn-success\" type=\"submit\" name=\"$nom_du_bouton\" value=\"$nom_du_bouton\">"
            ?>
        </div>
    </div>
</form>
<script src="boostsrap/jquery-3.2.1.slim.min.js"></script>
<script src="boostsrap/popper.min.js"></script>
<script src="boostsrap/bootstrap.min.js"></script>
<?php if($edit == true){?>
	<script type="application/javascript">
	$(document).ready(function () {
		var fields = <?php echo json_encode($patient);?>;
		$.each(fields, function(index, element){
			if($.inArray($("[name="+index+"]").attr('type'), ['hidden','text','date']) !== -1){
				$("[name="+index+"]").val(element);
			} else if ($.inArray($("[name="+index+"]").attr('type'), ['radio','checkbox']) !== -1){
				$("[name="+index+"][value="+element+"]").click()
			} else if ($("[name="+index+"]").prop('tagName') === 'TEXTAREA'){
                $("[name="+index+"]").append($("[name="+index+"]").val(element));
            }
		});
		
		$.each($('select'), function(index, element){
				$("[name="+element.name+"]").val(fields[element.name]);
		});
	});
	</script>
<?php }?>
<script type="application/javascript">
    $(document).ready(function () {
		$("#type_nutrition_enteral").on("click", function(){
			if($("#type_nutrition_parenterale").is(':checked')){
				$("#type_nutrition_enteral").prop('checked', false);
				}
		});
		$("#type_nutrition_parenterale").on("click", function(){
			if($("#type_nutrition_enteral").is(':checked')){
				$("#type_nutrition_parenterale").prop('checked', false);
				}
		});

		$('#date_de_naissance').on('change', function(){
			calculerAge();
		});
		$('#periode_mois').on('change', function(){
			calculerAge();
		});
		$('#periode_annee').on('change', function(){
			calculerAge();
		});

		calculDuree();

		function calculerAge(){
			var mois = {"juin": 6, "juillet": 7};
			var date_de_naissance = new Date($('#date_de_naissance').val());
			var periode = new Date('01/'+mois[$('#periode_mois').val()]+'/'+$('#periode_annee').val());
			var milliSecondesParAnnee = 1000 * 60 * 60 * 24 * 365;
			var age = (periode.getTime() - date_de_naissance.getTime()) / milliSecondesParAnnee;
			$('#age').val(Math.floor(age));
			console.log(parseInt(age));
		}
		
        function calculDuree() {
            var entree = $('#date_d_entree').val();
            var sortie = $('#date_de_sortie').val();
            if (entree !== '' && sortie != '') {
                var debut = new Date(entree);
                var fin = new Date(sortie);
                var milliSecondesParJour = 1000 * 60 * 60 * 24;
                var jours = (fin.getTime() - debut.getTime()) / milliSecondesParJour;
                $('#duree').val(Math.floor(jours));
                $('#duree_hospit').val(Math.floor(jours));
            }
        };

        $('#ent').css('display', 'none');
        $('#olimel').css('display', 'none');
        $('#perikabiven').css('display', 'none');

        $("#type_nutrition_enteral").on('change', function () {
            $('#olimel').css('display', 'none');
            $('#perikabiven').css('display', 'none');
            $('#ent').css('display', 'inline-block');
        });
        $("#type_nutrition_parenterale").on('change', function () {
            $('#ent').css('display', 'none');
            $('#olimel').css('display', 'inline-block');
            $('#perikabiven').css('display', 'inline-block');
        });

        $('input[type="number"]').val(0);
        $('input[type="number"]').attr('min', 0);

        $('#date_d_entree').on('blur', function () {
            calculDuree();
        });
        $('#date_de_sortie').on('blur', function () {
            calculDuree();
        });
    });
</script>
</body>
</html>
