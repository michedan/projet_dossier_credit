<?php
include('db.php');

$id = $_GET['id'];

if(isset($_POST['submit']))
{
	$dateEntre = $_POST['dateEntre'];
    $agence = $_POST['agence'];
    $nomDossier = $_POST['nomDossier'];
    $activite = $_POST['activite'];
    $entreprise = $_POST['entreprise'];
    $typeCredit = $_POST['typeCredit'];
    $montantSolicite = $_POST['montantSolicite'];
    $dureeSolicite = $_POST['dureeSolicite'];
    $statut = $_POST['statut'];
    $dateSortie = $_POST['dateSortie'];
    $montantAccorde = $_POST['montantAccorde'];
    $dureeAccorde = $_POST['dureeAccorde'];
    $fraisEtude = $_POST['fraisEtude'];
    $fraisMEP = $_POST['fraisMEP'];
    $fraisGaranti = $_POST['fraisGaranti'];
	

	$update = "UPDATE dossier SET id = dateEntre='$dateEntre', agence = '$agence', nomDossier = '$nomDossier',
			 activite = '$activite', entreprise = '$entreprise', typeCredit = '$typeCredit', montantSolicite = '$montantSolicite',
			 dureeSolicite = '$dureeSolicite', statut = '$statut', dateSortie = '$dateSortie', montantAccorde = '$montantAccorde',
			 dureeAccorde = '$dureeAccorde', fraisEtude = '$fraisEtude', fraisMEP = '$fraisMEP', fraisGaranti = '$fraisGaranti',
			 WHERE id=$id ";
	$run_update = mysqli_query($con,$update);

	if($run_update){
		header('location:index.php');
	}else{
		echo "Erreur de modification";
	}
}

?>