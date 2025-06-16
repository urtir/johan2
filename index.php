<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

<?php
// Database connection
$host = 'localhost';
$dbname = 'db_mapalutsista';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Get statistics
try {
    // Total units per category
    $stmt = $pdo->query("
        SELECT 
            tc.code,
            tc.name,
            tc.color_code,
            COUNT(tu.id) as total_units
        FROM tni_categories tc
        LEFT JOIN unit_types ut ON tc.id = ut.category_id
        LEFT JOIN tni_units tu ON ut.id = tu.unit_type_id AND tu.status = 'active'
        GROUP BY tc.id, tc.code, tc.name, tc.color_code
        ORDER BY tc.id
    ");
    $categoryStats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Total all units
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM tni_units WHERE status = 'active'");
    $totalUnits = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Units by hierarchy level
    $stmt = $pdo->query("
        SELECT 
            ut.hierarchy_level,
            ut.name as unit_type,
            COUNT(tu.id) as count
        FROM unit_types ut
        LEFT JOIN tni_units tu ON ut.id = tu.unit_type_id AND tu.status = 'active'
        GROUP BY ut.hierarchy_level, ut.name
        ORDER BY ut.hierarchy_level
    ");
    $hierarchyStats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get all units for map
    $stmt = $pdo->query("
        SELECT 
            tu.id,
            tu.name,
            tu.code,
            tu.address,
            tu.latitude,
            tu.longitude,
            tc.code as category_code,
            tc.name as category_name,
            tc.color_code,
            ut.name as unit_type_name,
            ut.code as unit_type_code,
            ut.hierarchy_level,
            p.name as province_name,
            c.name as city_name
        FROM tni_units tu
        JOIN unit_types ut ON tu.unit_type_id = ut.id
        JOIN tni_categories tc ON ut.category_id = tc.id
        JOIN provinces p ON tu.province_id = p.id
        JOIN cities c ON tu.city_id = c.id
        WHERE tu.status = 'active'
        ORDER BY tc.id, ut.hierarchy_level, tu.name
    ");
    $allUnits = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e) {
    $categoryStats = [];
    $totalUnits = 0;
    $hierarchyStats = [];
    $allUnits = [];
}
?>

<head>
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Dashboard TNI Mapping System')); ?>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" 
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" 
          crossorigin=""/>
    
    <!-- Leaflet MarkerCluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    
    <!-- Custom TNI Dashboard CSS -->
    <link href="assets/css/tni-dashboard.css" rel="stylesheet" />

    <?php include 'partials/head-css.php'; ?>
</head>

<?php include 'partials/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'partials/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'TNI Mapping System' , 'title' => 'Dashboard')); ?>
                
                <!-- Map Section -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Peta Sebaran Satuan TNI</h5>
                                    <div class="map-controls">
                                        <button class="btn btn-sm btn-outline-primary" onclick="showAllUnits()">
                                            <i class="fas fa-globe"></i> Tampilkan Semua
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary" onclick="resetMapView()">
                                            <i class="fas fa-home"></i> Reset View
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- Map Legend -->
                                <div class="map-legend mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="legend-item">
                                                <span class="legend-marker" style="background-color: #28a745;"></span>
                                                <span class="legend-text">TNI Angkatan Darat</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="legend-item">
                                                <span class="legend-marker" style="background-color: #17a2b8;"></span>
                                                <span class="legend-text">TNI Angkatan Laut</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="legend-item">
                                                <span class="legend-marker" style="background-color: #ffc107;"></span>
                                                <span class="legend-text">TNI Angkatan Udara</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Map Container -->
                                <div id="indonesiaMap" style="height: 600px; border-radius: 8px;"></div>
                                
                                <!-- Map Info -->
                                <div class="map-info mt-3">
                                    <div class="row text-center">
                                        <div class="col-md-3">
                                            <h6 class="text-muted mb-1">Satuan Ditampilkan</h6>
                                            <h4 class="text-primary mb-0" id="displayedUnitsCount"><?php echo $totalUnits; ?></h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h6 class="text-muted mb-1">Provinsi</h6>
                                            <h4 class="text-success mb-0" id="provincesCount">0</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h6 class="text-muted mb-1">Filter Aktif</h6>
                                            <h4 class="text-warning mb-0" id="activeFilter">Semua</h4>
                                        </div>
                                        <div class="col-md-3">
                                            <h6 class="text-muted mb-1">Zoom Level</h6>
                                            <h4 class="text-info mb-0" id="zoomLevel">5</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TNI Categories Selection -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Pilih Matra TNI</h5>
                                <div class="row">
                                    <!-- TNI AD -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card tni-category-card tni-ad-card" id="card-AD" onclick="showCategorySubmenu('AD')">
                                            <div class="card-body">
                                                <div class="tni-category-content">
                                                    <div class="tni-category-icon">
                                                        <i class="fas fa-shield-alt"></i>
                                                    </div>
                                                    <h4 class="tni-category-title">TNI Angkatan Darat</h4>
                                                    <p class="tni-category-subtitle">
                                                        <?php echo isset($categoryStats[0]) ? $categoryStats[0]['total_units'] : 0; ?> Satuan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TNI AL -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card tni-category-card tni-al-card" id="card-AL" onclick="showCategorySubmenu('AL')">
                                            <div class="card-body">
                                                <div class="tni-category-content">
                                                    <div class="tni-category-icon">
                                                        <i class="fas fa-anchor"></i>
                                                    </div>
                                                    <h4 class="tni-category-title">TNI Angkatan Laut</h4>
                                                    <p class="tni-category-subtitle">
                                                        <?php echo isset($categoryStats[1]) ? $categoryStats[1]['total_units'] : 0; ?> Satuan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TNI AU -->
                                    <div class="col-xl-4 col-md-6 mb-4">
                                        <div class="card tni-category-card tni-au-card" id="card-AU" onclick="showCategorySubmenu('AU')">
                                            <div class="card-body">
                                                <div class="tni-category-content">
                                                    <div class="tni-category-icon">
                                                        <i class="fas fa-plane"></i>
                                                    </div>
                                                    <h4 class="tni-category-title">TNI Angkatan Udara</h4>
                                                    <p class="tni-category-subtitle">
                                                        <?php echo isset($categoryStats[2]) ? $categoryStats[2]['total_units'] : 0; ?> Satuan
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submenu Section -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card submenu-card" id="submenuCard">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0" id="submenuTitle">Pilih Jenis Satuan</h5>
                                    <button class="btn btn-sm btn-outline-secondary" onclick="hideSubmenu()">
                                        <i class="fas fa-times"></i> Tutup
                                    </button>
                                </div>
                                
                                <!-- TNI AD Submenu -->
                                <div class="submenu-content" id="submenu-AD" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AD', 'KODAM')">
                                                <div class="submenu-item-icon text-success">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Kodam</h6>
                                                <p class="submenu-item-desc">Komando Daerah Militer</p>
                                                <span class="submenu-item-count" id="count-AD-KODAM">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AD', 'KOREM')">
                                                <div class="submenu-item-icon text-success">
                                                    <i class="fas fa-medal"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Korem</h6>
                                                <p class="submenu-item-desc">Komando Resort Militer</p>
                                                <span class="submenu-item-count" id="count-AD-KOREM">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AD', 'KODIM')">
                                                <div class="submenu-item-icon text-success">
                                                    <i class="fas fa-shield"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Kodim</h6>
                                                <p class="submenu-item-desc">Komando Distrik Militer</p>
                                                <span class="submenu-item-count" id="count-AD-KODIM">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AD', 'KORAMIL')">
                                                <div class="submenu-item-icon text-success">
                                                    <i class="fas fa-home"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Koramil</h6>
                                                <p class="submenu-item-desc">Komando Rayon Militer</p>
                                                <span class="submenu-item-count" id="count-AD-KORAMIL">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TNI AL Submenu -->
                                <div class="submenu-content" id="submenu-AL" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AL', 'KOARMADA')">
                                                <div class="submenu-item-icon text-info">
                                                    <i class="fas fa-water"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Koarmada</h6>
                                                <p class="submenu-item-desc">Komando Armada</p>
                                                <span class="submenu-item-count" id="count-AL-KOARMADA">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AL', 'LANTAMAL')">
                                                <div class="submenu-item-icon text-info">
                                                    <i class="fas fa-ship"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Lantamal</h6>
                                                <p class="submenu-item-desc">Pangkalan Utama TNI AL</p>
                                                <span class="submenu-item-count" id="count-AL-LANTAMAL">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AL', 'LANAL')">
                                                <div class="submenu-item-icon text-info">
                                                    <i class="fas fa-anchor"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Lanal</h6>
                                                <p class="submenu-item-desc">Pangkalan TNI AL</p>
                                                <span class="submenu-item-count" id="count-AL-LANAL">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AL', 'POSAL')">
                                                <div class="submenu-item-icon text-info">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Posal</h6>
                                                <p class="submenu-item-desc">Pos TNI AL</p>
                                                <span class="submenu-item-count" id="count-AL-POSAL">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TNI AU Submenu -->
                                <div class="submenu-content" id="submenu-AU" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AU', 'KOOPSAU')">
                                                <div class="submenu-item-icon text-warning">
                                                    <i class="fas fa-fighter-jet"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Koopsau</h6>
                                                <p class="submenu-item-desc">Komando Operasi Angkatan Udara</p>
                                                <span class="submenu-item-count" id="count-AU-KOOPSAU">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AU', 'LANUD_AB')">
                                                <div class="submenu-item-icon text-warning">
                                                    <i class="fas fa-plane"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Lanud Tipe A/B</h6>
                                                <p class="submenu-item-desc">Pangkalan Udara Tipe A/B</p>
                                                <span class="submenu-item-count" id="count-AU-LANUD_AB">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AU', 'LANUD_BC')">
                                                <div class="submenu-item-icon text-warning">
                                                    <i class="fas fa-helicopter"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Lanud Tipe B/C</h6>
                                                <p class="submenu-item-desc">Pangkalan Udara Tipe B/C</p>
                                                <span class="submenu-item-count" id="count-AU-LANUD_BC">0</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6 mb-3">
                                            <div class="submenu-item-card" onclick="filterMapUnits('AU', 'POS_AU')">
                                                <div class="submenu-item-icon text-warning">
                                                    <i class="fas fa-broadcast-tower"></i>
                                                </div>
                                                <h6 class="submenu-item-title">Pos TNI AU</h6>
                                                <p class="submenu-item-desc">Pos TNI Angkatan Udara</p>
                                                <span class="submenu-item-count" id="count-AU-POS_AU">0</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Show All Button -->
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary btn-lg" onclick="showAllUnits()">
                                        <i class="fas fa-globe"></i> Tampilkan Semua Satuan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics Cards -->
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="card stats-card">
                            <div class="card-body text-center">
                                <div class="stats-number text-success"><?php echo isset($categoryStats[0]) ? $categoryStats[0]['total_units'] : 0; ?></div>
                                <div class="stats-label">TNI Angkatan Darat</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="card stats-card">
                            <div class="card-body text-center">
                                <div class="stats-number text-info"><?php echo isset($categoryStats[1]) ? $categoryStats[1]['total_units'] : 0; ?></div>
                                <div class="stats-label">TNI Angkatan Laut</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="card stats-card">
                            <div class="card-body text-center">
                                <div class="stats-number text-warning"><?php echo isset($categoryStats[2]) ? $categoryStats[2]['total_units'] : 0; ?></div>
                                <div class="stats-label">TNI Angkatan Udara</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6">
                        <div class="card stats-card">
                            <div class="card-body text-center">
                                <div class="stats-number text-primary"><?php echo count($hierarchyStats); ?></div>
                                <div class="stats-label">Jenis Satuan</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'partials/footer.php'; ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?php include 'partials/right-sidebar.php'; ?>

<?php include 'partials/vendor-scripts.php'; ?>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" 
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" 
        crossorigin=""></script>

<!-- Leaflet MarkerCluster JS -->
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<!-- apexcharts js -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<script src="assets/js/app.js"></script>

<script>
// Global variables
let map;
let markersGroup;
let allUnitsData = <?php echo json_encode($allUnits); ?>;
let currentFilter = 'ALL';
let selectedCategory = null;

// Initialize map
function initMap() {
    // Create map centered on Indonesia
    map = L.map('indonesiaMap').setView([-2.5, 118], 5);
    
    // Add OpenStreetMap tiles
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18,
        minZoom: 3
    }).addTo(map);
    
    // Create marker cluster group
    markersGroup = L.markerClusterGroup({
        chunkedLoading: true,
        maxClusterRadius: 50
    });
    
    // Add all markers initially
    addMarkersToMap(allUnitsData);
    
    // Update zoom level display
    map.on('zoomend', function() {
        document.getElementById('zoomLevel').textContent = map.getZoom();
    });
    
    // Update map info
    updateMapInfo();
}

