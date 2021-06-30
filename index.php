<?php
include('db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dossiers Crédits CECEC</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<center><img src="upload_images/logo.png" alt="" width="150px" height="80px"></center><br><br>
	<a href="#" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i> Retour</a>
	<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-plus"></i> Ajouter un dossier
  </button>
  <a href="#" class="btn btn-success pull-right"><span class="glyphicon glyphicon-print"></span> Imprimer PDF</a>
  <hr>
		<table class="table table-bordered table-striped table-hover" id="myTable">
		<thead>
			<tr>
			   <th class="text-center" scope="col">Num</th>
				<th class="text-center" scope="col">Entrée</th>
				<th class="text-center" scope="col">Agence</th>
				<th class="text-center" scope="col">Noms</th>
				<!-- <th class="text-center" scope="col">Activité</th>
				<th class="text-center" scope="col">Entreprise</th>
				<th class="text-center" scope="col">Type crédit</th>
				<th class="text-center" scope="col">Type crédit</th>
				<th class="text-center" scope="col">Mtnt sollicité</th>
				<th class="text-center" scope="col">Durée sollicitée</th> -->
				<th class="text-center" scope="col">Statut</th>
				<!-- <th class="text-center" scope="col">Sortie</th>
				<th class="text-center" scope="col">Mtnt accordé</th>
				<th class="text-center" scope="col">Durée accordée</th>
				<th class="text-center" scope="col">FE</th>
				<th class="text-center" scope="col">FMEP</th>
				<th class="text-center" scope="col">FG</th> -->
				<th class="text-center" scope="col">Voir</th>
				<th class="text-center" scope="col">Modif</th>
				<th class="text-center" scope="col">Supp</th>
			</tr>
		</thead>
			<?php

        	$get_data = "SELECT * FROM dossier order by 1 desc";
        	$run_data = mysqli_query($con,$get_data);
			$i = 0;
        	while($row = mysqli_fetch_array($run_data))
        	{
				$sl = ++$i;
				$id = $row['id'];
				$dateEntre = $row['dateEntre'];
				$agence = $row['agence'];
				$nomDossier = $row['nomDossier'];
				$activite = $row['activite'];
				$entreprise = $row['entreprise'];
				$typeCredit = $row['typeCredit'];
				$montantSolicite = $row['montantSolicite'];
				$dureeSolicite = $row['dureeSolicite'];
				$statut = $row['statut'];
				$dateSortie = $row['dateSortie'];
				$montantAccorde = $row['montantAccorde'];
				$dureeAccorde = $row['dureeAccorde'];
				$fraisEtude = $row['fraisEtude'];
				$fraisMEP = $row['fraisMEP'];
				$fraisGaranti = $row['fraisGaranti'];

        		echo "

				<tr>
				<td class='text-center'>$sl</td>
				<td class='text-left'>$dateEntre</td>
				<td class='text-left'>$agence</td>
				<td class='text-left'>$nomDossier</td>
				<td class='text-center'>$statut</td>
			
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-success mr-3 profile' data-toggle='modal' data-target='#view$id' title='Détails'><i class='fa fa-address-card-o' aria-hidden='true'></i></a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					<a href='#' class='btn btn-warning mr-3 edituser' data-toggle='modal' data-target='#edit$id' title='Modifier'><i class='fa fa-pencil-square-o fa-lg'></i></a>

					     
					    
					</span>
					
				</td>
				<td class='text-center'>
					<span>
					
						<a href='#' class='btn btn-danger deleteuser' title='Supprimer'>
						     <i class='fa fa-trash-o fa-lg' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>
		<form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Exporter" />
    </form>
	</div>


	<!---Add in modal---->

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
		<center><img src="upload_images/logo.png" width="150px" height="80px" alt=""></center>
        <h4 class="modal-title text-center">Nouveau Dossier</h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">
			
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputPassword4">Date d'entée(en mois)</label>
					<input type="date" class="form-control" name="dateEntre" placeholder="Date d'entrée">
				</div>

			<div class="form-group col-md-6">
				<label for="inputState">Agence</label>
				<select id="inputState" name="agence" class="form-control">
					<option selected>Choisir...</option>
					<option>Akwa</option>
					<option>Chococho</option>
					<option>Bafoussam</option>
					<option>Bangou</option>
					<option>Anatole</option>
					<option>Ndokoti</option>
					<option>Tsinga</option>
					<option>Mokolo</option>
					<option>Biyem-Assi</option>
				</select>
			</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="firstname">Noms</label>
		<input type="text" class="form-control" name="nomDossier" placeholder="Noms du dossier">
	</div>
	<div class="form-group col-md-6">
		<label for="lastname">Activité</label>
		<input type="text" class="form-control" name="activite" placeholder="Activité">
	</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="fathername">Entreprise</label>
		<input type="text" class="form-control" name="entreprise" placeholder="Entreprise">
	</div>
	<div class="form-group col-md-6">
		<label for="inputState">Type de crédit</label>
		<select id="inputState" name="typeCredit" class="form-control">
			<option selected>Choisir...</option>
			<option>Crédit a la consommation</option>
			<option>Ligne de découvert</option>
			<option>Consolidation de crédit</option>
		</select>
	</div>
</div>


<div class="form-row">
<div class="form-group col-md-6">
<label for="fathername">Montant sollicité</label>
<input type="text" class="form-control" name="montantSolicite" placeholder="Montant sollicité">
</div>
<div class="form-group col-md-6">
<label for="mothername">Durée sollicitée</label>
<input type="text" class="form-control" name="dureeSolicite" placeholder="Durée sollicitée">
</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="inputState">Statut</label>
		<select id="inputState" name="statut" class="form-control">
			<option selected>Choisir...</option>
			<option>En cours</option>
			<option>Avis favorable</option>
			<option>Avis défavorable</option>
		</select>
	</div>

	<div class="form-group col-md-6">
		<label for="inputPassword4">Date de sortie(en mois)</label>
		<input type="date" class="form-control" name="dateSortie" placeholder="Date de sortie">
	</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="fathername">Montant accordé</label>
		<input type="text" class="form-control" name="montantAccorde" placeholder="Montant accordé">
	</div>
	<div class="form-group col-md-6">
		<label for="mothername">Durée accordée</label>
		<input type="text" class="form-control" name="dureeAccorde" placeholder="Durée accordée">
	</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="fathername">Frais d'étude de dossier</label>
		<input type="text" class="form-control" name="fraisEtude" placeholder="Frais d'étude de dossier">
	</div>
	<div class="form-group col-md-6">
		<label for="mothername">Frais de mise en place</label>
		<input type="text" class="form-control" name="fraisMEP" placeholder="Frais de mise en place">
	</div>
</div>


<div class="form-row">
	<div class="form-group col-md-6">
		<label for="fathername">Frais de garantie</label>
		<input type="text" class="form-control" name="fraisGaranti" placeholder="Frais de garantie">
	</div>
	<!-- <div class="form-group col-md-6">
		<label for="mothername">Durée accordée</label>
		<input type="text" class="form-control" name="user_mother" placeholder="Durée accordée">
	</div> -->
</div>

		<input type="submit" name="submit" class="btn btn-info btn-large" value="Enregistrer">

        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM dossier";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Voulez-vous vraiment??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Supprimer</a>
      </div>
      
    </div>

  </div>
</div>


	";
	
}


?>


<!-- View modal  -->
<?php 

// <!-- profile modal start -->
$get_data = "SELECT * FROM dossier";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$dateEntre = $row['dateEntre'];
    $agence = $row['agence'];
    $nomDossier = $row['nomDossier'];
    $activite = $row['activite'];
    $entreprise = $row['entreprise'];
    $typeCredit = $row['typeCredit'];
    $montantSolicite = $row['montantSolicite'];
    $dureeSolicite = $row['dureeSolicite'];
    $statut = $row['statut'];
    $dateSortie = $row['dateSortie'];
    $montantAccorde = $row['montantAccorde'];
    $dureeAccorde = $row['dureeAccorde'];
    $fraisEtude = $row['fraisEtude'];
    $fraisMEP = $row['fraisMEP'];
    $fraisGaranti = $row['fraisGaranti'];

	echo "

		<div class='modal fade' id='view$id' tabindex='-1' role='dialog' aria-labelledby='userViewModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
			<div class='modal-header'>
				<h5 class='modal-title' id='exampleModalLabel'>Détails du dossier</h5>
				<button type='button' class='close' data-dismiss='modal' aria-label='Close'>
				<span aria-hidden='true'>&times;</span>
				</button>
			</div>
			<div class='modal-body'>
			<div class='container' id='profile'> 
				<div class='row'>
					<div class='col-sm-3 col-md-6'>
						<h3 class='text-primary'>$nomDossier</h3>
						<p class='text-secondary'>
						<strong>Date d'entrée :</strong> $dateEntre <br>
						<strong>Agence :</strong> $agence <br>
						<strong>Activité :</strong>$activite <br>
						<strong>Entreprise :</strong> $entreprise <br>
						<strong>Montant sollicité :</strong> $montantSolicite <br>
						<strong>Durée sollicitée :</strong> $dureeSolicite <br>
						<strong>Statut :</strong> $statut <br>
						<strong>Date de sortie :</strong> $dateSortie <br>
						<strong>Montant accordé :</strong> $montantAccorde <br>
						<strong>Durée accordée :</strong> $dureeAccorde <br>
						<strong>Type de crédit :</strong> $typeCredit <br>
						<strong>Frais d'étude :</strong> $fraisEtude <br>
						<strong>Frais de mise en place :</strong> $fraisMEP <br>
						<strong>Frais de garanties :</strong> $fraisGaranti <br>
				</div>

			</div>   
			</div>
			<div class='modal-footer'>
				<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fermer</button>
			</div>
			</form>
			</div>
		</div>
		</div> 


    ";
}


