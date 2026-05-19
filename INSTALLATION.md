# Panduan Instalasi Sistem Informasi Repository Jurnal (SIREJU)

## Persyaratan Sistem

### Software yang Diperlukan
- **XAMPP** (Apache + MySQL + PHP >= 8.1)
- **Composer** (v2+)
- **Node.js** (v16+) + npm
- **Git** (opsional)

### Spesifikasi Minimum
- RAM: 4GB
- Storage: 2GB free space
- OS: Windows 10/11, Linux, macOS

## Langkah Instalasi

### 1. Persiapan Environment

#### Install XAMPP
1. Download XAMPP dari https://www.apachefriends.org/
2. Install XAMPP di `C:\xampp\`
3. Start Apache dan MySQL dari XAMPP Control Panel

#### Install Composer
1. Download Composer dari https://getcomposer.org/
2. Install Composer dengan default settings
3. Verifikasi instalasi: `composer --version`

#### Install Node.js
1. Download Node.js dari https://nodejs.org/
2. Install dengan default settings
3. Verifikasi instalasi: `node --version` dan `npm --version`

### 2. Setup Database

#### Buat Database MySQL
```sql
CREATE DATABASE repository_jurnal CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### Konfigurasi Database
Edit file `.env`:
```env
APP_NAME="SIREJU"
APP_ENV=local
APP_KEY=base64:your-app-key-here
APP_DEBUG=true
APP_URL=http://localhost/repository_jurnal/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=repository_jurnal
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

# Build assets
npm run build
```

### 4. Setup Laravel

```bash
# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Run seeders
php artisan db:seed

# Create storage link
php artisan storage:link

# Clear cache
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 5. Konfigurasi Apache Virtual Host (Opsional)

#### Buat Virtual Host
Edit file `C:\xampp\apache\conf\extra\httpd-vhosts.conf`:

```apache
<VirtualHost *:80>
    ServerName sireju.local
    DocumentRoot "C:/xampp/htdocs/repository_jurnal/public"
    <Directory "C:/xampp/htdocs/repository_jurnal/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

#### Update Hosts File
Edit file `C:\Windows\System32\drivers\etc\hosts`:
```
127.0.0.1 sireju.local
```

#### Restart Apache
Restart Apache dari XAMPP Control Panel

### 6. Konfigurasi PHP

#### Update php.ini
Edit file `C:\xampp\php\php.ini`:
```ini
upload_max_filesize = 12M
post_max_size = 12M
max_execution_time = 300
memory_limit = 256M
```

#### Restart Apache
Restart Apache setelah perubahan php.ini

### 7. Verifikasi Instalasi

#### Akses Aplikasi
- **Dengan Virtual Host**: http://sireju.local
- **Tanpa Virtual Host**: http://localhost/repository_jurnal/public

#### Login Default
- **Admin**: admin@example.com / Admin123!
- **Dosen/Mahasiswa**: ahmad@example.com / password
- **Guest**: guest@example.com / password

## Troubleshooting

### Error: Database Connection
```bash
# Cek koneksi database
php artisan tinker
>>> DB::connection()->getPdo();
```

### Error: Storage Link
```bash
# Hapus link lama dan buat baru
rm public/storage
php artisan storage:link
```

### Error: Permission Denied
```bash
# Set permission (Linux/Mac)
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Error: Composer Install
```bash
# Clear cache dan install ulang
composer clear-cache
composer install --no-cache
```

## Backup & Maintenance

### Backup Database
```bash
# Backup database
mysqldump -u root -p repository_jurnal > backup_$(date +%Y%m%d).sql
```

### Backup Files
```bash
# Backup storage
tar -czf storage_backup_$(date +%Y%m%d).tar.gz storage/
```

### Update Dependencies
```bash
# Update PHP dependencies
composer update

# Update Node.js dependencies
npm update
npm run build
```

## Production Deployment

### Environment Production
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Database production
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-db-password
```

### Optimize Laravel
```bash
# Optimize untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### Set Permissions
```bash
# Set proper permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

## Support

Jika mengalami masalah, silakan cek:
1. Log Laravel: `storage/logs/laravel.log`
2. Log Apache: `C:\xampp\apache\logs\error.log`
3. Log MySQL: `C:\xampp\mysql\data\*.err`

Untuk bantuan lebih lanjut, hubungi tim development.

