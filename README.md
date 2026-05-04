<div align="center">

<img src="https://laravel.com/img/logomark.min.svg" width="80" alt="Laravel Logo"/>

# 🍜 FoodApp — Aplikasi Pesan Makanan Online

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://mysql.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

**Platform pemesanan makanan online berbasis web & mobile yang modern, cepat, dan mudah digunakan.**

[Demo](https://demo.yourapp.com) · [Dokumentasi](docs/) · [Laporkan Bug](issues/) · [Request Fitur](issues/)

</div>

---

## 📱 Tampilan Aplikasi

<div align="center">

| Home & Pencarian | Detail Produk | Riwayat Like |
|:---:|:---:|:---:|
| ![Home](screenshots/home.png) | ![Detail](screenshots/detail.png) | ![Riwayat](screenshots/riwayat.png) |

| Profil Pengguna | Halaman Login | Admin Dashboard |
|:---:|:---:|:---:|
| ![Profil](screenshots/profil.png) | ![Login](screenshots/login.png) | ![Admin](screenshots/admin.png) |

</div>

---

## ✨ Fitur Unggulan

- 🔍 **Pencarian Makanan** — Cari menu favorit dengan cepat dan akurat
- ❤️ **Riwayat Like** — Simpan dan kelola menu yang kamu sukai
- 👤 **Profil Pengguna** — Kelola akun dan preferensi pribadi
- 🛡️ **Panel Admin** — Dashboard lengkap untuk manajemen konten & pesanan
- 🔐 **Autentikasi Aman** — Login & register dengan validasi ketat
- 📱 **Desain Responsif** — Tampilan optimal di semua ukuran layar

---

## 🛠️ Teknologi yang Digunakan

| Layer | Teknologi |
|-------|-----------|
| **Backend** | Laravel 11, PHP 8.2+ |
| **Database** | MySQL 8.0 |
| **Frontend** | Blade Template, Tailwind CSS |
| **Auth** | Laravel Sanctum / Breeze |
| **Storage** | Laravel Storage (local/S3) |
| **API** | RESTful API (JSON) |

---

## 🚀 Instalasi & Setup

### Prasyarat

Pastikan sistem kamu sudah terinstal:
- PHP >= 8.2
- Composer >= 2.x
- MySQL >= 8.0
- Node.js >= 18.x & NPM

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/username/foodapp.git
cd foodapp
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Install dependensi Node.js**
```bash
npm install && npm run build
```

**4. Konfigurasi environment**
```bash
cp .env.example .env
php artisan key:generate
```

**5. Atur database di file `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=foodapp
DB_USERNAME=root
DB_PASSWORD=your_password
```

**6. Migrasi & seeder database**
```bash
php artisan migrate --seed
```

**7. Jalankan server**
```bash
php artisan serve
```

Buka browser dan akses: **http://localhost:8000** 🎉

---

## 📂 Struktur Direktori

```
foodapp/
├── app/
│   ├── Http/
│   │   ├── Controllers/        # Controller utama aplikasi
│   │   └── Middleware/         # Middleware autentikasi & role
│   ├── Models/                 # Eloquent models
│   └── Services/               # Business logic layer
├── database/
│   ├── migrations/             # Skema database
│   └── seeders/                # Data awal (dummy)
├── resources/
│   ├── views/                  # Blade templates
│   │   ├── auth/               # Login, Register
│   │   ├── admin/              # Panel admin
│   │   └── user/               # Halaman pengguna
│   └── js/ & css/              # Assets frontend
├── routes/
│   ├── web.php                 # Route web
│   └── api.php                 # Route API
└── public/                     # Entry point publik
```

---

## 🔑 Akun Default (Setelah Seeder)

| Role | Email | Password |
|------|-------|----------|
| **Admin** | admin@foodapp.com | password |
| **User** | user@foodapp.com | password |

> ⚠️ Ganti password default setelah login pertama kali!

---

## 📡 API Endpoints

```
GET    /api/foods              → Daftar semua makanan
GET    /api/foods/{id}         → Detail makanan
GET    /api/foods/search?q=    → Pencarian makanan
POST   /api/auth/login         → Login pengguna
POST   /api/auth/register      → Registrasi pengguna
GET    /api/user/likes         → Riwayat like pengguna
POST   /api/user/likes/{id}    → Toggle like makanan
GET    /api/admin/foods        → [Admin] Kelola makanan
```

---

## 🧪 Testing

```bash
# Jalankan semua test
php artisan test

# Test dengan coverage
php artisan test --coverage
```

---

## 🤝 Kontribusi

Kontribusi sangat disambut! Silakan ikuti langkah berikut:

1. **Fork** repository ini
2. Buat branch fitur baru: `git checkout -b feature/nama-fitur`
3. Commit perubahan: `git commit -m 'feat: tambah fitur baru'`
4. Push ke branch: `git push origin feature/nama-fitur`
5. Buka **Pull Request**

Baca [CONTRIBUTING.md](CONTRIBUTING.md) untuk panduan lebih lengkap.

---

## 📄 Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

<div align="center">

Dibuat dengan ❤️ menggunakan [Laravel](https://laravel.com)

⭐ Jangan lupa beri bintang jika proyek ini membantu kamu!

</div>
