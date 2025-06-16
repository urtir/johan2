<?php
// filepath: /workspaces/johan2/api/get_material_category_data.php
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

// Get parameters from request
$unit_id = isset($_GET['unit_id']) ? (int)$_GET['unit_id'] : 0;
$category_id = isset($_GET['category_id']) ? (int)$_GET['category_id'] : 0;

if ($unit_id <= 0 || $category_id <= 0) {
    echo json_encode(['error' => 'Invalid unit ID or category ID']);
    exit;
}

try {
    // Get material data for the specified unit and category
    $stmt = $pdo->prepare("
        SELECT 
            ai.id,
            ai.kostrad_unit_id,
            ai.material_type_id,
            ai.jumlah_total,
            ai.kondisi_b,
            ai.kondisi_rr,
            ai.kondisi_rb,
            ai.persentase_kesiapan,
            ai.keterangan,
            mt.type_name,
            mt.type_code,
            mt.description as type_description,
            mt.unit_measurement,
            mc.category_name,
            mc.category_code,
            ku.unit_name,
            ku.unit_code
        FROM alutsista_inventory ai
        JOIN material_types mt ON ai.material_type_id = mt.id
        JOIN material_categories mc ON mt.category_id = mc.id
        JOIN kostrad_units ku ON ai.kostrad_unit_id = ku.id
        WHERE ai.kostrad_unit_id = ? 
        AND mc.id = ?
        AND ai.jumlah_total > 0
        ORDER BY mt.sort_order, mt.type_name
    ");
    
    $stmt->execute([$unit_id, $category_id]);
    $material_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Log the query for debugging
    error_log("Material Category Query for unit $unit_id, category $category_id: Found " . count($material_data) . " records");
    
    echo json_encode($material_data);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
} catch(Exception $e) {
    error_log("General error in get_material_category_data: " . $e->getMessage());
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>