<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

$host = 'localhost';
$dbname = 'db_mapalutsista';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $unitId = isset($_GET['unit_id']) ? intval($_GET['unit_id']) : 0;
    $categoryId = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
    
    if ($unitId <= 0 || $categoryId <= 0) {
        echo json_encode(['error' => 'Invalid unit ID or category ID']);
        exit;
    }
    
    $stmt = $pdo->prepare("
        SELECT 
            mt.type_name,
            mt.unit_measurement,
            COALESCE(ai.jumlah_total, 0) as jumlah_total,
            COALESCE(ai.kondisi_b, 0) as kondisi_b,
            COALESCE(ai.kondisi_rr, 0) as kondisi_rr,
            COALESCE(ai.kondisi_rb, 0) as kondisi_rb,
            COALESCE(ai.persentase_kesiapan, 0) as persentase_kesiapan
        FROM material_types mt
        LEFT JOIN alutsista_inventory ai ON mt.id = ai.material_type_id AND ai.kostrad_unit_id = ?
        WHERE mt.category_id = ?
        ORDER BY mt.sort_order
    ");
    
    $stmt->execute([$unitId, $categoryId]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Filter only items that have inventory data
    $filtered_result = array_filter($result, function($item) {
        return $item['jumlah_total'] > 0;
    });
    
    echo json_encode(array_values($filtered_result));
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch(Exception $e) {
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>