// Add markers to map
function addMarkersToMap(units) {
    markersGroup.clearLayers();
    
    units.forEach(function(unit) {
        let icon = getCustomIcon(unit.category_code, unit.hierarchy_level);
        
        let marker = L.marker([unit.latitude, unit.longitude], {
            icon: icon
        });
        
        // Create popup content
        let popupContent = `
            <div class="unit-popup">
                <h6 class="mb-2 text-${getBootstrapColor(unit.category_code)}">${unit.name}</h6>
                <p class="mb-1"><strong>Kode:</strong> ${unit.code}</p>
                <p class="mb-1"><strong>Jenis:</strong> ${unit.unit_type_name}</p>
                <p class="mb-1"><strong>Kategori:</strong> ${unit.category_name}</p>
                <p class="mb-1"><strong>Lokasi:</strong> ${unit.city_name}, ${unit.province_name}</p>
                <p class="mb-1"><strong>Alamat:</strong> ${unit.address}</p>
                <hr class="my-2">
                <small class="text-muted">
                    <i class="fas fa-map-marker-alt"></i> 
                    ${unit.latitude}, ${unit.longitude}
                </small>
            </div>
        `;
        
        marker.bindPopup(popupContent);
        markersGroup.addLayer(marker);
    });
    
    map.addLayer(markersGroup);
    updateMapInfo();
}

