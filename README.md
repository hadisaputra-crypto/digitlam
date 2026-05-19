# Sistem Informasi Repository Jurnal (SIREJU)

Sistem Informasi Repository Jurnal adalah aplikasi web berbasis Laravel 10 yang dirancang untuk mengelola repository jurnal akademik dengan fitur upload, pencarian, dan download yang aman.

## 🚀 Fitur Utama

### 👥 Multi-Role System
- **Admin**: Manajemen penuh sistem, verifikasi jurnal, manajemen user
- **Dosen/Mahasiswa**: Upload jurnal, download jurnal, manajemen jurnal sendiri
- **Guest**: Pencarian dan lihat jurnal (tanpa download)

### 📚 Manajemen Jurnal
- Upload file PDF (max 10MB)
- Metadata lengkap (judul, abstrak, penulis, keywords, tahun)
- Status workflow (Draft → Published/Rejected)
- Kategori jurnal
- Full-text search dengan MySQL

### 🔒 Keamanan
- Role-based access control (RBAC)
- Rate limiting untuk download (10/menit)
- File validation (PDF only)
- Secure file storage
- Activity logging

### 📊 Dashboard Admin
- Statistik jurnal dan user
- Chart distribusi per kategori dan tahun
- Log aktivitas real-time
- Manajemen user dan kategori

### 🔍 Pencarian Canggih
- Full-text search MySQL
- Filter berdasarkan kategori dan tahun
- Pencarian boolean (AND, OR, NOT)
- Phrase search dengan tanda kutip

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 10, PHP 8.1+
- **Frontend**: Blade Templates, Tailwind CSS, Alpine.js
- **Database**: MySQL dengan full-text search
- **Authentication**: Laravel Breeze
- **Charts**: Chart.js
- **File Storage**: Laravel Storage
- **Rate Limiting**: Laravel Throttle

## 📋 Persyaratan Sistem

- PHP >= 8.1
- MySQL >= 5.7
- Composer
- Node.js & npm
- XAMPP (untuk development)

## 🚀 Instalasi Cepat

### 1. Clone Repository
```bash
git clone https://github.com/your-repo/repository_jurnal.git
cd repository_jurnal
```

### 2. Install Dependencies
```bash
composer install
npm install
```

### 3. Setup Environment
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Konfigurasi Database
Edit `.env`:
```env
DB_DATABASE=repository_jurnal
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Setup Database
```bash
php artisan migrate
php artisan db:seed
php artisan storage:link
```

### 6. Build Assets
```bash
npm run build
```

### 7. Jalankan Aplikasi
```bash
php artisan serve
```

Akses: http://localhost:8000

## 👤 Akun Default

| Role | Email | Password | Akses |
|------|-------|----------|-------|
| Admin | admin@example.com | Admin123! | Full access |
| Dosen/Mahasiswa | ahmad@example.com | password | Upload & Download |
| Guest | guest@example.com | password | View only |

## 📁 Struktur Project

```
repository_jurnal/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── JournalController.php
│   │   └── Admin/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Journal.php
│   │   ├── Category.php
│   │   └── ActivityLog.php
│   └── Http/Middleware/
│       └── CheckRole.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── home.blade.php
│   ├── journal/
│   └── admin/
├── routes/
│   └── web.php
├── storage/app/public/journals/
└── public/
```

## 🔧 Konfigurasi

### Database Schema
- **users**: User management dengan role
- **categories**: Kategori jurnal
- **journals**: Data jurnal dengan full-text index
- **activity_logs**: Log aktivitas sistem

### File Storage
- File PDF disimpan di `storage/app/public/journals/`
- Symlink ke `public/storage/`
- Nama file menggunakan UUID

### Rate Limiting
- Download: 10 requests per minute
- Upload: 5 requests per minute
- API: 60 requests per minute

## 📚 Dokumentasi

- [Panduan Instalasi](INSTALLATION.md)
- [Panduan Pengguna](USERS_GUIDE.md)
- [Konfigurasi Cloudflare](CLOUDFLARE.md)
- [Entity Relationship Diagram](ERD.md)
- [Test Report](TEST_REPORT.md)

## 🚀 Deployment

### Production Environment
1. Set `APP_ENV=production`
2. Set `APP_DEBUG=false`
3. Konfigurasi database production
4. Setup SSL certificate
5. Konfigurasi Cloudflare (opsional)

### Optimasi Production
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

## 🔒 Keamanan

### Implemented Security Features
- ✅ Password hashing dengan bcrypt
- ✅ CSRF protection
- ✅ SQL injection prevention
- ✅ XSS protection
- ✅ File upload validation
- ✅ Rate limiting
- ✅ Role-based access control
- ✅ Secure file storage

### Security Best Practices
- Regular security updates
- Strong password policies
- Activity monitoring
- Backup & recovery procedures

## 📊 Monitoring

### Log Files
- Application: `storage/logs/laravel.log`
- Apache: `C:\xampp\apache\logs\error.log`
- MySQL: `C:\xampp\mysql\data\*.err`

### Performance Monitoring
- Database query optimization
- File storage monitoring
- User activity tracking
- System resource usage

## 🤝 Contributing

1. Fork repository
2. Create feature branch
3. Commit changes
4. Push to branch
5. Create Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 Support

- **Email**: support@sireju.example.com
- **Documentation**: https://docs.sireju.example.com
- **Issues**: https://github.com/sireju/issues

## 🎯 Roadmap

### Version 1.1
- [ ] Email notifications
- [ ] Advanced search filters
- [ ] Bulk operations
- [ ] API endpoints

### Version 1.2
- [ ] Mobile app
- [ ] Social sharing
- [ ] Analytics dashboard
- [ ] Multi-language support

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Chart.js
- Alpine.js
- MySQL Community

---

**Sistem Informasi Repository Jurnal (SIREJU)** - Solusi lengkap untuk manajemen repository jurnal akademik.