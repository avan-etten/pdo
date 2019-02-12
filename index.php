<?php
/**
 * Created by PhpStorm.
 * User: Vanteet
 * Date: 2/11/2019
 * Time: 10:30 PM
 */

//Connect to DB
require '/home/avanette/config.php';
try {
    //Instantiate a database object
        $dbh= new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
       echo 'Connected to database!';
}
catch(PDOException$e) {
    echo$e->getMessage();
}
//define query
$sql = "INSERT INTO pets(type, name, color)
        VALUES (:type, :name, :color)";

//prepare statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//execute
$statement->execute();