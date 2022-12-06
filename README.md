# My-API-PHP





Objective: create a php api in order to better understand the language, and create a website that retrieves the data proposed by the API.


------------------------------------------------------------------------------------------------------------------------------------------------------------


transferData.php : File for data retrieval and display

index.php : File used to manage the requests received via the url, i.e. my rootage file 


You will need a database to run the code: at line 34 of the file transferData is established the connection with this database:
return new PDO("mysql:host=localhost;dbname=fh2prog;charset=utf8","root","");

The code used to create the DB is in the BD.sql file that you can directly import (xampp --> start MySQL --> admin button) 
