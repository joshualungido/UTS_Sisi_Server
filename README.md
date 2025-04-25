<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/joshualungido/UTS_Sisi_Server/actions"><img src="https://github.com/joshualungido/UTS_Sisi_Server/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## UTS Sisi Server - Inventory Management

UTS Sisi Server - Inventory Management adalah aplikasi berbasis Laravel 12 yang dibuat untuk tugas UTS Sisi Server. Aplikasi ini memungkinkan pengguna untuk mengelola item, kategori, dan suppliers, serta menampilkan laporan stok dan ringkasan sistem. Proyek ini dijalankan menggunakan Docke, dengan kode yang tersedia di GitHub: [UTS_Sisi_Server](https://github.com/joshualungido/UTS_Sisi_Server).

Fitur utama proyek ini meliputi:

- Create dan Read data untuk Item, Category, dan Supplier.
- Laporan stok barang, termasuk stok total, total nilai stok, dan rata-rata harga.
- Laporan barang dengan stok di bawah 5 unit.
- Ringkasan per kategori dan per pemasok.
- Ringkasan sistem keseluruhan.

## Alur Pengerjaan Proyek

Berikut adalah langkah-langkah yang saya lakukan selama pengembangan proyek ini.

### Step 1: Inisialisasi Proyek

Saya memulai dengan membuat proyek Laravel 12 baru menggunakan Laragon sebagai tempat create project. Saya membuka terminal Laragon, navigasikan ke direktori www di C:\laragon\www, lalu membuat proyek Laravel baru bernama UTSJoshua menggunakan Composer. Setelah itu, saya masuk ke direktori UTSJoshua.

### Step 2: Konfigurasi Dockerfile

Saya membuat file Dockerfile di root proyek (C:\laragon\www\UTSJoshua). Saya menggunakan PHP 8.2 FPM, menginstal dependensi seperti git, curl, ekstensi PHP, dan Composer, lalu mengatur working directory, menyalin proyek, menginstal dependensi Composer, mengatur izin folder, dan mengekspos port 8000.

### Step 3: Konfigurasi docker-compose.yml

Saya membuat file docker-compose.yml di root proyek untuk mengatur layanan aplikasi (PHP) dan database (MySQL). Saya mendefinisikan dua layanan: app (menggunakan Dockerfile) dan db (menggunakan MySQL 8.0), lalu mengatur volume, port (8000 untuk app, 3306 untuk db).

### Step 4: Konfigurasi .env file

Saya mengatur file .env untuk menghubungkan aplikasi dengan database MySQL di Docker.Saya mengedit file .env untuk konfigurasi database (host: db, database: uts_joshua_db, username: root, password: root), lalu menghasilkan application key menggunakan perintah php artisan.

### Step 5: Running Docker Compose

Saya menjalankan Docker untuk membangun dan menjalankan container aplikasi dan database dengan perintah docker compose up -d --build dan menjalankannya dengan perintah docker compose up -d.

### Step 6: Membuat Database

Saya membuat migrasi untuk tabel-tabel yang sudah ditentukan: Admins, Categories, Suppliers, dan Items. Saya membuat file migrasi untuk setiap tabel menggunakan perintah php artisan, lalu mengedit file migrasi di folder database/migrations untuk mendefinisikan struktur tabel sesuai ERD: 
- Tabel admins (id, username, password, email, timestamps)
- Tabel categories (id, name, description, created_by sebagai foreign key ke admins, timestamps)
- Tabel suppliers (id, name, contact_info, created_by sebagai foreign key ke admins, timestamps)
- Tabel items (id, name, description, price, quantity, category_id sebagai foreign key ke categories, supplier_id sebagai foreign key ke suppliers, created_by sebagai foreign key ke admins, timestamps). 
Setelah itu, saya menjalankan migrasi menggunakan perintah php artisan.

### Step 7: Membuat Models

Saya membuat model untuk setiap tabel (Admin, Category, Supplier, Item) menggunakan perintah php artisan, lalu mengedit file model di folder app/Models untuk menambahkan relasi: Admin memiliki relasi hasMany ke Category, Supplier, dan Item; Category memiliki relasi belongsTo ke Admin dan hasMany ke Item; Supplier memiliki relasi belongsTo ke Admin dan hasMany ke Item; Item memiliki relasi belongsTo ke Category, Supplier, dan Admin.

### Step 8: Membuat AdminSeeder

Saya membuat seeder untuk mengisi data admin awal. Saya membuat seeder untuk tabel admins menggunakan perintah php artisan, mengedit file di database/seeders/AdminSeeder.php untuk menambahkan data admin default (username: admin, password: password123), lalu menjalankan seeder menggunakan perintah php artisan.

### Step 9: Membuat Controllers

Saya membuat controller (ItemController, CategoryController, SupplierController, DashboardController) menggunakan perintah php artisan, lalu mengedit file controller di folder app/Http/Controllers untuk menambahkan logika: ItemController untuk CRUD item dan laporan stok, CategoryController untuk CRUD kategori dan laporan per kategori, SupplierController untuk CRUD pemasok dan ringkasan barang per pemasok, serta DashboardController untuk ringkasan sistem.

### Step 10: Mengedit Routes

Saya mengedit file routes/web.php untuk menambahkan rute: Dashboard di URL /, Items di /items untuk index, create, dan store, Categories di /categories untuk index, create, store, serta /categories/{id}/report, dan Suppliers di /suppliers untuk index, create, dan store.

### Step 11: Membuat Views

Saya membuat view untuk antarmuka pengguna menggunakan Blade dengan desain yang sederhana tapi rapi menggunakan Tailwind CSS. Saya membuat folder layouts, items, categories, dan suppliers di resources/views, lalu membuat file view: app.blade.php sebagai layout utama, dashboard.blade.php untuk ringkasan sistem, index.blade.php dan create.blade.php di folder items untuk menampilkan dan menambah item, index.blade.php, create.blade.php, dan report.blade.php di folder categories untuk menampilkan, menambah, dan laporan kategori, serta index.blade.php dan create.blade.php di folder suppliers untuk menampilkan dan menambah suppliers.

### Step 12: Testing Aplikasi

Saya menguji aplikasi untuk memastikan semua fitur berjalan: mengakses localhost:8000 untuk melihat dashboard, menambah data kategori, pemasok, dan item melalui form, memeriksa laporan stok, laporan per kategori, ringkasan pemasok, serta memastikan semua data ditampilkan dengan benar, termasuk kolom "Created By".

### Step 13: Push ke GitHub

Setelah semua fitur selesai, saya mengunggah proyek ke GitHub: menginisialisasi Git di direktori proyek, menambahkan semua file ke staging area, membuat commit pertama dengan pesan "First commit", menambahkan remote repository GitHub (https://github.com/joshualungido/UTS_Sisi_Server.git), lalu push kode ke GitHub.