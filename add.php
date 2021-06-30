<?php

include('db.php');

if(isset($_POST['submit'])){
  var_dump($_POST);
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
	

  	$insert_data = "INSERT INTO dossier(dateEntre, agence, nomDossier, activite,
	  				 entreprise, typeCredit, montantSolicite, dureeSolicite, statut, dateSortie,
					   montantAccorde, dureeAccorde, fraisEtude, fraisMEP, fraisGaranti) 
					   VALUES ('$dateEntre','$agence','$nomDossier','$activite','$entreprise','$typeCredit',
					   '$montantSolicite','$dureeSolicite','$dureeSolicite','$statut','$dateSortie',
					   '$montantAccorde','$dureeAccorde','$fraisEtude','$fraisMEP','$fraisGaranti',NOW())";
  	$run_data = mysqli_query($con,$insert_data);

  	if($run_data){
  		header('location:index.php');
  	}else{
  		echo "Erreur!!!!";
  	}

}

?>