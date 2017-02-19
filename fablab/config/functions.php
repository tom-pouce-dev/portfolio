<?php


//on cree une fonction qui traduit les dates du format informatique vers le format EU
//$date correspond a la date a traduire
//$heure correspond a vrai ou faux, si l'on veut avoir l'heure
//par default, on n'affiche pas l'heure
function dateEU($date, $heure = false){

	//si la date est vide
	if( $date == ''){
		return 'nc';
	}else{
		//on construit l'objet temps qui correspond a la date qu'on veut
		$t = new DateTime($date);

		//si on veut l'heure (ie si $heure vaut true)
		if($heure){

			//on retourne avec le format qui contient l'heure
			return date_format($t, 'd/m/Y, à H:i:s');

		//sinon
		}else{

			//on retourne avec le format sans l'heure
			return date_format($t, 'd/m/Y');

		//fin du test
		}

	}

}

/* Afficher juste le jour et le mois */
function dateMonth($date){
    
	//si la date est vide
	if( $date == ''){
		return 'nc';
	}else{
		$t = new DateTime($date);
		
		$mois = array('', 'janv.', 'févr.', 'mars', 'avr.', 'mai', 'juin', 'juill.', 'août', 'sept.', 'oct.', 'nov.', 'déc.');
        $m = date_format($t, 'm');
        $m = intval($m);
		return date_format($t, 'd').' '.$mois[$m];
	}
}

/* Fonction qui delete les nl2br pour l'edit */
function nl2Delete($subject){
    return str_replace('<br />', "", $subject);
}

/* on cree une fonction qui calcule le chemin vers le fichier image a afficher */
function couverture($imgTexte, $back = false){
	$chemin = '';

	//si on est sur le backoffice
	if($back){
		$chemin = '../';
	}

	//si $cover  est vide
	if( $imgTexte == '')

		//on donne l'adresse de empty
		return $chemin.'data/empty.jpg';

	//sinon
	else
		//on donne l'adresse du fichier image
		return $chemin.$imgTexte;
}

/*
 * on cree une fonction qui crypte, salt, et re-crypte une chaine de caratere passee en parametre
 */
function crypte($mot){
	return hash('sha512', hash('sha512', $mot).'MOT');
}

//Couper une chaine de caracter apres un espace
function tronquer($description,$max_caracteres) {

	if (strlen($description)>$max_caracteres) {    

		$description = substr($description, 0, $max_caracteres);

		$position_espace = strrpos($description, " ");    
		$description = substr($description, 0, $position_espace);    

		$description = $description." [...]";
	}
	return $description;
}

//fonction pour vérifier contenu dossier
function EtatDuRepertoire($dossier){
	
	$fichierTrouve=0;

	if ($dh = opendir($dossier)) {
		while (($file = readdir($dh)) !== false && $fichierTrouve==0) {
			if ($file!="." && $file!=".." ) {
				$fichierTrouve=1;
			}
		}
		closedir($dh);
	}
	if ($fichierTrouve==0) {
		rmdir($dossier);
	}
}
