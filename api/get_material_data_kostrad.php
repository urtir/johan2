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
    
    $categoryId = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;
    
    if ($categoryId <= 0) {
        echo json_encode(['error' => 'Invalid category ID']);
        exit;
    }
    
    $stmt = $pdo->prepare("
        SELECT 
            mt.type_name,
            mt.unit_measurement,
            SUM(COALESCE(ai.jumlah_total, 0)) as jumlah_total,
            SUM(COALESCE(ai.kondisi_b, 0)) as kondisi_b,
            SUM(COALESCE(ai.kondisi_rr, 0)) as kondisi_rr,
            SUM(COALESCE(ai.kondisi_rb, 0)) as kondisi_rb,
            CASE 
                WHEN SUM(COALESCE(ai.jumlah_total, 0)) > 0 
                THEN ROUND((SUM(COALESCE(ai.kondisi_b, 0)) / SUM(COALESCE(ai.jumlah_total, 0))) * 100, 2)
                ELSE 0 
            END as persentase_kesiapan
        FROM material_types mt
        LEFT JOIN alutsista_inventory ai ON mt.id = ai.material_type_id
        LEFT JOIN kostrad_units ku ON ai.kostrad_unit_id = ku.id
        WHERE mt.category_id = ?
        AND (ku.unit_type = 'DIVISI' OR ku.unit_name LIKE '%KOSTRAD%' OR ku.unit_code LIKE '%DIV%')
        GROUP BY mt.id, mt.type_name, mt.unit_measurement
        HAVING jumlah_total > 0
        ORDER BY mt.sort_order, mt.type_name
    ");
    
    $stmt->execute([$categoryId]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch(Exception $e) {
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>
