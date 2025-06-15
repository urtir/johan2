<?php
// filepath: /workspaces/johan2/calendar.php
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
    
    <!-- Leaflet CSS -->
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
    
    <style>
        /* Ensure map container is properly sized */
        #kostradMap {
            width: 100% !important;
            height: 500px !important;
            position: relative;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        
        /* Loading indicator */
        .map-loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            background: rgba(255,255,255,0.9);
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        
        /* Debug info */
        .debug-info {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 10px;
            font-size: 12px;
            border-radius: 5px;
            z-index: 10000;
            max-width: 300px;
            display: none;
        }
    </style>
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

                <!-- Header -->
                <div class="kostrad-header text-center">
                    <h4 class="mb-0">Sistem Pemetaan Alutsista Satuan Tempur</h4>
                    <button onclick="toggleDebug()" class="btn btn-sm btn-light mt-2">Toggle Debug</button>
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
                                    <i class="fas fa-refresh"></i> Reload
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

                <!-- Summary Statistics -->
                <div class="row fade-in-up" id="summarySection" style="display: none;">
                    <div class="col-xl-3 col-sm-6">
                        <div class="summary-card">
                            <div class="summary-card-icon">
                                <i class="fas fa-boxes"></i>
                            </div>
                            <div class="summary-card-title">Total Materil</div>
                            <div class="summary-card-value" id="totalMateriel">0</div>
                            <div class="summary-card-subtitle">Unit</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="summary-card">
                            <div class="summary-card-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="summary-card-title">Kondisi Baik</div>
                            <div class="summary-card-value text-success" id="totalKondisiB">0</div>
                            <div class="summary-card-subtitle">Unit</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="summary-card">
                            <div class="summary-card-icon">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="summary-card-title">Perlu Perbaikan</div>
                            <div class="summary-card-value text-warning" id="totalKondisiRR">0</div>
                            <div class="summary-card-subtitle">Unit</div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="summary-card">
                            <div class="summary-card-icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="summary-card-title">Rusak Berat</div>
                            <div class="summary-card-value text-danger" id="totalKondisiRB">0</div>
                            <div class="summary-card-subtitle">Unit</div>
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

// Debug functions
function updateDebugInfo() {
    if (!debugMode) return;
    
    document.getElementById('unitsCount').textContent = kostradUnitsData.length;
    document.getElementById('mapStatus').textContent = isMapInitialized ? 'Initialized' : 'Not initialized';
    document.getElementById('markersCount').textContent = kostradMarkers ? kostradMarkers.getLayers().length : 0;
}

function toggleDebug() {
    debugMode = !debugMode;
    document.getElementById('debugInfo').style.display = debugMode ? 'block' : 'none';
    if (debugMode) updateDebugInfo();
}

function log(message, data = null) {
    console.log(`[MAP] ${message}`, data || '');
    if (debugMode) updateDebugInfo();
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', function() {
    log('DOM loaded, starting initialization...');
    
    // Validate data
    if (!kostradUnitsData || kostradUnitsData.length === 0) {
        log('ERROR: No Kostrad units data available');
        document.getElementById('kostradMap').innerHTML = 
            '<div class="alert alert-warning text-center">Tidak ada data satuan Kostrad tersedia</div>';
        return;
    }
    
    log('Data validation passed', {
        units: kostradUnitsData.length,
        categories: materialCategoriesData.length
    });
    
    // Initialize map with delay
    setTimeout(() => {
        initKostradMap();
    }, 500);
});

