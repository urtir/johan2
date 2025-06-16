<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Database connection
$host = 'localhost';
$dbname = 'db_mapalutsista';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

if ($category_id <= 0) {
    echo json_encode(['error' => 'Invalid category ID']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT 
            id,
            type_code,
            type_name,
            description,
            unit_measurement
        FROM material_types 
        WHERE category_id = ?
        ORDER BY sort_order, type_name
    ");
    
    $stmt->execute([$category_id]);
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($types);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
