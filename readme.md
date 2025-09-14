# 📖 Guide untuk Halaman Portfolio Arinal Haq Fauziah

## 🎯 Deskripsi Proyek
Halaman portfolio profesional untuk Arinal Haq Fauziah yang menampilkan profil, link sosial media, dan produk premium dengan desain modern dan responsif.

## 🚀 Fitur Utama

### ✨ Fitur Desain
- **Glassmorphism Effect** - Desain modern dengan efek kaca transparan
- **Animated Background** - Latar belakang dengan animasi partikel dan gradient
- **Responsive Design** - Tampilan optimal di semua perangkat
- **Smooth Animations** - Transisi dan animasi yang halus

### 🛠️ Fitur Fungsional
- **Admin Panel** - Sistem login untuk mengelola konten
- **Dynamic Content** - Konten dari database (links dan products)
- **Social Media Integration** - Tautan ke berbagai platform sosial
- **Product Showcase** - Display produk dengan harga dan deskripsi

## 📁 Struktur File

```
project-folder/
│
├── index.php              # Halaman utama portfolio
├── login.php             # Halaman login admin
├── dashboard.php         # Dashboard admin
├── links.php            # Kelola link
├── products.php         # Kelola produk
├── config.php           # Konfigurasi database
├── logout.php           # Logout admin
├── redirect.php         # Halaman redirect
│
├── images/              # Folder untuk gambar
│   └── 20250320_190104[1].png  # Favicon
│
└── database.sqlite      # Database SQLite
```

## 🗄️ Struktur Database

### Tabel `users`
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    email TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### Tabel `links`
```sql
CREATE TABLE links (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    url TEXT NOT NULL,
    description TEXT,
    icon TEXT,
    color TEXT DEFAULT 'btn-primary',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

### Tabel `products`
```sql
CREATE TABLE products (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    price INTEGER,
    type TEXT,
    date TEXT,
    url TEXT NOT NULL,
    image TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

## ⚙️ Instalasi dan Setup

### 1. Persyaratan Sistem
- PHP 7.4 atau lebih baru
- SQLite extension untuk PHP
- Web server (Apache/Nginx)

### 2. Langkah Instalasi
```bash
# Clone atau download project
git clone [repository-url]
cd project-folder

# Pastikan folder memiliki izin write untuk database
chmod 755 .
chmod 666 database.sqlite (jika sudah ada)

# Atau biarkan PHP membuat database otomatis
```

### 3. Konfigurasi
File `config.php` akan otomatis membuat:
- Koneksi database SQLite
- Tabel-tabel yang diperlukan
- User admin default (username: `admin`, password: `admin123`)

### 4. Akses Admin
1. Buka halaman portfolio di browser
2. Klik tombol "Admin Login" di pojok kanan atas
3. Login dengan:
   - Username: `admin`
   - Password: `admin123`
4. Ganti password default setelah login pertama

## 🎨 Customization

### Mengubah Informasi Profil
Edit bagian berikut di `index.php`:
```php
// Profile Section
<h1 class="profile-name">Arinal Haq Fauziah</h1>
<p class="profile-bio">Menginspirasi melalui kata-kata...</p>
```

### Menambah/Mengubah Link
1. Login ke admin panel
2. Navigasi ke "Kelola Links"
3. Tambah link baru dengan:
   - Title: Judul link
   - URL: Tautan tujuan
   - Description: Deskripsi singkat
   - Icon: Class FontAwesome (contoh: `fab fa-instagram`)

### Menambah/Mengubah Produk
1. Login ke admin panel
2. Navigasi ke "Kelola Produk"
3. Tambah produk baru dengan:
   - Title: Nama produk
   - Description: Deskripsi produk
   - Price: Harga produk
   - Image: Upload gambar produk
   - URL: Link pembelian

### Mengubah Warna dan Tema
Edit variabel CSS di bagian `:root`:
```css
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --glass-bg: rgba(255, 255, 255, 0.08);
    /* Tambahkan variabel lain sesuai kebutuhan */
}
```

## 🔧 Troubleshooting

### Masalah Umum dan Solusi

1. **Database tidak terbaca**
   - Pastikan folder memiliki izin write
   - Pastikan extension SQLite aktif di PHP

2. **Gambar tidak muncul**
   - Pastikan path gambar benar
   - Pastikan folder `images` ada dan memiliki izin write

3. **Login admin tidak bekerja**
   - Pastikan database created successfully
   - Cek kredensial default di `config.php`

4. **Tampilan tidak responsif**
   - Pastikan semua CSS dan JS load properly
   - Check console browser untuk error

### Security Notes
- ✅ Ganti password default setelah instalasi
- ✅ Regularly backup database.sqlite
- ✅ Validate user input di form admin
- ✅ Sanitize output data di halaman publik

## 📱 Optimasi Mobile

Halaman sudah dioptimalkan untuk:
- 📱 Smartphones (320px+)
- 📟 Tablets (768px+)
- 💻 Desktop (1024px+)

## 🌐 Browser Support

- ✅ Chrome 80+
- ✅ Firefox 75+
- ✅ Safari 13+
- ✅ Edge 80+

## 📞 Support

Untuk bantuan teknis atau pertanyaan:
- Email: contactmhteams@gmail.com
- Documentation: [Link dokumentasi]
- Issues: [Repository issues]

## 📄 License

Proyek ini dilisensikan under MIT License - see file LICENSE untuk detail.

---

**Dibuat dengan ❤️ oleh MHTeams** | **© 2024 Arinal Haq Fauziah Portfolio**