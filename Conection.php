<?php
try {
    $pdo = new PDO('mysql:host=containers-us-west-186.railway.app;port=7232;dbname=railway;user=root;password=yM8t5TtYJXTsfEafIzdS');
} catch (PDOException $e) {
    var_dump($e->getMessage());
}