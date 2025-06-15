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
    
    $unitId = isset($_GET['unit_id']) ? intval($_GET['unit_id']) : 0;
    
    if ($unitId <= 0) {
        echo json_encode(['error' => 'Invalid unit ID']);
        exit;
    }
    
    // Get category counts with proper joins
    $stmt = $pdo->prepare("
        SELECT 
            mc.id as category_id,
            mc.category_name,
            mc.category_code,
            COUNT(DISTINCT mt.id) as type_count,
            COUNT(DISTINCT ai.id) as inventory_count,
            COALESCE(SUM(ai.jumlah_total), 0) as total_count
        FROM material_categories mc
        LEFT JOIN material_types mt ON mc.id = mt.category_id
        LEFT JOIN alutsista_inventory ai ON mt.id = ai.material_type_id 
            AND ai.kostrad_unit_id = ? 
            AND ai.jumlah_total > 0
        GROUP BY mc.id, mc.category_name, mc.category_code
        ORDER BY mc.sort_order
    ");
    
    $stmt->execute([$unitId]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Debug: Log the query and results
    error_log("Category counts query for unit $unitId returned " . count($result) . " rows");
    
    echo json_encode($result);
    
} catch(PDOException $e) {
    error_log("Database error in get_material_category_counts: " . $e->getMessage());
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch(Exception $e) {
    error_log("General error in get_material_category_counts: " . $e->getMessage());
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>