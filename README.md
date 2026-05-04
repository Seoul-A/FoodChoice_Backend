<div align="center">
  <br/>
  <h1>Food Choice</h1>
  <p>Temukan, simpan, dan nikmati menu terbaik — semuanya dalam satu tempat.</p>
  <br/>

  ![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel&logoColor=white)
  ![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white)
  ![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=flat-square&logo=mysql&logoColor=white)
  ![License](https://img.shields.io/badge/License-MIT-orange?style=flat-square)

  <br/>
</div>

---

## Tentang Food Choice

**Food Choice** adalah platform kuliner berbasis web yang memudahkan pengguna menemukan dan menyimpan menu makanan favorit mereka. Dibangun di atas Laravel 11 dengan antarmuka yang ringan dan responsif.

---

## Fitur Utama

**Cari menu dengan cepat**
Ketik nama makanan, langsung tampil rekomendasi terbaik dari seluruh pilihan yang tersedia.

**Simpan menu favorit**
Like menu yang kamu suka. Semua tersimpan di riwayat, mudah diakses kapan saja.

**Pilihan menu terkurasi**
Setiap menu dikelola dan diperbarui admin agar selalu akurat, lengkap, dan menggugah selera.

---

## Instalasi

```bash
# Clone repositori
git clone https://github.com/username/food-choice.git
cd food-choice

# Install dependensi
composer install
npm install && npm run build

# Konfigurasi environment
cp .env.example .env
php artisan key:generate
```

Atur koneksi database di `.env`:

```env
DB_DATABASE=food_choice
DB_USERNAME=root
DB_PASSWORD=
```

```bash
# Migrasi & jalankan
php artisan migrate --seed
php artisan serve
```

Buka **http://localhost:8000**

---

## Teknologi

| | |
|---|---|
| Backend | Laravel 11, PHP 8.2+ |
| Database | MySQL 8.0 |
| Frontend | Blade, Tailwind CSS |
| Auth | Laravel Sanctum |
| API | RESTful |

---

## Akun Default

| Role | Email | Password |
|---|---|---|
| Admin | admin@foodchoice.com | password |
| User | user@foodchoice.com | password |

---

## Lisensi

[MIT](LICENSE) © Food Choice
