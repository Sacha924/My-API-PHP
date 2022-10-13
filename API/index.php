<?php
require_once("transferData.php");

// différents points d'entrées : 
//www.monsite.fr/formations                                             FirstEntryPoint
//www.monsite.fr/formations/:caté (:caté = php, solidity, etc)          SecondEntryPoint
//www.monsite.fr/formation/:id
//En réalité on va les traiter de la façon suivante : //www.monsite.fr/index.php?demande=formations Pour cela on a besoin d'un fichier htaccess

try{
    if(!empty($_GET["demande"])){
        $url = explode("/", filter_var($_GET["demande"], FILTER_SANITIZE_URL));        //It's like a .split("/") in other languages. The FILTER_SANITIZE_URL filter removes all illegal URL characters from a string.
        // explode(string $separator, string $string, int $limit = PHP_INT_MAX): array
        switch($url[0]) {
            case "formations":
                if(empty($url[1])){     //FirstEntryPoint
                    getFormations();
                } else{                 //SecondEntryPoint
                    getFormationsByCategorie($url[1]);
                }
            break;
            case "formation":
                if(!empty($url[1])){ 
                    getFormationById($url[1]);
                }else{
                    throw new Exception ("Demande non valide, l'id de la formation n'estpas renseigné");
                }
            break;
            default: throw new Exception ("Demande non valide, erreur d'url?");
            
        }

    }else{
        throw new Exception ("Problème de récupérations de données. "); 
    }
}
catch(Exception $e){
    $erreur = [
        "message" => $e -> getMessage(),    //The getMessage() method returns a description of the error or behaviour that caused the exception to be thrown.
        "code" => $e -> getCode()           // Gets the Exception code
    ];
    print_r($erreur);                       //print_r() affiche des informations à propos d'une variable, de manière à ce qu'elle soit lisible.

}