// Get custom icon based on category and hierarchy
function getCustomIcon(category, hierarchyLevel) {
    let iconHtml = '';
    let iconColor = getIconColor(category);
    
    // Different icons based on category
    if (category === 'AD') {
        iconHtml = '<i class="fas fa-shield-alt"></i>';
    } else if (category === 'AL') {
        iconHtml = '<i class="fas fa-anchor"></i>';
    } else if (category === 'AU') {
        iconHtml = '<i class="fas fa-plane"></i>';
    }
    
    // Icon size based on hierarchy level (1=largest, 4=smallest)
    let iconSize = hierarchyLevel === 1 ? 40 : hierarchyLevel === 2 ? 35 : hierarchyLevel === 3 ? 30 : 25;
    
    return L.divIcon({
        html: `<div style="
            background-color: ${iconColor};
            width: ${iconSize}px;
            height: ${iconSize}px;
            border-radius: 50%;
            border: 3px solid white;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: ${iconSize * 0.4}px;
            font-weight: bold;
        ">${iconHtml}</div>`,
        className: 'custom-div-icon',
        iconSize: [iconSize, iconSize],
        iconAnchor: [iconSize/2, iconSize/2]
    });
}

// Get icon color based on category
function getIconColor(category) {
    switch(category) {
        case 'AD': return '#28a745';
        case 'AL': return '#17a2b8';
        case 'AU': return '#ffc107';
        default: return '#6c757d';
    }
}

