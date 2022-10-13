<?php

function getFormations(){
    $pdo = getConnexion();    //Je récupère mon instance de pdo
    $req = "SELECT f.id, f.libelle, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id = c.id";                  
    $stmt = $pdo->prepare($req);    //Prepares a statement for execution (to be executed by the PDOStatement::execute() method) and returns a statement object
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC); //Fetches the remaining rows from a result set.  returns an array containing all of the remaining rows in the result set. The array represents each row as either an array of column values or an object with properties corresponding to each column name. An empty array is returned if there are zero results to fetch.
    $stmt->closeCursor();
    sendJSON($formations);
}
function getFormationsByCategorie($categorie){
    $pdo = getConnexion();    
    $req = "SELECT f.id, f.libelle, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id = c.id WHERE c.libelle = :categorie";                  
    $stmt = $pdo->prepare($req);   
    $stmt->bindValue(":categorie",$categorie,PDO::PARAM_STR);   //Permet de faire la liaison entre la variable sql :categorie et notre variable de fonction $categorie
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor();
    sendJSON($formations);
}
function getFormationById($id){
    $pdo = getConnexion();    
    $req = "SELECT f.id, f.libelle, c.libelle as 'categorie' from formation f inner join categorie c on f.categorie_id = c.id  WHERE f.id = :id";                  
    $stmt = $pdo->prepare($req);   
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $formations = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    $stmt->closeCursor();
    sendJSON($formations);
}

function getConnexion(){    //connexion à la BD
    return new PDO("mysql:host=localhost;dbname=fh2prog;charset=utf8","root","");    //PDO stands for PHP Data Objects -->est une extension définissant l'interface pour accéder à une base de données avec PHP. Le username --> root et le passowrd --> "" quand on utilises xampp par défaut
}

function sendJSON($infos){ //Quand on récupère nos datas on veut ensuite les envoyer, au format JSON
    header("Access-Control-Allow-Origin: *");   //On indique qui peut accéder à la ressource (dans notre cas, tout le monde. On pourra mettre une adresse spécifique à la place de * pour d'autres projets)
    header("Content-Type: application/json");   //On indique quel est le tyoe de données qu'on envoie 
    echo json_encode($infos,JSON_UNESCAPED_UNICODE); //pour envoyer les infos il suffit de les afficher à l'écran. Le deuxième paramètre permet de ne pas avoir de problème avec les accents et d'autres caractères problématiques
}