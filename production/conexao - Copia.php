<?php

$conn = array(
    'user' => 'root',
    'pass' => '',
    'host' => 'localhost',
    'db' => 'tpe'
);
if (is_array($conn)) {
    try {
        $db = @new PDO(
                "mysql:host={$conn['host']};dbname={$conn['db']}", $conn['user'], $conn['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    } catch (PDOException $e) {
        echo json_encode(array(
            "error" => "An error occurred while connecting to the database. " .
            "The error reported by the server was: " . $e->getMessage()
        ));
        exit(0);
    }
}
?>