// Initialize Kostrad map
function initKostradMap() {
    try {
        log('Starting map initialization...');
        document.getElementById('mapLoading').style.display = 'block';
        
        // Clear any existing map
        if (kostradMap) {
            kostradMap.remove();
            kostradMap = null;
        }
        
        // Create map container
        const mapContainer = document.getElementById('kostradMap');
        if (!mapContainer) {
            throw new Error('Map container not found');
        }
        
        // Initialize map
        kostradMap = L.map('kostradMap', {
            center: [-2.5, 118.0],
            zoom: 5,
            zoomControl: true,
            attributionControl: true,
            scrollWheelZoom: true,
            doubleClickZoom: true,
            boxZoom: true,
            keyboard: true
        });
        
        log('Map object created successfully');
        
        // Add tile layer with error handling
        const tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors',
            maxZoom: 18,
            minZoom: 4,
            errorTileUrl: 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjU2IiBoZWlnaHQ9IjI1NiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cmVjdCB3aWR0aD0iMjU2IiBoZWlnaHQ9IjI1NiIgZmlsbD0iI2VlZSIvPjx0ZXh0IHg9IjUwJSIgeT0iNTAlIiBmb250LXNpemU9IjE4IiBmaWxsPSIjNjY2IiB0ZXh0LWFuY2hvcj0ibWlkZGxlIiBkeT0iLjNlbSI+TG9hZGluZy4uLjwvdGV4dD48L3N2Zz4='
        });
        
        tileLayer.on('loading', () => log('Tiles loading...'));
        tileLayer.on('load', () => log('Tiles loaded successfully'));
        tileLayer.on('tileerror', (e) => log('Tile error:', e));
        
        tileLayer.addTo(kostradMap);
        log('Tile layer added to map');
        
        // Initialize marker cluster
        kostradMarkers = L.markerClusterGroup({
            maxClusterRadius: 50,
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: false,
            zoomToBoundsOnClick: true,
            chunkedLoading: true
        });
        
        log('Marker cluster group created');
        
        // Wait for map to be ready
        kostradMap.whenReady(() => {
            log('Map is ready, adding markers...');
            addKostradMarkers();
            
            // Hide loading indicator
            document.getElementById('mapLoading').style.display = 'none';
            isMapInitialized = true;
            updateDebugInfo();
        });
        
        // Force resize after short delay
        setTimeout(() => {
            if (kostradMap) {
                kostradMap.invalidateSize();
                log('Map size invalidated');
            }
        }, 1000);
        
    } catch (error) {
        log('ERROR in map initialization:', error);
        document.getElementById('mapLoading').style.display = 'none';
        document.getElementById('kostradMap').innerHTML = 
            `<div class="alert alert-danger text-center">
                <h6>Error loading map</h6>
                <p>${error.message}</p>
                <button class="btn btn-sm btn-primary" onclick="initKostradMap()">Retry</button>
            </div>`;
    }
}

// Add Kostrad unit markers
function addKostradMarkers() {
    try {
        if (!kostradMap || !kostradMarkers) {
            throw new Error('Map or marker cluster not initialized');
        }
        
        kostradMarkers.clearLayers();
        log('Adding markers for units:', kostradUnitsData.length);
        
        let successCount = 0;
        let errorCount = 0;
        
        kostradUnitsData.forEach((unit, index) => {
            try {
                const lat = parseFloat(unit.latitude);
                const lng = parseFloat(unit.longitude);
                
                if (isNaN(lat) || isNaN(lng)) {
                    log(`Invalid coordinates for ${unit.unit_name}: [${unit.latitude}, ${unit.longitude}]`);
                    errorCount++;
                    return;
                }
                
                // Create custom marker
                const markerIcon = L.divIcon({
                    html: `
                        <div style="
                            background: linear-gradient(135deg, #2c5f2d, #97bc62);
                            width: 35px;
                            height: 35px;
                            border-radius: 50%;
                            border: 2px solid white;
                            box-shadow: 0 2px 8px rgba(44, 95, 45, 0.4);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: white;
                            font-size: 14px;
                            font-weight: bold;
                            cursor: pointer;
                        ">🏛️</div>
                    `,
                    className: 'kostrad-marker',
                    iconSize: [35, 35],
                    iconAnchor: [17, 17]
                });
                
                const marker = L.marker([lat, lng], { icon: markerIcon });
                
                // Create popup content
                const popupContent = `
                    <div class="kostrad-popup" style="min-width: 250px;">
                        <h6 class="text-success mb-2">
                            <i class="fas fa-shield-alt me-2"></i>${unit.unit_name}
                        </h6>
                        <table class="table table-sm table-borderless mb-2">
                            <tr><td><strong>Kode:</strong></td><td>${unit.unit_code}</td></tr>
                            <tr><td><strong>Tipe:</strong></td><td>${unit.unit_type}</td></tr>
                            <tr><td><strong>Markas:</strong></td><td>${unit.headquarters}</td></tr>
                            <tr><td><strong>Lokasi:</strong></td><td>${unit.city_name}, ${unit.province_name}</td></tr>
                        </table>
                        <hr class="my-2">
                        <button class="btn btn-success btn-sm w-100" onclick="showUnitAlutsista(${unit.id}, '${unit.unit_name.replace(/'/g, "\\'")}')">
                            <i class="fas fa-eye me-1"></i> Lihat Data Alutsista
                        </button>
                    </div>
                `;
                
                marker.bindPopup(popupContent, {
                    maxWidth: 300,
                    className: 'kostrad-popup-container'
                });
                
                kostradMarkers.addLayer(marker);
                successCount++;
                
            } catch (error) {
                log(`Error adding marker for ${unit.unit_name}:`, error);
                errorCount++;
            }
        });
        
        // Add marker cluster to map
        kostradMap.addLayer(kostradMarkers);
        
        log(`Markers added: ${successCount} success, ${errorCount} errors`);
        
        // Fit bounds to show all markers
        if (kostradMarkers.getLayers().length > 0) {
            setTimeout(() => {
                try {
                    const bounds = kostradMarkers.getBounds();
                    if (bounds.isValid()) {
                        kostradMap.fitBounds(bounds, { padding: [20, 20] });
                        log('Map bounds fitted to markers');
                    }
                } catch (e) {
                    log('Error fitting bounds:', e);
                }
            }, 500);
        }
        
        updateDebugInfo();
        
    } catch (error) {
        log('ERROR adding markers:', error);
    }
}

