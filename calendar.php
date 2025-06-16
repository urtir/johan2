<?php

include 'partials/session.php';
include 'partials/main.php';

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

// Get Kostrad units with error handling
try {
    $stmt = $pdo->query("
        SELECT 
            ku.*,
            p.name as province_name,
            c.name as city_name
        FROM kostrad_units ku
        JOIN provinces p ON ku.province_id = p.id
        JOIN cities c ON ku.city_id = c.id
        WHERE ku.status = 'active'
        ORDER BY ku.unit_code
    ");
    $kostradUnits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debug: Check if data exists
    if (empty($kostradUnits)) {
        echo "<!-- Warning: No Kostrad units found in database -->";
    }

    // Get material categories
    $stmt = $pdo->query("
        SELECT * FROM material_categories 
        ORDER BY sort_order
    ");
    $materialCategories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($materialCategories)) {
        echo "<!-- Warning: No material categories found in database -->";
    }

} catch(PDOException $e) {
    $kostradUnits = [];
    $materialCategories = [];
    echo "<!-- Database Error: " . $e->getMessage() . " -->";
}

// Helper function for category icons
function getCategoryIcon($categoryCode) {
    $icons = [
        'SENJATA' => 'crosshairs',
        'RANPUR' => 'shield-alt',
        'MUNISI' => 'bomb',
        'RANMOR' => 'truck',
        'ALOPTIK' => 'binoculars',
        'ALPALSUS' => 'tools',
        'PESAWAT' => 'helicopter',
        'ALANGAIR' => 'ship'
    ];
    
    return isset($icons[$categoryCode]) ? $icons[$categoryCode] : 'cube';
}
?>

<head>
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Sistem Pemetaan Alutsista Satuan Tempur')); ?>
    
    <!-- Leaflet CSS - Important: Make sure this comes BEFORE your custom CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <!-- Leaflet MarkerCluster CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
    <!-- Bootstrap (if not already included) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- Custom Kostrad CSS -->
    <link href="assets/css/satpur.css" rel="stylesheet" />

    <?php include 'partials/head-css.php'; ?>
</head>

<?php include 'partials/body.php'; ?>

<!-- Debug info panel -->
<div id="debugInfo" class="debug-info">
    <div>Units loaded: <span id="unitsCount">0</span></div>
    <div>Map status: <span id="mapStatus">Not initialized</span></div>
    <div>Markers: <span id="markersCount">0</span></div>
    <button onclick="toggleDebug()" class="btn btn-sm btn-light">Hide Debug</button>
</div>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'partials/menu.php'; ?>

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- Header dengan judul yang ditingkatkan -->
                <div class="kostrad-header text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="mb-1 fw-bold text-white">SISTEM PEMETAAN ALUTSISTA SATUAN TEMPUR</h3>
                                <p class="header-subtitle mb-0">Komando Cadangan Strategis Angkatan Darat (KOSTRAD) TNI</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="kostrad-map-container slide-in-right">
                    <div class="kostrad-map-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="fas fa-map me-2"></i>Peta Lokasi Satuan Kostrad
                            </h6>
                            <div class="kostrad-map-controls">
                                <button class="kostrad-map-btn" onclick="resetMapView()">
                                    <i class="fas fa-home"></i> Reset
                                </button>
                                <button class="kostrad-map-btn" onclick="showAllKostradUnits()">
                                    <i class="fas fa-eye"></i> Tampilkan Semua
                                </button>
                                <button class="kostrad-map-btn" onclick="reloadMarkers()">
                                    <i class="fas fa-sync-alt"></i> Reload
                                </button>
                            </div>
                        </div>
                    </div>
                    <div style="position: relative;">
                        <div id="kostradMap"></div>
                        <div id="mapLoading" class="map-loading" style="display: none;">
                            <div class="spinner-border text-primary" role="status"></div>
                            <div class="mt-2">Loading map...</div>
                        </div>
                    </div>
                </div>

                <!-- Material Categories Section -->
                <div class="row mb-4 fade-in-up" id="materialCategoriesSection" style="display: none;">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <i class="fas fa-layer-group me-2"></i>Kategori Materil Alutsista - <span id="selectedUnitName">Pilih Satuan</span>
                                </h5>
                                <div class="row" id="categoriesContainer">
                                    <?php foreach($materialCategories as $category): ?>
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                                        <div class="material-category-card" id="category-<?php echo $category['id']; ?>" onclick="selectMaterialCategory(<?php echo $category['id']; ?>, '<?php echo htmlspecialchars($category['category_name']); ?>')">
                                            <div class="material-category-header">
                                                <div class="material-category-icon">
                                                    <i class="fas fa-<?php echo getCategoryIcon($category['category_code']); ?>"></i>
                                                </div>
                                                <div class="material-category-info flex-grow-1">
                                                    <h6><?php echo htmlspecialchars($category['category_name']); ?></h6>
                                                    <p><?php echo htmlspecialchars($category['description']); ?></p>
                                                </div>
                                                <span class="material-summary-badge" id="category-count-<?php echo $category['id']; ?>">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Alutsista Data Table -->
                <div class="row mb-4 fade-in-up" id="alutsistaMaterialSection" style="display: none;">
                    <div class="col-12">
                        <div class="alutsista-table">
                            <div class="d-flex justify-content-between align-items-center p-3">
                                <h5 class="mb-0" id="materialTableTitle">
                                    <i class="fas fa-table me-2"></i>Data Alutsista
                                </h5>
                                <div class="btn-group">
                                    <button class="btn btn-outline-success btn-sm" onclick="printTable()">
                                        <i class="fas fa-print"></i> Print
                                    </button>
                                    <button class="btn btn-outline-primary btn-sm" onclick="exportToExcel()">
                                        <i class="fas fa-download"></i> Export Excel
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover mb-0" id="alutsistaMaterialTable">
                                    <thead>
                                        <tr>
                                            <th><i class="fas fa-list me-1"></i>Jenis Materil</th>
                                            <th class="text-center"><i class="fas fa-calculator me-1"></i>Jumlah Total</th>
                                            <th class="text-center"><i class="fas fa-check-circle me-1"></i>Kondisi B</th>
                                            <th class="text-center"><i class="fas fa-exclamation-circle me-1"></i>Kondisi RR</th>
                                            <th class="text-center"><i class="fas fa-times-circle me-1"></i>Kondisi RB</th>
                                            <th class="text-center"><i class="fas fa-chart-line me-1"></i>Kesiapan %</th>
                                        </tr>
                                    </thead>
                                    <tbody id="alutsistaMaterialTableBody">
                                        <tr><td colspan="6" class="text-center text-muted">Klik marker di peta untuk melihat data alutsista</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php include 'partials/footer.php'; ?>
    </div>
</div>

<?php include 'partials/right-sidebar.php'; ?>
<?php include 'partials/vendor-scripts.php'; ?>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<!-- Bootstrap JS (if not already included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Global variables
let kostradMap = null;
let kostradMarkers = null;
let kostradUnitsData = <?php echo json_encode($kostradUnits); ?>;
let materialCategoriesData = <?php echo json_encode($materialCategories); ?>;
let selectedUnitId = null;
let selectedCategoryId = null;
let isMapInitialized = false;
let debugMode = false;

// Debug log function
function log(message, data = null) {
    console.log(`[MAP] ${message}`, data || '');
    if (debugMode) updateDebugInfo();
}

// Debug info update
function updateDebugInfo() {
    if (!debugMode) return;
    
    document.getElementById('unitsCount').textContent = kostradUnitsData.length;
    document.getElementById('mapStatus').textContent = isMapInitialized ? 'Initialized' : 'Not initialized';
    document.getElementById('markersCount').textContent = kostradMarkers ? kostradMarkers.getLayers().length : 0;
}

// Toggle debug panel
function toggleDebug() {
    debugMode = !debugMode;
    document.getElementById('debugInfo').style.display = debugMode ? 'block' : 'none';
    if (debugMode) updateDebugInfo();
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, preparing initialization');
    
    // Validate data first
    if (!kostradUnitsData || kostradUnitsData.length === 0) {
        console.error('ERROR: No Kostrad units data available');
        document.getElementById('kostradMap').innerHTML = 
            '<div class="alert alert-warning text-center">Tidak ada data satuan Kostrad tersedia</div>';
        return;
    }
    
    // Initialize immediately
    initializeMap();
});

// Map initialization
function initializeMap() {
    try {
        console.log('Initializing map...');
        
        // Show loading indicator
        document.getElementById('mapLoading').style.display = 'block';
        
        // Create the map with basic settings
        kostradMap = L.map('kostradMap', {
            center: [-2.5, 118.0],
            zoom: 5
        });
        
        // Add the tile layer (using OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(kostradMap);
        
        // Create marker cluster group
        kostradMarkers = L.markerClusterGroup();
        
        // Add markers
        addKostradMarkers();
        
        // Add marker cluster to map
        kostradMap.addLayer(kostradMarkers);
        
        // Fit map to markers
        if (kostradMarkers.getLayers().length > 0) {
            kostradMap.fitBounds(kostradMarkers.getBounds());
        }
        
        // Hide loading indicator
        document.getElementById('mapLoading').style.display = 'none';
        
        // Force map to recognize its container
        setTimeout(() => kostradMap.invalidateSize(), 100);
        
        isMapInitialized = true;
        console.log('Map initialized successfully');
        
    } catch (error) {
        console.error('Error initializing map:', error);
        document.getElementById('mapLoading').style.display = 'none';
        document.getElementById('kostradMap').innerHTML = 
            `<div class="alert alert-danger text-center">
                <h6>Error loading map</h6>
                <p>${error.message}</p>
                <button class="btn btn-sm btn-primary" onclick="initializeMap()">Retry</button>
            </div>`;
    }
}

// Add markers to the map
function addKostradMarkers() {
    // Clear existing markers
    if (kostradMarkers) {
        kostradMarkers.clearLayers();
    }
    
    // Add new markers
    kostradUnitsData.forEach(unit => {
        const lat = parseFloat(unit.latitude);
        const lng = parseFloat(unit.longitude);
        
        if (!isNaN(lat) && !isNaN(lng)) {
            // Enhanced marker with custom styling
            const markerIcon = L.divIcon({
                html: `
                    <div class="kostrad-custom-marker">
                        <div class="marker-inner">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                    </div>
                `,
                className: '',
                iconSize: [40, 40],
                iconAnchor: [20, 40]
            });
            
            const marker = L.marker([lat, lng], { icon: markerIcon });
            
            // Create enhanced popup content
            const popupContent = `
                <div class="kostrad-popup">
                    <div class="popup-header">
                        <h6><i class="fas fa-shield-alt me-2"></i>${unit.unit_name}</h6>
                    </div>
                    <div class="popup-body">
                        <div class="popup-info">
                            <div><i class="fas fa-map-marker-alt me-2"></i>${unit.headquarters}</div>
                            <div><i class="fas fa-city me-2"></i>${unit.city_name}, ${unit.province_name}</div>
                        </div>
                        <button class="btn btn-kostrad-accent mt-2 w-100" onclick="showUnitAlutsista(${unit.id}, '${unit.unit_name.replace(/'/g, "\\'")}')">
                            <i class="fas fa-database me-1"></i> Lihat Data Alutsista
                        </button>
                    </div>
                </div>
            `;
            
            marker.bindPopup(popupContent, {
                maxWidth: 300,
                className: 'kostrad-popup-container'
            });
            
            kostradMarkers.addLayer(marker);
        }
    });
}

// Reset map view function
function resetMapView() {
    if (kostradMap) {
        kostradMap.setView([-2.5, 118.0], 5);
        log('Map view reset');
    }
}

// Show all units
function showAllKostradUnits() {
    if (kostradMap && kostradMarkers && kostradMarkers.getLayers().length > 0) {
        kostradMap.fitBounds(kostradMarkers.getBounds(), { 
            padding: [20, 20],
            maxZoom: 10
        });
        log('Map fitted to all units');
    }
}

// Reload markers
function reloadMarkers() {
    log('Reloading markers...');
    if (kostradMap && kostradMarkers) {
        addKostradMarkers();
    }
}

// Show unit alutsista data
function showUnitAlutsista(unitId, unitName) {
    console.log('Showing alutsista for unit:', { unitId, unitName });
    
    selectedUnitId = unitId;
    
    if (kostradMap) kostradMap.closePopup();
    
    document.getElementById('selectedUnitName').textContent = unitName;
    document.getElementById('materialCategoriesSection').style.display = 'block';
    
    loadMaterialCategoryCounts(unitId);
    
    setTimeout(() => autoSelectFirstCategory(), 1000);
    
    setTimeout(() => {
        document.getElementById('materialCategoriesSection').scrollIntoView({ 
            behavior: 'smooth', block: 'start' 
        });
    }, 100);
}

// Load material category counts
function loadMaterialCategoryCounts(unitId) {
    log('Loading category counts for unit:', unitId);
    
    fetch(`api/get_material_category_counts.php?unit_id=${unitId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            log('Category counts loaded:', data);
            
            if (data.error) {
                throw new Error(data.error);
            }
            
            // Reset all badges
            materialCategoriesData.forEach(category => {
                const badge = document.getElementById('category-count-' + category.id);
                if (badge) {
                    badge.textContent = '0';
                }
            });
            
            // Update with actual data
            data.forEach(item => {
                const badge = document.getElementById('category-count-' + item.category_id);
                if (badge) {
                    badge.textContent = item.total_count || 0;
                    
                    const card = document.getElementById('category-' + item.category_id);
                    if (card && item.total_count > 0) {
                        card.style.borderColor = '#2c5f2d';
                        card.style.boxShadow = '0 4px 12px rgba(44, 95, 45, 0.15)';
                    }
                }
            });
        })
        .catch(error => {
            log('Error loading category counts:', error);
            alert('Error loading category data: ' + error.message);
        });
}

// Auto-select first category with data
function autoSelectFirstCategory() {
    let firstCategoryWithData = null;
    
    materialCategoriesData.forEach(category => {
        let badge = document.getElementById('category-count-' + category.id);
        if (badge && parseInt(badge.textContent) > 0 && !firstCategoryWithData) {
            firstCategoryWithData = category;
        }
    });
    
    if (firstCategoryWithData) {
        console.log('Auto-selecting category:', firstCategoryWithData.category_name);
        selectMaterialCategory(firstCategoryWithData.id, firstCategoryWithData.category_name);
    } else {
        console.log('No category with data found, selecting first category');
        if (materialCategoriesData.length > 0) {
            selectMaterialCategory(materialCategoriesData[0].id, materialCategoriesData[0].category_name);
        }
    }
}

// Select material category
function selectMaterialCategory(categoryId, categoryName) {
    if (!selectedUnitId) {
        alert('Silakan pilih satuan terlebih dahulu dari peta');
        return;
    }
    
    console.log('Selecting category:', categoryId, categoryName);
    selectedCategoryId = categoryId;
    
    // Update UI
    document.querySelectorAll('.material-category-card').forEach(card => {
        card.classList.remove('active');
    });
    
    const categoryCard = document.getElementById('category-' + categoryId);
    if (categoryCard) {
        categoryCard.classList.add('active');
    }
    
    // Show material table
    document.getElementById('alutsistaMaterialSection').style.display = 'block';
    
    // Update table title
    const selectedUnit = kostradUnitsData.find(unit => unit.id == selectedUnitId);
    if (selectedUnit) {
        document.getElementById('materialTableTitle').innerHTML = 
            `<i class="fas fa-table me-2"></i>Data ${categoryName} - ${selectedUnit.unit_name}`;
    }
    
    // Load material data
    loadMaterialData(selectedUnitId, categoryId);
    
    // Scroll to table
    setTimeout(() => {
        document.getElementById('alutsistaMaterialSection').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }, 100);
}

// Load material data
function loadMaterialData(unitId, categoryId) {
    console.log('Loading material data for unit:', unitId, 'category:', categoryId);
    
    const tableBody = document.getElementById('alutsistaMaterialTableBody');
    tableBody.innerHTML = '<tr><td colspan="6" class="text-center kostrad-loading"><div class="spinner-border spinner-border-sm me-2"></div>Memuat data...</td></tr>';
    
    // Special handling for ALPALSUS category (ID 6)
    if (categoryId == 6) {
        fetchAlpalsusData(unitId);
        return;
    }
    
    fetch(`api/get_material_category_data.php?unit_id=${unitId}&category_id=${categoryId}`)
        .then(response => {
            console.log('Material data response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Material data:', data);
            
            if (data.error) {
                console.error('Database error:', data.error);
                tableBody.innerHTML = `<tr><td colspan="6" class="text-center text-danger">Error: ${data.error}</td></tr>`;
                return;
            }
            
            displayMaterialData(data);
        })
        .catch(error => {
            console.error('Error loading material data:', error);
            tableBody.innerHTML = `<tr><td colspan="6" class="text-center text-danger">Error memuat data: ${error.message}</td></tr>`;
        });
}

// Fetch ALPALSUS data
function fetchAlpalsusData(unitId) {
    // Fetch ALPALSUS data specifically for this unit
    fetch(`api/get_alpalsus_data.php?unit_id=${unitId}`)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error('Database error:', data.error);
                document.getElementById('alutsistaMaterialTableBody').innerHTML = 
                    `<tr><td colspan="6" class="text-center text-danger">Error: ${data.error}</td></tr>`;
                return;
            }
            
            displayAlpalsusData(data);
        })
        .catch(error => {
            console.error('Error loading ALPALSUS data:', error);
            document.getElementById('alutsistaMaterialTableBody').innerHTML = 
                `<tr><td colspan="6" class="text-center text-danger">Error memuat data ALPALSUS: ${error.message}</td></tr>`;
        });
}

// Display ALPALSUS data
function displayAlpalsusData(data) {
    const tableBody = document.getElementById('alutsistaMaterialTableBody');
    let html = '';
    
    if (data.length === 0) {
        html = '<tr><td colspan="6" class="text-center text-muted">Tidak ada data ALPALSUS untuk satuan ini</td></tr>';
    } else {
        // Add individual rows
        data.forEach(item => {
            const kesiapanClass = getKesiapanClass(parseFloat(item.persentase_kesiapan));
            
            html += `
                <tr class="alpalsus-row">
                    <td><strong>${item.type_name || 'ALPALSUS'}</strong><br>
                        <small class="text-muted">${item.type_description || ''}</small></td>
                    <td class="text-center">${formatNumber(item.jumlah_total)}</td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-b">${formatNumber(item.kondisi_b)}</span>
                    </td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-rr">${formatNumber(item.kondisi_rr)}</span>
                    </td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-rb">${formatNumber(item.kondisi_rb)}</span>
                    </td>
                    <td class="text-center">
                        <div class="kesiapan-progress">
                            <div class="kesiapan-progress-bar ${kesiapanClass}" style="width: ${item.persentase_kesiapan}%">
                                ${parseFloat(item.persentase_kesiapan).toFixed(1)}%
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });
        
        // Calculate and add summary row if there are multiple items
        if (data.length > 1) {
            let totalItems = 0;
            let totalB = 0;
            let totalRR = 0;
            let totalRB = 0;
            
            data.forEach(item => {
                totalItems += parseInt(item.jumlah_total || 0);
                totalB += parseInt(item.kondisi_b || 0);
                totalRR += parseInt(item.kondisi_rr || 0);
                totalRB += parseInt(item.kondisi_rb || 0);
            });
            
            const avgReadiness = totalItems > 0 ? (totalB / totalItems * 100) : 0;
            
            html += `
                <tr class="table-light alpalsus-summary-row">
                    <td><strong>TOTAL ALPALSUS</strong></td>
                    <td class="text-center"><strong>${formatNumber(totalItems)}</strong></td>
                    <td class="text-center"><strong>${formatNumber(totalB)}</strong></td>
                    <td class="text-center"><strong>${formatNumber(totalRR)}</strong></td>
                    <td class="text-center"><strong>${formatNumber(totalRB)}</strong></td>
                    <td class="text-center">
                        <div class="kesiapan-progress">
                            <div class="kesiapan-progress-bar ${getKesiapanClass(avgReadiness)}" style="width: ${avgReadiness.toFixed(2)}%">
                                ${avgReadiness.toFixed(1)}%
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        }
    }
    
    tableBody.innerHTML = html;
}

// Display material data in table
function displayMaterialData(data) {
    const tableBody = document.getElementById('alutsistaMaterialTableBody');
    let html = '';
    
    if (data.length === 0) {
        html = '<tr><td colspan="6" class="text-center text-muted">Tidak ada data untuk kategori ini</td></tr>';
    } else {
        data.forEach(item => {
            const kesiapanClass = getKesiapanClass(parseFloat(item.persentase_kesiapan));
            
            html += `
                <tr>
                    <td><strong>${item.type_name}</strong><br>
                        <small class="text-muted">${item.type_description || ''}</small></td>
                    <td class="text-center">${formatNumber(item.jumlah_total)}</td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-b">${formatNumber(item.kondisi_b)}</span>
                    </td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-rr">${formatNumber(item.kondisi_rr)}</span>
                    </td>
                    <td class="text-center">
                        <span class="kondisi-badge kondisi-rb">${formatNumber(item.kondisi_rb)}</span>
                    </td>
                    <td class="text-center">
                        <div class="kesiapan-progress">
                            <div class="kesiapan-progress-bar ${kesiapanClass}" style="width: ${item.persentase_kesiapan}%">
                                ${parseFloat(item.persentase_kesiapan).toFixed(1)}%
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });
    }
    
    tableBody.innerHTML = html;
}

