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