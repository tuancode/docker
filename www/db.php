<?php
/**
 * This file is used for database connection testing
 */

$host = 'mysql';
$user = 'root';
$pass = 'root';

/* check connection */
try {
    $conn = new PDO("mysql:host=$host", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = 'show databases';
$results = $conn->query($sql);
?>

<h1>Hello Docker!</h1>

<h4>Available Databases:</h4>

<ul>
    <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
        <li><?= $row['Database'] ?></li>
    <?php endwhile ?>
</ul>
