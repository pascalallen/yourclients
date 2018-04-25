<?php
require 'db_connect.php';
$truncate_all = 'TRUNCATE clients';
$dbc->exec($truncate_all);
$clients = [
    ['name' => 'Acadia', 'user_id' => 1],
    ['name' => 'American Samoa', 'user_id' => 1],
    ['name' => 'Arches', 'user_id' => 1],
    ['name' => 'Badlands', 'user_id' => 1],
    ['name' => 'Big Bend', 'user_id' => 1],
    ['name' => 'Biscayne', 'user_id' => 1],
    ['name' => 'Bryce Canyon', 'user_id' => 1],
    ['name' => 'Canyonlands', 'user_id' => 1],
    ['name' => 'Capitol Reef', 'user_id' => 1],
    ['name' => 'Carlsbad Caverns', 'user_id' => 1]
];
foreach ($clients as $client) {
    $create_table = "INSERT INTO clients (name, user_id) VALUES (:name, :user_id)";
    $stmt = $dbc->prepare($create_table);
    $stmt->bindValue(':name', $client['name'], PDO::PARAM_STR);
    $stmt->bindValue(':user_id', $client['user_id'], PDO::PARAM_STR);
    $stmt->execute();
}