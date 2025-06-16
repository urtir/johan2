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
    
    $stmt = $pdo->query("
        SELECT 
            mc.id as category_id,
            mc.category_name,
            mc.category_code,
            SUM(COALESCE(ai.jumlah_total, 0)) as total_count,
            SUM(COALESCE(ai.kondisi_b, 0)) as total_b,
            SUM(COALESCE(ai.kondisi_rr, 0)) as total_rr,
            SUM(COALESCE(ai.kondisi_rb, 0)) as total_rb
        FROM material_categories mc
        LEFT JOIN material_types mt ON mc.id = mt.category_id
        LEFT JOIN alutsista_inventory ai ON mt.id = ai.material_type_id
        LEFT JOIN kostrad_units ku ON ai.kostrad_unit_id = ku.id
        WHERE (ku.unit_type = 'DIVISI' OR ku.unit_name LIKE '%KOSTRAD%' OR ku.unit_code LIKE '%DIV%')
        GROUP BY mc.id, mc.category_name, mc.category_code
        HAVING total_count > 0
        ORDER BY mc.sort_order
    ");
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
} catch(Exception $e) {
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>