// <!-- profile modal end -->


?>





<!----edit Data--->

<?php

$get_data = "SELECT * FROM dossier";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$dateEntre = $row['dateEntre'];
    $agence = $row['agence'];
    $nomDossier = $row['nomDossier'];
    $activite = $row['activite'];
    $entreprise = $row['entreprise'];
    $typeCredit = $row['typeCredit'];
    $montantSolicite = $row['montantSolicite'];
    $dureeSolicite = $row['dureeSolicite'];
    $statut = $row['statut'];
    $dateSortie = $row['dateSortie'];
    $montantAccorde = $row['montantAccorde'];
    $dureeAccorde = $row['dureeAccorde'];
    $fraisEtude = $row['fraisEtude'];
    $fraisMEP = $row['fraisMEP'];
    $fraisGaranti = $row['fraisGaranti'];

	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Remplissez les informations</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

		<div class='form-row'>
			<div class='form-group col-md-6'>
				<label for='inputPassword4'>Date d'entée</label>
				<input type='date' class='form-control' name='dateEntre' value='$dateEntre' placeholder='Date entrée'>
			</div>
		
			<div class='form-group col-md-6'>
				<label for='inputState'>Agence</label>
				<select id='inputState' name='agence' class='form-control' value='$agence'>
					<option selected>$agence</option>
					<option>Akwa</option>
					<option>Chococho</option>
					<option>Bafoussam</option>
					<option>Bangou</option>
					<option>Anatole</option>
					<option>Ndokoti</option>
					<option>Tsinga</option>
					<option>Mokolo</option>
					<option>Biyem-Assi</option>
				</select>
			</div>
		</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='firstname'>Noms</label>
			<input type='text' class='form-control' name='nomDossier' value='$nomDossier' placeholder='Noms du dossier'>
		</div>
		<div class='form-group col-md-6'>
			<label for='lastname'>Activité</label>
			<input type='text' class='form-control' name='activite' value='$activite' placeholder='Activité'>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fathername'>Entreprise</label>
			<input type='text' class='form-control' name='entreprise' value='$entreprise' placeholder='Entreprise'>
		</div>
		<div class='form-group col-md-6'>
			<label for='inputState'>Type de crédit</label>
			<select id='inputState' name='typeCredit' value='$typeCredit' class='form-control'>
				<option selected>$typeCredit</option>
				<option>Crédit a la consommation</option>
				<option>Ligne de découvert</option>
				<option>Consolidation de crédit</option>
			</select>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fathername'>Montant sollicité</label>
			<input type='text' class='form-control' name='montantSolicite' value='$montantSolicite' placeholder='Montant sollicité'>
		</div>
		<div class='form-group col-md-6'>
			<label for='mothername'>Durée sollicitée</label>
			<input type='text' class='form-control' name='dureeSolicite' value='$dureeSolicite' placeholder='Durée sollicitée'>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='inputState'>Statut</label>
			<select id='inputState' name='statut' value='$statut' class='form-control'>
				<option selected>$statut</option>
				<option>En cours</option>
				<option>Avis favorable</option>
				<option>Avis défavorable</option>
			</select>
		</div>
	
		<div class='form-group col-md-6'>
			<label for='inputPassword4'>Date de sortie</label>
			<input type='date' class='form-control' name='dateSortie' value='$dateSortie' placeholder='Date de sortie'>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fathername'>Montant accordé</label>
			<input type='text' class='form-control' name='montantAccorde' value='$montantAccorde' placeholder='Montant accordé'>
		</div>
		<div class='form-group col-md-6'>
			<label for='mothername'>Durée accordée</label>
			<input type='text' class='form-control' name='dureeAccorde' value='$dureeAccorde' placeholder='Durée accordée'>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fathername'>Frais d'étude de dossier</label>
			<input type='text' class='form-control' name='fraisEtude' value='$fraisEtude' placeholder='Frais d'étude de dossier'>
		</div>
		<div class='form-group col-md-6'>
			<label for='mothername'>Frais de mise en place</label>
			<input type='text' class='form-control' name='fraisMEP' value='$fraisMEP' placeholder='Frais de mise en place'>
		</div>
	</div>
	
	
	<div class='form-row'>
		<div class='form-group col-md-6'>
			<label for='fathername'>Frais de garantie</label>
			<input type='text' class='form-control' name='fraisGaranti' value='$fraisGaranti' placeholder='Frais de garantie'>
		</div>
	</div>
				
				
	<div class='modal-footer'>
		<input type='submit' name='submit' class='btn btn-info btn-large' value='Modifier'>
		<button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
	</div>

        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>

</body>
</html>