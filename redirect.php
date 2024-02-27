<?php
session_start();

// Get the shortened URL from the request URI
$request_uri = $_SERVER['REQUEST_URI'];
$url = explode('/', $request_uri);
$shortened_url = isset($url[2]) ? $url[2] : '';


if ($shortened_url === '') {
    echo "Invalid shortened URL.";
    exit();
}


try {
    $pdo = new PDO('mysql:host=localhost;dbname=url_shortener_db', 'root', 'TonePave66$');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    exit();
}

// Prepare and execute the SQL query using a prepared statement
$stmt = $pdo->prepare("SELECT original_url FROM urls WHERE short_code = :shortened_url");
$stmt->bindParam(':shortened_url', $shortened_url);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the original URL exists in the database
if ($result && isset($result['original_url'])) {
    
    // Perform the redirection
    header("Location: " . $result['original_url']);
    exit();
} else {
    header("Location: " . "not_found.html");
    exit();
}
?>