// Show unit alutsista data
function showUnitAlutsista(unitId, unitName) {
    log('Showing alutsista for unit:', { unitId, unitName });
    
    selectedUnitId = unitId;
    
    // Close popup
    if (kostradMap) {
        kostradMap.closePopup();
    }
    
    // Update UI
    document.getElementById('selectedUnitName').textContent = unitName;
    document.getElementById('materialCategoriesSection').style.display = 'block';
    
    // Load material category counts
    loadMaterialCategoryCounts(unitId);
    
    // Auto-select first available category
    setTimeout(() => {
        autoSelectFirstCategory();
    }, 1000);
    
    // Scroll to categories section
    setTimeout(() => {
        document.getElementById('materialCategoriesSection').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
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
    
    // Show material table and summary
    document.getElementById('alutsistaMaterialSection').style.display = 'block';
    document.getElementById('summarySection').style.display = 'block';
    
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
            updateSummary(data);
        })
        .catch(error => {
            console.error('Error loading material data:', error);
            tableBody.innerHTML = `<tr><td colspan="6" class="text-center text-danger">Error memuat data: ${error.message}</td></tr>`;
        });
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
                    <td><strong>${item.type_name}</strong></td>
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

// Update summary statistics
function updateSummary(data) {
    let totalMateriel = 0;
    let totalKondisiB = 0;
    let totalKondisiRR = 0;
    let totalKondisiRB = 0;
    
    data.forEach(item => {
        totalMateriel += parseInt(item.jumlah_total) || 0;
        totalKondisiB += parseInt(item.kondisi_b) || 0;
        totalKondisiRR += parseInt(item.kondisi_rr) || 0;
        totalKondisiRB += parseInt(item.kondisi_rb) || 0;
    });
    
    document.getElementById('totalMateriel').textContent = formatNumber(totalMateriel);
    document.getElementById('totalKondisiB').textContent = formatNumber(totalKondisiB);
    document.getElementById('totalKondisiRR').textContent = formatNumber(totalKondisiRR);
    document.getElementById('totalKondisiRB').textContent = formatNumber(totalKondisiRB);
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

function resetMapView() {
    if (kostradMap) {
        kostradMap.setView([-2.5, 118.0], 5);
        log('Map view reset');
    }
}

function showAllKostradUnits() {
    if (kostradMap && kostradMarkers && kostradMarkers.getLayers().length > 0) {
        kostradMap.fitBounds(kostradMarkers.getBounds(), { padding: [20, 20] });
        log('Map fitted to all units');
    }
}

function reloadMarkers() {
    log('Reloading markers...');
    if (kostradMap && kostradMarkers) {
        addKostradMarkers();
    }
}

// Make functions globally accessible
window.showUnitAlutsista = showUnitAlutsista;
window.resetMapView = resetMapView;
window.showAllKostradUnits = showAllKostradUnits;
window.reloadMarkers = reloadMarkers;
window.toggleDebug = toggleDebug;

// Enable debug mode initially for testing
setTimeout(() => {
    toggleDebug();
}, 2000);
</script>

</body>
</html>