// Get Bootstrap color class
function getBootstrapColor(category) {
    switch(category) {
        case 'AD': return 'success';
        case 'AL': return 'info';
        case 'AU': return 'warning';
        default: return 'secondary';
    }
}

// Show category submenu with visual feedback
function showCategorySubmenu(category) {
    // Remove selected class from all cards
    document.querySelectorAll('.tni-category-card').forEach(function(card) {
        card.classList.remove('selected');
    });
    
    // Add selected class to clicked card
    document.getElementById('card-' + category).classList.add('selected');
    
    // Hide all submenu contents
    document.querySelectorAll('.submenu-content').forEach(function(submenu) {
        submenu.style.display = 'none';
    });
    
    // Show submenu card with animation
    const submenuCard = document.getElementById('submenuCard');
    submenuCard.classList.add('show');
    submenuCard.style.display = 'block';
    
    // Show specific category submenu
    document.getElementById('submenu-' + category).style.display = 'block';
    
    // Update title
    let categoryName = '';
    switch(category) {
        case 'AD': categoryName = 'TNI Angkatan Darat'; break;
        case 'AL': categoryName = 'TNI Angkatan Laut'; break;
        case 'AU': categoryName = 'TNI Angkatan Udara'; break;
    }
    document.getElementById('submenuTitle').textContent = 'Pilih Jenis Satuan ' + categoryName;
    
    // Update counts
    updateSubmenuCounts(category);
    
    // Store selected category
    selectedCategory = category;
    
    // Scroll to submenu with smooth animation
    setTimeout(() => {
        document.getElementById('submenuCard').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }, 100);
}

