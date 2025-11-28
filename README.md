# Si Panda

Aplikasi berbasis web yang digunakan untuk mengelola surat masuk, surat keluar, disposisi, arsip, dan laporan secara digital. Sistem ini mempermudah pencatatan, pelacakan, dan penyimpanan dokumen tanpa harus menggunakan buku agenda atau arsip fisik.

## Fitur Utama

- 📥 Manajemen Surat Masuk
- 📤 Manajemen Surat Keluar
- 🗄️ Arsip Digital
- 📊 Laporan dan Statistik
- 🔍 Pencarian dan Filter
- 📈 Tracking Arus Surat
- 📄 Export ke PDF

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- Web Server (Apache/Nginx)

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/NugrahaAji/SiPanda.git
cd SiPanda
```

### 2. Install Dependencies

```bash
npm install
composer install
```

### 3. Konfigurasi Environment

```bash
# Copy file .env.example
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Konfigurasi Database

Edit file `.env` dan sesuaikan dengan konfigurasi database Anda:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sipanda
DB_USERNAME=postgres
DB_PASSWORD=
```

### 5. Migrasi Database

```bash
php artisan migrate
```

### 6. Link Storage

```bash
php artisan storage:link
```

### 8. Compile Assets

```bash
# Development
npm run dev

# Production
npm run build
```

### 9. Jalankan Aplikasi

```bash
php artisan serve
```

Aplikasi dapat diakses di: **http://localhost:8000**

## Kontak

- **Repository**: https://github.com/NugrahaAji/SiPanda
- **Issues**: https://github.com/NugrahaAji/SiPanda/issues

---

**Made with ❤️ by Si Panda Team**