// Print table function
function printTable() {
    const unitName = document.getElementById('selectedUnitName').textContent;
    const categoryName = document.getElementById('materialTableTitle').textContent.split('-')[0].trim();
    
    let printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>Data ${categoryName} - ${unitName}</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
                body { font-family: Arial, sans-serif; padding: 20px; }
                .header { text-align: center; margin-bottom: 20px; }
                .table th { background-color: #2c5f2d; color: white; }
                .footer { margin-top: 50px; font-size: 12px; text-align: center; }
            </style>
        </head>
        <body>
            <div class="header">
                <h4>Data ${categoryName} - ${unitName}</h4>
                <p>Tanggal Cetak: ${new Date().toLocaleDateString('id-ID')}</p>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Materil</th>
                        <th class="text-center">Jumlah Total</th>
                        <th class="text-center">Kondisi B</th>
                        <th class="text-center">Kondisi RR</th>
                        <th class="text-center">Kondisi RB</th>
                        <th class="text-center">Kesiapan %</th>
                    </tr>
                </thead>
                <tbody>
                    ${document.getElementById('alutsistaMaterialTableBody').innerHTML}
                </tbody>
            </table>
            <div class="footer">
                <p>Sistem Pemetaan Alutsista Satuan Tempur - KOSTRAD</p>
            </div>
        </body>
        </html>
    `);
    
    printWindow.document.close();
    printWindow.focus();
    setTimeout(() => { printWindow.print(); }, 500);
}

// Export to Excel
function exportToExcel() {
    const unitName = document.getElementById('selectedUnitName').textContent;
    const categoryName = document.getElementById('materialTableTitle').textContent.split('-')[0].trim();
    
    // Get table data
    const table = document.getElementById('alutsistaMaterialTable');
    let data = [];
    
    // Header row
    let headers = [];
    table.querySelectorAll('thead th').forEach(th => {
        headers.push(th.textContent.trim());
    });
    data.push(headers);
    
    // Data rows
    table.querySelectorAll('tbody tr').forEach(tr => {
        let row = [];
        tr.querySelectorAll('td').forEach((td, index) => {
            if (index === 0) {
                // First column - just get the text
                row.push(td.textContent.trim());
            } else if (index > 0 && index < 5) {
                // Columns 2-5 - extract number only
                const num = td.textContent.replace(/[^0-9]/g, '');
                row.push(num);
            } else if (index === 5) {
                // Last column - extract percentage
                const percent = td.textContent.replace(/[^0-9.]/g, '');
                row.push(percent);
            }
        });
        data.push(row);
    });
    
    // Create CSV content
    let csvContent = "data:text/csv;charset=utf-8,";
    csvContent += `Data ${categoryName} - ${unitName}\r\n`;
    csvContent += `Tanggal: ${new Date().toLocaleDateString('id-ID')}\r\n\r\n`;
    
    data.forEach(row => {
        csvContent += row.join(',') + "\r\n";
    });
    
    // Create download link
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `Data_${categoryName}_${unitName}_${new Date().toISOString().split('T')[0]}.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

// Utility functions
function getKesiapanClass(percentage) {
    if (percentage >= 90) return 'kesiapan-excellent';
    if (percentage >= 75) return 'kesiapan-good';
    if (percentage >= 60) return 'kesiapan-fair';
    return 'kesiapan-poor';
}

function formatNumber(num) {
    return new Intl.NumberFormat('id-ID').format(num);
}

// Make all functions globally accessible but ensure they don't output text to page
window.showUnitAlutsista = showUnitAlutsista;
window.selectMaterialCategory = selectMaterialCategory;
window.resetMapView = resetMapView;
window.showAllKostradUnits = showAllKostradUnits;
window.reloadMarkers = reloadMarkers;
window.toggleDebug = toggleDebug;
window.printTable = printTable;
window.exportToExcel = exportToExcel;
window.initializeMap = initializeMap;

// Fix for window resize to keep map responsive
window.addEventListener('resize', function() {
    if (kostradMap) {
        setTimeout(function() {
            kostradMap.invalidateSize();
        }, 200);
    }
});
</script>

</body>
</html>