// Hide submenu
function hideSubmenu() {
    const submenuCard = document.getElementById('submenuCard');
    submenuCard.classList.remove('show');
    submenuCard.style.display = 'none';
    
    // Remove selected class from all cards
    document.querySelectorAll('.tni-category-card').forEach(function(card) {
        card.classList.remove('selected');
    });
    
    selectedCategory = null;
}

// Update submenu counts
function updateSubmenuCounts(category) {
    // Count units by type for the category
    const unitCounts = {};
    
    allUnitsData.forEach(function(unit) {
        if (unit.category_code === category) {
            const unitType = unit.unit_type_code;
            unitCounts[unitType] = (unitCounts[unitType] || 0) + 1;
        }
    });
    
    // Update count displays
    Object.keys(unitCounts).forEach(function(unitType) {
        const countElement = document.getElementById('count-' + category + '-' + unitType);
        if (countElement) {
            countElement.textContent = unitCounts[unitType];
        }
    });
}

// Filter map units with visual feedback
function filterMapUnits(category, unitType) {
    let filteredUnits = allUnitsData;
    
    if (category && category !== 'ALL') {
        filteredUnits = filteredUnits.filter(unit => unit.category_code === category);
    }
    
    if (unitType && unitType !== 'ALL') {
        filteredUnits = filteredUnits.filter(unit => unit.unit_type_code === unitType);
    }
    
    addMarkersToMap(filteredUnits);
    
    // Update active filter display
    let filterText = 'Semua';
    if (category && category !== 'ALL') {
        filterText = category;
        if (unitType && unitType !== 'ALL') {
            filterText += ' - ' + unitType;
        }
    }
    document.getElementById('activeFilter').textContent = filterText;
    
    currentFilter = {category: category, unitType: unitType};
    
    // Add visual feedback to clicked submenu item
    document.querySelectorAll('.submenu-item-card').forEach(function(card) {
        card.classList.remove('clicked');
    });
    event.currentTarget.classList.add('clicked');
    
    // Hide submenu after selection
    setTimeout(() => {
        hideSubmenu();
        // Scroll to map
        document.getElementById('indonesiaMap').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }, 500);
}

// Show all units
function showAllUnits() {
    addMarkersToMap(allUnitsData);
    document.getElementById('activeFilter').textContent = 'Semua';
    currentFilter = 'ALL';
    hideSubmenu();
}

// Reset map view
function resetMapView() {
    map.setView([-2.5, 118], 5);
    showAllUnits();
}

// Update map info
function updateMapInfo() {
    let displayedCount = markersGroup.getLayers().length;
    document.getElementById('displayedUnitsCount').textContent = displayedCount;
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    initMap();
    
    // Initialize all submenu counts
    updateSubmenuCounts('AD');
    updateSubmenuCounts('AL');
    updateSubmenuCounts('AU');
});
</script>

</body>
</html>