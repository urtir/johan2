<?php
require_once 'config.php';

try {
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    
    // Base query
    $sql = "SELECT 
                DATE(a.tanggal_input) as event_date,
                COUNT(*) as total_alutsista,
                SUM(CASE WHEN a.kondisi = 'Baik' THEN 1 ELSE 0 END) as baik,
                SUM(CASE WHEN a.kondisi = 'Rusak Ringan' THEN 1 ELSE 0 END) as rusak_ringan,
                SUM(CASE WHEN a.kondisi = 'Rusak Berat' THEN 1 ELSE 0 END) as rusak_berat
            FROM alutsista a";
    
    // Add filter condition
    if ($filter === 'kostrad') {
        $sql .= " JOIN satuan s ON a.satuan_id = s.id 
                  JOIN divisi d ON s.divisi_id = d.id 
                  WHERE d.nama_divisi = 'KOSTRAD'";
    }
    
    $sql .= " GROUP BY DATE(a.tanggal_input)
              ORDER BY event_date";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $events = [];
    foreach ($results as $row) {
        $events[] = [
            'title' => "Total: {$row['total_alutsista']} | Baik: {$row['baik']} | RR: {$row['rusak_ringan']} | RB: {$row['rusak_berat']}",
            'start' => $row['event_date'],
            'backgroundColor' => '#28a745',
            'borderColor' => '#28a745',
            'textColor' => '#fff',
            'extendedProps' => [
                'total' => $row['total_alutsista'],
                'baik' => $row['baik'],
                'rusak_ringan' => $row['rusak_ringan'],
                'rusak_berat' => $row['rusak_berat']
            ]
        ];
    }
    
    header('Content-Type: application/json');
    echo json_encode($events);
    
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
