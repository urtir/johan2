-- Script untuk menambahkan data sampel untuk kategori yang belum terisi

-- Tambah data untuk MUNISI (Kategori ID 3)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Divisi 1 Kostrad
    (1, 14, 2500000, 2250000, 150000, 100000, 90.00), -- Munisi Kaliber Kecil
    (1, 15, 45000, 39000, 4000, 2000, 86.67),        -- Munisi Kaliber Besar
    (1, 16, 75000, 68000, 5000, 2000, 90.67),        -- Munisi Khusus
    (1, 17, 2500, 2100, 250, 150, 84.00),            -- Alkap Munisi
    
    -- Divisi 2 Kostrad
    (2, 14, 2200000, 1980000, 130000, 90000, 90.00), -- Munisi Kaliber Kecil
    (2, 15, 40000, 34000, 3500, 2500, 85.00),        -- Munisi Kaliber Besar
    (2, 16, 65000, 57000, 5000, 3000, 87.69),        -- Munisi Khusus
    (2, 17, 2200, 1850, 200, 150, 84.09),            -- Alkap Munisi
    
    -- Divisi 3 Kostrad
    (3, 14, 1900000, 1710000, 110000, 80000, 90.00), -- Munisi Kaliber Kecil
    (3, 15, 35000, 30000, 3000, 2000, 85.71),        -- Munisi Kaliber Besar
    (3, 16, 55000, 49000, 4000, 2000, 89.09),        -- Munisi Khusus
    (3, 17, 1900, 1600, 200, 100, 84.21);            -- Alkap Munisi

-- Tambah data untuk RANMOR (Kategori ID 4)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Divisi 1 Kostrad
    (1, 18, 850, 680, 120, 50, 80.00),   -- Kendaraan Taktis
    (1, 19, 320, 250, 50, 20, 78.13),    -- Kendaraan Khusus
    (1, 20, 1200, 950, 180, 70, 79.17),  -- Kendaraan Administrasi
    
    -- Divisi 2 Kostrad
    (2, 18, 750, 600, 100, 50, 80.00),   -- Kendaraan Taktis
    (2, 19, 280, 215, 45, 20, 76.79),    -- Kendaraan Khusus
    (2, 20, 1050, 840, 150, 60, 80.00),  -- Kendaraan Administrasi
    
    -- Divisi 3 Kostrad
    (3, 18, 650, 520, 90, 40, 80.00),    -- Kendaraan Taktis
    (3, 19, 250, 195, 35, 20, 78.00),    -- Kendaraan Khusus
    (3, 20, 900, 720, 130, 50, 80.00);   -- Kendaraan Administrasi

-- Tambah data untuk ALOPTIK (Kategori ID 5)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Divisi 1 Kostrad
    (1, 21, 2500, 2100, 300, 100, 84.00),  -- Kompas
    (1, 22, 1800, 1500, 200, 100, 83.33),  -- Teropong 7x50
    (1, 23, 1500, 1200, 200, 100, 80.00),  -- Teropong 6x30
    (1, 24, 250, 200, 35, 15, 80.00),      -- TBSS
    (1, 25, 350, 300, 35, 15, 85.71),      -- TBSM
    (1, 26, 450, 380, 50, 20, 84.44),      -- NVG
    
    -- Divisi 2 Kostrad
    (2, 21, 2200, 1800, 250, 150, 81.82),  -- Kompas
    (2, 22, 1600, 1350, 150, 100, 84.38),  -- Teropong 7x50
    (2, 23, 1300, 1050, 150, 100, 80.77),  -- Teropong 6x30
    (2, 24, 220, 180, 30, 10, 81.82),      -- TBSS
    (2, 25, 320, 270, 35, 15, 84.38),      -- TBSM
    (2, 26, 400, 340, 40, 20, 85.00),      -- NVG
    
    -- Divisi 3 Kostrad
    (3, 21, 1900, 1550, 250, 100, 81.58),  -- Kompas
    (3, 22, 1400, 1150, 150, 100, 82.14),  -- Teropong 7x50
    (3, 23, 1100, 900, 120, 80, 81.82),    -- Teropong 6x30
    (3, 24, 190, 155, 25, 10, 81.58),      -- TBSS
    (3, 25, 280, 230, 35, 15, 82.14),      -- TBSM
    (3, 26, 350, 290, 40, 20, 82.86);      -- NVG

-- Tambah data untuk ALPALSUS (Kategori ID 6)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Tidak ada material_types untuk ALPALSUS, jadi kita lewati
    (1, 6, 580, 490, 60, 30, 84.48),  -- Nilai langsung untuk kategori 6
    (2, 6, 520, 430, 60, 30, 82.69),
    (3, 6, 450, 370, 50, 30, 82.22);

-- Tambah data untuk PESAWAT TERBANG (Kategori ID 7)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Divisi 1 Kostrad
    (1, 27, 8, 6, 1, 1, 75.00),   -- Heli Serbu
    (1, 28, 6, 5, 1, 0, 83.33),   -- Heli Serang
    (1, 29, 4, 3, 1, 0, 75.00),   -- Heli Latih
    (1, 30, 10, 8, 1, 1, 80.00),  -- Heli Sena
    (1, 31, 5, 4, 1, 0, 80.00),   -- Sayap Tetap
    
    -- Divisi 2 Kostrad
    (2, 27, 6, 5, 1, 0, 83.33),   -- Heli Serbu
    (2, 28, 5, 4, 1, 0, 80.00),   -- Heli Serang
    (2, 29, 3, 2, 1, 0, 66.67),   -- Heli Latih
    (2, 30, 8, 6, 1, 1, 75.00),   -- Heli Sena
    (2, 31, 4, 3, 1, 0, 75.00),   -- Sayap Tetap
    
    -- Divisi 3 Kostrad
    (3, 27, 5, 4, 1, 0, 80.00),   -- Heli Serbu
    (3, 28, 4, 3, 1, 0, 75.00),   -- Heli Serang
    (3, 29, 3, 3, 0, 0, 100.00),  -- Heli Latih
    (3, 30, 7, 5, 1, 1, 71.43),   -- Heli Sena
    (3, 31, 3, 2, 1, 0, 66.67);   -- Sayap Tetap

-- Tambah data untuk ALANG AIR (Kategori ID 8)
INSERT INTO alutsista_inventory 
    (kostrad_unit_id, material_type_id, jumlah_total, kondisi_b, kondisi_rr, kondisi_rb, persentase_kesiapan) 
VALUES
    -- Divisi 1 Kostrad
    (1, 32, 12, 10, 1, 1, 83.33),   -- Kapal
    (1, 33, 25, 20, 3, 2, 80.00),   -- Kapal Motor Cepat
    (1, 34, 45, 38, 5, 2, 84.44),   -- Landing Craft
    (1, 35, 70, 58, 8, 4, 82.86),   -- Motor Air
    
    -- Divisi 2 Kostrad
    (2, 32, 10, 8, 1, 1, 80.00),   -- Kapal
    (2, 33, 20, 16, 3, 1, 80.00),   -- Kapal Motor Cepat
    (2, 34, 40, 32, 6, 2, 80.00),   -- Landing Craft
    (2, 35, 60, 48, 8, 4, 80.00),   -- Motor Air
    
    -- Divisi 3 Kostrad
    (3, 32, 8, 6, 1, 1, 75.00),     -- Kapal
    (3, 33, 18, 14, 3, 1, 77.78),   -- Kapal Motor Cepat
    (3, 34, 35, 28, 5, 2, 80.00),   -- Landing Craft
    (3, 35, 50, 40, 7, 3, 80.00);   -- Motor Air
