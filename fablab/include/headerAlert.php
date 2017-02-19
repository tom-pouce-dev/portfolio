<div class="l-col-12">
<?php

/*******************************/
/*********** ALERTES ***********/
/*******************************/

if( isset($_GET['homeUpdated'])){ // home
	echo '<p class="alert-success">L\'article présent sur la home a été modifié</p>';
}

if( isset($_GET['titleEmpty'])){ //actu
	echo '<p class="alert-danger">Le titre est obligatoire</p>';
}

if( isset($_GET['leadEmpty'])){ //actu
	echo '<p class="alert-danger">Le chapeau est obligatoire</p>';
}

if( isset($_GET['contentEmpty'])){ //actu
	echo '<p class="alert-danger">Le contenu est obligatoire</p>';
}

if( isset($_GET['fileError'])){ //actu
	echo '<p class="alert-danger">Ce fichier n\'est pas valide (1Mo max, au format jpg, jpeg, png ou gif).</p>';
}

if( isset($_GET['actuAdded'])){ //actu
	echo '<p class="alert-success">L\'actualité a bien été ajouté</p>';
}
	
if( isset($_GET['activiteAdded'])){ //activite
	echo '<p class="alert-success">L\'activité a bien été ajouté</p>';
}

if( isset($_GET['contentEdited'])){ // equipement
	echo '<p class="alert-success">La modificiation a été prise en compte</p>';
}

if( isset($_GET['extensionError'])){ //all
	echo '<p class="alert-danger">Le type de fichier n\'est pas bon</p>';
}

if( isset($_GET['imageEmpty'])){ //equipement
	echo '<p class="alert-danger">L\'ajout d\'une image est obligatoire</p>';
}

if( isset($_GET['machineEmpty'])){
	echo '<p class="alert-danger">Le nom de la machine est obligatoire</p>';
}

if( isset($_GET['ficheEmpty'])){
	echo '<p class="alert-danger">La description de la machine est obligatoire</p>';
}

if( isset($_GET['equipementAdded'])){
	echo '<p class="alert-success">La machine a bien été ajouté</p>';
}

if( isset($_GET['equipementDeleted'])){
	echo '<p class="alert-success">La machine a bien été supprimé</p>';
}

if( isset($_GET['actualiteDeleted'])){
	echo '<p class="alert-success">L\'actualité a bien été supprimé</p>';
}

if( isset($_GET['activiteDeleted'])){
	echo '<p class="alert-success">L\'activité a bien été supprimé</p>';
}

if( isset($_GET['adressEmpty'])){
	echo '<p class="alert-danger">L\'adresse est obligatoire</p>';
}

if( isset($_GET['phoneEmpty'])){
	echo '<p class="alert-danger">Le téléphone est obligatoire</p>';
}

if( isset($_GET['openedEmpty'])){
	echo '<p class="alert-danger">Les horraires sont obligatoires</p>';
}

if( isset($_GET['enteteEmpty'])){
	echo '<p class="alert-danger">Les entêtes sont obligatoires</p>';
}

if( isset($_GET['nameEmpty'])){
	echo '<p class="alert-danger">Le nom est obligatoire</p>';
}

if( isset($_GET['logoEmpty'])){
	echo '<p class="alert-danger">Le logo est obligatoire</p>';
}

if( isset($_GET['logoEmpty'])){
	echo '<p class="alert-success">Le partenaire a bien été ajouté</p>';
}

if( isset($_GET['partenaireDeleted'])){
	echo '<p class="alert-success">Le partenaire a bien été supprimé</p>';
}

if( isset($_GET['passwordUnknown'])){
	echo '<p class="alert-danger">Le mot de passe actuel est incorrect</p>';
}

if( isset($_GET['passwordEmpty'])){
	echo '<p class="alert-danger">Veuillez mettre un nouveau mot de passe</p>';
}

if( isset($_GET['passwordUpdated'])){
	echo '<p class="alert alert-success">Le mot de passe a bien été modifié</p>';
}

if( isset($_GET['confirmationPassword'])){
	echo '<p class="alert alert-danger">Le mot de passe et la confirmation ne correspondent pas</p>';
}

if( isset($_GET['passworbdEmpty']) && isset($_GET['existingUser'])){
	echo '<p class="alert alert-danger">Ce pseudo est déjà utilisé et le mot de passe est obligatoire</p>';
}else{
	if( isset($_GET['existingUser'])){
		echo '<p class="alert alert-danger">Ce pseudo est déjà utilisé</p>';
	}
	if( isset($_GET['pseudoEmpty'])){
		echo '<p class="alert alert-danger">Choisissez un pseudo</p>';
	}
	if( isset($_GET['passworbdEmpty'])){
		echo '<p class="alert alert-danger">Veuillez ajouter un mot de passe</p>';
	}
}

if( isset($_GET['userAdded'])){
	echo '<p class="alert alert-success">Un modérateur a bien été ajouté</p>';
}

if( isset($_GET['userDeleted'])){
	echo '<p class="alert alert-success">Le modérateur a bien été supprimé</p>';
}
	
if( isset($_GET['catEmpty'])){
	echo '<p class="alert alert-danger">Le nom de catégorie est obligatoire</p>';
}

if( isset($_GET['catAdded'])){
	echo '<p class="alert alert-success">La catégorie a bien été ajouté</p>';
}
	
if( isset($_GET['catDeleted'])){
	echo '<p class="alert alert-success">La catégorie a bien été supprimé</p>';
}
	
if( isset($_GET['albEmpty'])){
	echo '<p class="alert alert-danger">Le nom de l\'album est obligatoire</p>';
}

if( isset($_GET['albAdded'])){
	echo '<p class="alert alert-success">L\'album a bien été ajouté</p>';
}

if( isset($_GET['albDeleted'])){
	echo '<p class="alert alert-success">L\'album a bien été supprimé</p>';
}

if( isset($_GET['apercuEdited'])){
	echo '<p class="alert alert-success">L\'image d\'aperçu de l\'album a bien été modifié</p>';
}

if( isset($_GET['imgDeleted'])){
	echo '<p class="alert alert-success">L\'album a été mis à jour</p>';
}

if( isset($_GET['imgAdded'])){
	echo '<p class="alert alert-success">Les images ont été bien été ajoutés</p>';
}

if( isset($_GET['selectImg'])){
	echo '<p class="alert alert-danger">Veuillez sélectionner au moins une image</p>';
}
	
if( isset($_GET['socialEdited'])){
	echo '<p class="alert alert-success">Les médias sociaux ont bien été modifié</p>';
}

if( isset($_GET['maxSize'])){
	echo '<p class="alert alert-danger">Le fichier envoyé est trop grand</p>';
}

if( isset($_GET['textEmpty'])){
	echo '<p class="alert alert-danger">Les contenus de la section "Que peut-on y faire" sont obligatoires</p>';
}

?></div>

