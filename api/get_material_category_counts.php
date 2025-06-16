<?php
// filepath: /workspaces/johan2/api/get_material_category_counts.php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Get unit_id from request
$unit_id = isset($_GET['unit_id']) ? (int)$_GET['unit_id'] : 0;

if ($unit_id <= 0) {
    echo json_encode(['error' => 'Invalid unit ID']);
    exit;
}

try {
    // Get category counts for the specified unit
    $stmt = $pdo->prepare("
        SELECT 
            mc.id as category_id,
            mc.category_name,
            mc.category_code,
            COUNT(DISTINCT ai.material_type_id) as type_count,
            SUM(ai.jumlah_total) as total_count,
            SUM(ai.kondisi_b) as total_b,
            SUM(ai.kondisi_rr) as total_rr,
            SUM(ai.kondisi_rb) as total_rb
        FROM material_categories mc
        LEFT JOIN material_types mt ON mc.id = mt.category_id
        LEFT JOIN alutsista_inventory ai ON mt.id = ai.material_type_id AND ai.kostrad_unit_id = ?
        GROUP BY mc.id, mc.category_name, mc.category_code
        HAVING total_count > 0
        ORDER BY mc.sort_order
    ");
    
    $stmt->execute([$unit_id]);
    $category_counts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Log the query for debugging
    error_log("Category Counts Query for unit $unit_id: Found " . count($category_counts) . " categories");
    
    echo json_encode($category_counts);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
} catch(Exception $e) {
    error_log("General error in get_material_category_counts: " . $e->getMessage());
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>