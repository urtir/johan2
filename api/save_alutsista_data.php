<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
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

// Get JSON data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data || !isset($data['data']) || !is_array($data['data'])) {
    echo json_encode(['error' => 'Invalid data format']);
    exit;
}

try {
    $pdo->beginTransaction();
    
    $stmt = $pdo->prepare("
        INSERT INTO alutsista_inventory (
            kostrad_unit_id,
            material_type_id,
            jumlah_total,
            kondisi_b,
            kondisi_rr,
            kondisi_rb,
            persentase_kesiapan,
            keterangan,
            created_at,
            last_updated
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())
        ON DUPLICATE KEY UPDATE
            jumlah_total = VALUES(jumlah_total),
            kondisi_b = VALUES(kondisi_b),
            kondisi_rr = VALUES(kondisi_rr),
            kondisi_rb = VALUES(kondisi_rb),
            persentase_kesiapan = VALUES(persentase_kesiapan),
            keterangan = VALUES(keterangan),
            last_updated = NOW()
    ");
    
    $saved_count = 0;
    
    foreach ($data['data'] as $item) {
        $stmt->execute([
            $item['unit_id'],
            $item['material_type_id'],
            $item['jumlah_total'],
            $item['kondisi_b'],
            $item['kondisi_rr'],
            $item['kondisi_rb'],
            $item['persentase_kesiapan'],
            $item['keterangan']
        ]);
        $saved_count++;
    }
    
    $pdo->commit();
    
    echo json_encode([
        'success' => true,
        'saved_count' => $saved_count,
        'message' => "Successfully saved $saved_count items"
    ]);
    
} catch(PDOException $e) {
    $pdo->rollback();
    echo json_encode(['error' => 'Database save failed: ' . $e->getMessage()]);
} catch(Exception $e) {
    $pdo->rollback();
    echo json_encode(['error' => 'General error: ' . $e->getMessage()]);
}
?>
