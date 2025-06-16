<?php include 'partials/session.php'; ?>
<?php include 'partials/main.php'; ?>

    <head>
        
    <?php includeFileWithVariables('partials/title-meta.php', array('title' => 'Input Data Alutsista')); ?>

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

                        <?php includeFileWithVariables('partials/page-title.php', array('pagetitle' => 'Forms' , 'title' => 'Input Data Alutsista')); ?>

                        <!-- Form Input Alutsista -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Form Input Data Alutsista</h4>
                                        <p class="card-title-desc">Masukkan data alutsista untuk satuan KOSTRAD</p>
        
                                        <form id="alutsista-form">
                                            <div class="row">
                                                <!-- Pilih Unit -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="unit-select" class="form-label">Pilih Unit KOSTRAD</label>
                                                        <select class="form-select" id="unit-select" name="unit_id" required>
                                                            <option value="">-- Pilih Unit --</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <!-- Pilih Materil -->
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="material-category" class="form-label">Pilih Kategori Materil</label>
                                                        <select class="form-select" id="material-category" name="category_id" required>
                                                            <option value="">-- Pilih Kategori Materil --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Pilih Sub-Materil -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="material-type" class="form-label">Pilih Sub-Materil</label>
                                                        <select class="form-select" id="material-type" name="material_type_id" required disabled>
                                                            <option value="">-- Pilih Sub-Materil --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Jumlah Total -->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="jumlah-total" class="form-label">Jumlah Total</label>
                                                        <input type="number" class="form-control" id="jumlah-total" name="jumlah_total" min="0" required>
                                                    </div>
                                                </div>

                                                <!-- Kondisi Baik -->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="kondisi-baik" class="form-label">Kondisi Baik</label>
                                                        <input type="number" class="form-control" id="kondisi-baik" name="kondisi_b" min="0" required>
                                                    </div>
                                                </div>

                                                <!-- Kondisi Rusak Ringan -->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="kondisi-rr" class="form-label">Rusak Ringan</label>
                                                        <input type="number" class="form-control" id="kondisi-rr" name="kondisi_rr" min="0" required>
                                                    </div>
                                                </div>

                                                <!-- Kondisi Rusak Berat -->
                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="kondisi-rb" class="form-label">Rusak Berat</label>
                                                        <input type="number" class="form-control" id="kondisi-rb" name="kondisi_rb" min="0" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <!-- Keterangan -->
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="keterangan" class="form-label">Keterangan (Opsional)</label>
                                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan tambahan jika diperlukan"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-primary" id="add-to-table" onclick="addToTable()">
                                                        <i class="fas fa-plus me-1"></i> Tambah ke Tabel
                                                    </button>
                                                    <button type="button" class="btn btn-secondary ms-2" onclick="resetForm()">
                                                        <i class="fas fa-undo me-1"></i> Reset Form
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabel Hasil Input -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="card-title mb-0">Tabel Hasil Input</h4>
                                            <div>
                                                <button type="button" class="btn btn-warning btn-sm me-2" onclick="clearTable()">
                                                    <i class="fas fa-trash me-1"></i> Bersihkan Tabel
                                                </button>
                                                <button type="button" class="btn btn-success" id="submit-all-data" onclick="submitAllData()" disabled>
                                                    <i class="fas fa-paper-plane me-1"></i> Kirim Semua Data
                                                </button>
                                            </div>
                                        </div>
                                        
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped" id="result-table">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Unit</th>
                                                        <th>Kategori Materil</th>
                                                        <th>Sub-Materil</th>
                                                        <th>Jumlah Total</th>
                                                        <th>Kondisi Baik</th>
                                                        <th>Rusak Ringan</th>
                                                        <th>Rusak Berat</th>
                                                        <th>Kesiapan (%)</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="result-table-body">
                                                    <tr>
                                                        <td colspan="11" class="text-center text-muted">
                                                            Belum ada data yang diinput. Silakan isi form di atas untuk menambah data.
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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

        <!-- FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

        <script>
        // Global variables
        let inputData = [];
        let kostradUnits = [];
        let materialCategories = [];
        let materialTypes = [];

        // Initialize when document is ready
        document.addEventListener('DOMContentLoaded', function() {
            loadKostradUnits();
            loadMaterialCategories();
            setupEventListeners();
        });

        // Setup event listeners
        function setupEventListeners() {
            // Category change event
            document.getElementById('material-category').addEventListener('change', function() {
                const categoryId = this.value;
                if (categoryId) {
                    loadMaterialTypes(categoryId);
                } else {
                    document.getElementById('material-type').innerHTML = '<option value="">-- Pilih Sub-Materil --</option>';
                    document.getElementById('material-type').disabled = true;
                }
            });

            // Input validation for conditions
            ['kondisi-baik', 'kondisi-rr', 'kondisi-rb'].forEach(id => {
                document.getElementById(id).addEventListener('input', validateConditions);
            });

            document.getElementById('jumlah-total').addEventListener('input', validateConditions);
        }

        // Load KOSTRAD units
        function loadKostradUnits() {
            fetch('api/get_kostrad_units.php')
                .then(response => response.json())
                .then(data => {
                    kostradUnits = data;
                    const select = document.getElementById('unit-select');
                    select.innerHTML = '<option value="">-- Pilih Unit --</option>';
                    
                    data.forEach(unit => {
                        const option = document.createElement('option');
                        option.value = unit.id;
                        option.textContent = `${unit.unit_code} - ${unit.unit_name}`;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading units:', error);
                    alert('Error loading units: ' + error.message);
                });
        }

        // Load material categories
        function loadMaterialCategories() {
            fetch('api/get_material_categories.php')
                .then(response => response.json())
                .then(data => {
                    materialCategories = data;
                    const select = document.getElementById('material-category');
                    select.innerHTML = '<option value="">-- Pilih Kategori Materil --</option>';
                    
                    data.forEach(category => {
                        const option = document.createElement('option');
                        option.value = category.id;
                        option.textContent = category.category_name;
                        select.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error('Error loading categories:', error);
                    alert('Error loading categories: ' + error.message);
                });
        }

        // Load material types based on category
        function loadMaterialTypes(categoryId) {
            fetch(`api/get_material_types.php?category_id=${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    materialTypes = data;
                    const select = document.getElementById('material-type');
                    select.innerHTML = '<option value="">-- Pilih Sub-Materil --</option>';
                    
                    data.forEach(type => {
                        const option = document.createElement('option');
                        option.value = type.id;
                        option.textContent = `${type.type_name} (${type.unit_measurement})`;
                        select.appendChild(option);
                    });
                    
                    select.disabled = false;
                })
                .catch(error => {
                    console.error('Error loading material types:', error);
                    alert('Error loading material types: ' + error.message);
                });
        }

        // Validate condition inputs
        function validateConditions() {
            const total = parseInt(document.getElementById('jumlah-total').value) || 0;
            const baik = parseInt(document.getElementById('kondisi-baik').value) || 0;
            const rr = parseInt(document.getElementById('kondisi-rr').value) || 0;
            const rb = parseInt(document.getElementById('kondisi-rb').value) || 0;

            const sum = baik + rr + rb;
            
            // Update border colors based on validation
            const totalInput = document.getElementById('jumlah-total');
            const baikInput = document.getElementById('kondisi-baik');
            const rrInput = document.getElementById('kondisi-rr');
            const rbInput = document.getElementById('kondisi-rb');

            if (total > 0 && sum !== total) {
                [baikInput, rrInput, rbInput].forEach(input => {
                    input.style.borderColor = '#dc3545';
                });
                totalInput.style.borderColor = '#dc3545';
            } else {
                [totalInput, baikInput, rrInput, rbInput].forEach(input => {
                    input.style.borderColor = '#ced4da';
                });
            }
        }

        // Add data to table
        function addToTable() {
            // Validate form
            const unitId = document.getElementById('unit-select').value;
            const categoryId = document.getElementById('material-category').value;
            const typeId = document.getElementById('material-type').value;
            const total = parseInt(document.getElementById('jumlah-total').value) || 0;
            const baik = parseInt(document.getElementById('kondisi-baik').value) || 0;
            const rr = parseInt(document.getElementById('kondisi-rr').value) || 0;
            const rb = parseInt(document.getElementById('kondisi-rb').value) || 0;

            // Validation
            if (!unitId || !categoryId || !typeId) {
                alert('Silakan lengkapi semua pilihan dropdown!');
                return;
            }

            if (total <= 0) {
                alert('Jumlah total harus lebih dari 0!');
                return;
            }

            if (baik + rr + rb !== total) {
                alert('Jumlah kondisi (Baik + Rusak Ringan + Rusak Berat) harus sama dengan Jumlah Total!');
                return;
            }

            // Get text values
            const unitText = document.getElementById('unit-select').selectedOptions[0].text;
            const categoryText = document.getElementById('material-category').selectedOptions[0].text;
            const typeText = document.getElementById('material-type').selectedOptions[0].text;
            const keterangan = document.getElementById('keterangan').value;

            // Calculate percentage
            const percentage = total > 0 ? ((baik / total) * 100).toFixed(2) : 0;

            // Create data object
            const data = {
                unit_id: unitId,
                unit_text: unitText,
                category_id: categoryId,
                category_text: categoryText,
                material_type_id: typeId,
                type_text: typeText,
                jumlah_total: total,
                kondisi_b: baik,
                kondisi_rr: rr,
                kondisi_rb: rb,
                persentase_kesiapan: percentage,
                keterangan: keterangan
            };

            // Add to array
            inputData.push(data);
            
            // Update table
            updateTable();
            
            // Reset form
            resetForm();
            
            // Enable submit button
            document.getElementById('submit-all-data').disabled = false;
        }

        // Update table display
        function updateTable() {
            const tbody = document.getElementById('result-table-body');
            
            if (inputData.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="11" class="text-center text-muted">
                            Belum ada data yang diinput. Silakan isi form di atas untuk menambah data.
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = '';
            inputData.forEach((data, index) => {
                const row = document.createElement('tr');
                
                // Determine percentage class
                const percentageClass = getPercentageClass(parseFloat(data.persentase_kesiapan));
                
                row.innerHTML = `
                    <td>${index + 1}</td>
                    <td>${data.unit_text}</td>
                    <td>${data.category_text}</td>
                    <td>${data.type_text}</td>
                    <td class="text-center">${formatNumber(data.jumlah_total)}</td>
                    <td class="text-center"><span class="badge bg-success">${formatNumber(data.kondisi_b)}</span></td>
                    <td class="text-center"><span class="badge bg-warning">${formatNumber(data.kondisi_rr)}</span></td>
                    <td class="text-center"><span class="badge bg-danger">${formatNumber(data.kondisi_rb)}</span></td>
                    <td class="text-center"><span class="badge ${percentageClass}">${data.persentase_kesiapan}%</span></td>
                    <td>${data.keterangan || '-'}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-danger" onclick="removeFromTable(${index})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                `;
                tbody.appendChild(row);
            });
        }

        // Get percentage badge class
        function getPercentageClass(percentage) {
            if (percentage >= 90) return 'bg-success';
            if (percentage >= 75) return 'bg-info';
            if (percentage >= 60) return 'bg-warning';
            return 'bg-danger';
        }

        // Format number with thousand separator
        function formatNumber(num) {
            return new Intl.NumberFormat('id-ID').format(num);
        }

        // Remove item from table
        function removeFromTable(index) {
            if (confirm('Apakah Anda yakin ingin menghapus item ini?')) {
                inputData.splice(index, 1);
                updateTable();
                
                if (inputData.length === 0) {
                    document.getElementById('submit-all-data').disabled = true;
                }
            }
        }

        // Clear all table data
        function clearTable() {
            if (inputData.length === 0) {
                alert('Tabel sudah kosong!');
                return;
            }
            
            if (confirm('Apakah Anda yakin ingin menghapus semua data di tabel?')) {
                inputData = [];
                updateTable();
                document.getElementById('submit-all-data').disabled = true;
            }
        }

        // Reset form
        function resetForm() {
            document.getElementById('alutsista-form').reset();
            document.getElementById('material-type').innerHTML = '<option value="">-- Pilih Sub-Materil --</option>';
            document.getElementById('material-type').disabled = true;
            
            // Reset border colors
            ['unit-select', 'material-category', 'material-type', 'jumlah-total', 'kondisi-baik', 'kondisi-rr', 'kondisi-rb'].forEach(id => {
                document.getElementById(id).style.borderColor = '#ced4da';
            });
        }

        // Submit all data
        function submitAllData() {
            if (inputData.length === 0) {
                alert('Tidak ada data untuk dikirim!');
                return;
            }

            if (!confirm(`Apakah Anda yakin ingin mengirim ${inputData.length} item data alutsista?`)) {
                return;
            }

            // Show loading
            const submitBtn = document.getElementById('submit-all-data');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i> Mengirim Data...';
            submitBtn.disabled = true;

            // Send data to server
            fetch('api/save_alutsista_data.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ data: inputData })
            })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    alert(`Data berhasil disimpan! ${result.saved_count} item telah disimpan.`);
                    
                    // Clear data and reset form
                    inputData = [];
                    updateTable();
                    resetForm();
                    
                    // Optionally redirect to calendar page
                    if (confirm('Data berhasil disimpan. Apakah Anda ingin melihat data di peta?')) {
                        window.location.href = 'calendar.php';
                    }
                } else {
                    alert('Error menyimpan data: ' + (result.error || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error mengirim data: ' + error.message);
            })
            .finally(() => {
                // Restore button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = inputData.length === 0;
            });
        }
        </script>

        <script src="assets/js/app.js"></script>

    </body>

</html>