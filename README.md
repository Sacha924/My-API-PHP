# My-API-PHP





Objectif : créer une api php afin de mieux comprendre le langage, et créer un site web qui récupère les données proposées par l’API.


------------------------------------------------------------------------------------------------------------------------------------------------------------


transferData.php : Fichier pour la récupération et l'affichage data

index.php : Fichier servant à gérer les demandes recus via les url, i.e mon fichier de rootage 


Vous aurez besoin d'une database pour faire fonctionner le code : à ligne 34 du fichier transferData est établie la connexion avec cette database :
return new PDO("mysql:host=localhost;dbname=fh2prog;charset=utf8","root","");

Le code ayant permis de créer la DB se trouve dans le fichier BD.sql que vous pouvez directement importer (xampp --> start MySQL --> admin button) 
