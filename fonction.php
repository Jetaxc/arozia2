<?php
	//INSERT
function dbinsert($table, $tab_valeur){
	global $bdd;
	$tab_cles_en_ligne=array_keys($tab_valeur);
	$cles_en_ligne=implode(',', $tab_cles_en_ligne);
	$cles_avec_double_points=':'.str_replace(',', ', :', $cles_en_ligne);
	$req=$bdd->prepare('INSERT INTO '.$table.' ('.$cles_en_ligne.') VALUES ('.$cles_avec_double_points.')');
	$req->execute($tab_valeur);
	return $bdd->lastInsertId();
}

	//UPDATE
function dbupdate($table, $tab_valeur, $tab_where){
	global $bdd;
	$requete_en_ligne='';
	$tab_temp=array();
	foreach($tab_valeur as $key=>$value){
		$tab_temp[]= $key. '= :' .$key;
		
	}
		$requete_en_ligne=implode(', ', $tab_temp);
		
		
		$tab_temp_w=array();
	foreach($tab_where as $key=>$value){
		$tab_temp_w[]= $key. '= :' .$key;
		
	}
		$requetew_en_ligne=implode(', ', $tab_temp_w);
	

	
	$req=$bdd->prepare('UPDATE '.$table.' SET '.$requete_en_ligne.' WHERE '.$requetew_en_ligne);
	
	
	
	$tab_valeur_f=array_merge($tab_valeur, $tab_where);
	$req->execute($tab_valeur_f);
	return $req->rowCount();
}

    //SELECT
function dbselect($sql, $tab_valeurs='', $debug=false, $optnum=''){
    global $bdd;
    if (empty($tab_valeurs)){
        $req = $bdd->query($sql);
        }
    else{
        //$req = $bdd->prepare('SELECT titre, auteur FROM actualites WHERE visible = ?  AND date <= ? ORDER BY date');
        $req = $bdd->prepare($sql);
        $req->execute($tab_valeurs);
        }
    if ($optnum=='num') $donnees = $req->fetchAll(PDO::FETCH_NUM);//tableau associatif
    else $donnees = $req->fetchAll(PDO::FETCH_ASSOC);//tableau iteratif
    $req->closeCursor();
   
    return $donnees;
}

?>