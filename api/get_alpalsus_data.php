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

// Get unit_id from request
$unit_id = isset($_GET['unit_id']) ? (int)$_GET['unit_id'] : 0;

if ($unit_id <= 0) {
    echo json_encode(['error' => 'Invalid unit ID']);
    exit;
}

try {
    // Get ALPALSUS data (category_id = 6)
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
        AND mc.category_code = 'ALPALSUS'
        AND ai.jumlah_total > 0
        ORDER BY mt.sort_order, mt.type_name
    ");
    
    $stmt->execute([$unit_id]);
    $alpalsus_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // If no specific ALPALSUS data found, create summary from all ALPALSUS items
    if (empty($alpalsus_data)) {
        // Check if there are any ALPALSUS items at all for this unit
        $stmt = $pdo->prepare("
            SELECT 
                SUM(ai.jumlah_total) as total_items,
                SUM(ai.kondisi_b) as total_b,
                SUM(ai.kondisi_rr) as total_rr,
                SUM(ai.kondisi_rb) as total_rb,
                ku.unit_name,
                ku.unit_code
            FROM alutsista_inventory ai
            JOIN material_types mt ON ai.material_type_id = mt.id
            JOIN material_categories mc ON mt.category_id = mc.id
            JOIN kostrad_units ku ON ai.kostrad_unit_id = ku.id
            WHERE ai.kostrad_unit_id = ? 
            AND mc.category_code = 'ALPALSUS'
            GROUP BY ku.id, ku.unit_name, ku.unit_code
        ");
        
        $stmt->execute([$unit_id]);
        $summary = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($summary && $summary['total_items'] > 0) {
            // Calculate percentage
            $persentase = ($summary['total_items'] > 0) ? 
                ($summary['total_b'] / $summary['total_items'] * 100) : 0;
            
            $alpalsus_data = [[
                'id' => 0,
                'kostrad_unit_id' => $unit_id,
                'material_type_id' => 0,
                'jumlah_total' => $summary['total_items'],
                'kondisi_b' => $summary['total_b'],
                'kondisi_rr' => $summary['total_rr'],
                'kondisi_rb' => $summary['total_rb'],
                'persentase_kesiapan' => number_format($persentase, 2),
                'keterangan' => 'Summary ALPALSUS',
                'type_name' => 'ALPALSUS (Alat Palsu Sus)',
                'type_code' => 'ALPALSUS_SUMMARY',
                'type_description' => 'Summary semua item ALPALSUS',
                'unit_measurement' => 'unit',
                'category_name' => 'Alpalsus',
                'category_code' => 'ALPALSUS',
                'unit_name' => $summary['unit_name'],
                'unit_code' => $summary['unit_code']
            ]];
        }
    }
    
    // Log the query for debugging
    error_log("ALPALSUS Query for unit $unit_id: Found " . count($alpalsus_data) . " records");
    
    echo json_encode($alpalsus_data);
    
} catch(PDOException $e) {
    echo json_encode(['error' => 'Database query failed: ' . $e->getMessage()]);
}
?>
