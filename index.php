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
/*$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//execute
$statement->execute();*/

//Bind the parameters
$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Bind the parameters
$type = 'snake';
$name = 'Monty';
$color = 'white';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Bind the parameters
$type = 'boar';
$name = 'Stringles';
$color = 'brown';
$statement->bindParam(':type', $type, PDO::PARAM_STR);
$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

//execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully.</p>";

//Define the query
$sql= "UPDATE pets SET color = :new WHERE name = :pet";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Bind the parameters
$pet = 'Oscar';
$new = 'brown';
$statement->bindParam(':pet', $pet, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);
//Execute
$statement->execute();

//Define the query
$sql="SELECT * FROM petOwners INNER JOIN pets ON petOwners.petId = pets.id";
//Prepare the statement
$statement = $dbh->prepare($sql);
//Execute the statement
$statement->execute();
//Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo "<table>";
foreach($result as $row) {
    echo "<tr><td>".$row['first']." ".$row['last']."</td><td>".$row['name'] . "</td><td>" . $row['color']. "</td></tr>";
}
echo "</table>";
