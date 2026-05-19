# Panduan Pengguna Sistem Informasi Repository Jurnal (SIREJU)

## Daftar Isi
1. [Login dan Registrasi](#login-dan-registrasi)
2. [Panduan Admin](#panduan-admin)
3. [Panduan Dosen/Mahasiswa](#panduan-dosenmahasiswa)
4. [Panduan Guest](#panduan-guest)
5. [Fitur Pencarian](#fitur-pencarian)
6. [Download Jurnal](#download-jurnal)
7. [Troubleshooting](#troubleshooting)

## Login dan Registrasi

### Akses Sistem
- **URL**: http://localhost/repository_jurnal/public
- **URL dengan Virtual Host**: http://sireju.local

### Login Default
| Role | Email | Password | Akses |
|------|-------|----------|-------|
| Admin | admin@example.com | Admin123! | Full access |
| Dosen/Mahasiswa | ahmad@example.com | password | Upload & Download |
| Guest | guest@example.com | password | View only |

### Registrasi User Baru
1. Klik "Register" di halaman login
2. Isi form registrasi:
   - Nama lengkap
   - Email (unik)
   - Password (min 8 karakter)
   - Konfirmasi password
3. Klik "Register"
4. Admin akan memverifikasi dan mengaktifkan akun

## Panduan Admin

### Dashboard Admin
Akses: `/admin` (hanya untuk role admin)

#### Fitur Dashboard
- **Statistik Jurnal**: Total, terbit, draft
- **Statistik User**: Total user per role
- **Chart Kategori**: Distribusi jurnal per kategori
- **Chart Tahun**: Distribusi jurnal per tahun
- **Aktivitas Terbaru**: Log aktivitas sistem
- **Jurnal Terbaru**: Daftar jurnal yang baru diupload

#### Manajemen Jurnal
1. **Lihat Semua Jurnal**
   - Akses: `/admin/journals`
   - Filter berdasarkan status, kategori, tahun
   - Search berdasarkan judul, penulis, keyword

2. **Verifikasi Jurnal**
   - Klik "Edit" pada jurnal
   - Ubah status: Draft → Published/Rejected
   - Tambahkan catatan verifikasi

3. **Edit Jurnal**
   - Update informasi jurnal
   - Ganti file PDF
   - Update metadata

4. **Hapus Jurnal**
   - Klik "Delete" (permanen)
   - Konfirmasi penghapusan

#### Manajemen Kategori
1. **Tambah Kategori**
   - Akses: `/admin/categories`
   - Klik "Create New Category"
   - Isi nama dan deskripsi kategori

2. **Edit Kategori**
   - Klik "Edit" pada kategori
   - Update nama dan deskripsi

3. **Hapus Kategori**
   - Klik "Delete" (jika tidak ada jurnal)

#### Manajemen User
1. **Lihat Semua User**
   - Akses: `/admin/users`
   - Filter berdasarkan role
   - Search berdasarkan nama/email

2. **Edit User**
   - Klik "Edit" pada user
   - Update role, status aktif
   - Reset password

3. **Aktivasi/Deaktivasi User**
   - Toggle status aktif
   - User yang dinonaktifkan tidak bisa login

#### Log Aktivitas
- Akses: `/admin/logs`
- Filter berdasarkan user, action, tanggal
- Export log ke CSV
- Monitor aktivitas mencurigakan

## Panduan Dosen/Mahasiswa

### Dashboard User
Akses: `/dashboard` (setelah login)

#### Fitur Dashboard
- **Jurnal Saya**: Jurnal yang diupload
- **Statistik Upload**: Total jurnal, status
- **Aktivitas Terbaru**: Log aktivitas user

#### Upload Jurnal
1. **Form Upload**
   - Judul jurnal (wajib)
   - Abstrak (wajib)
   - Penulis (pisahkan dengan ;)
   - Tahun publikasi
   - Kategori
   - Keywords (pisahkan dengan ,)
   - File PDF (max 10MB)

2. **Validasi Upload**
   - File harus PDF
   - Ukuran max 10MB
   - Judul harus unik
   - Semua field wajib diisi

3. **Status Jurnal**
   - **Draft**: Belum diverifikasi admin
   - **Published**: Sudah diverifikasi dan bisa didownload
   - **Rejected**: Ditolak admin

#### Edit Jurnal
1. Klik "Edit" pada jurnal
2. Update informasi
3. Ganti file PDF jika perlu
4. Simpan perubahan

#### Download Jurnal
1. Buka halaman detail jurnal
2. Klik "Download PDF"
3. File akan terdownload otomatis
4. Rate limit: 10 download per menit

## Panduan Guest

### Akses Tanpa Login
- Bisa melihat daftar jurnal
- Bisa melihat detail jurnal
- **Tidak bisa download PDF**
- Bisa menggunakan fitur pencarian

#### Fitur yang Tersedia
1. **Pencarian Jurnal**
   - Search berdasarkan judul, penulis, keyword
   - Filter berdasarkan kategori
   - Filter berdasarkan tahun

2. **Detail Jurnal**
   - Lihat abstrak lengkap
   - Lihat metadata jurnal
   - Lihat informasi penulis

3. **Registrasi**
   - Daftar akun baru
   - Tunggu verifikasi admin

## Fitur Pencarian

### Pencarian Umum
1. **Search Box**
   - Masukkan kata kunci
   - Tekan Enter atau klik "Cari"
   - Hasil akan ditampilkan dengan highlight

2. **Filter Kategori**
   - Pilih kategori dari dropdown
   - Kombinasi dengan search box
   - Reset filter dengan klik "Reset"

3. **Filter Tahun**
   - Pilih tahun dari dropdown
   - Kombinasi dengan filter lain
   - Urutkan dari terbaru

### Pencarian Lanjutan
- **Full-text Search**: Mencari di judul, abstrak, penulis, keyword
- **Fuzzy Search**: Mencari dengan toleransi typo
- **Boolean Search**: Gunakan AND, OR, NOT
- **Phrase Search**: Gunakan tanda kutip untuk pencarian exact

### Tips Pencarian
1. **Gunakan kata kunci spesifik**
   - "machine learning" lebih baik dari "learning"
   - "artificial intelligence" lebih baik dari "AI"

2. **Kombinasi filter**
   - Kategori + Tahun + Keyword
   - Hasil lebih relevan

3. **Gunakan sinonim**
   - "pembelajaran" = "learning"
   - "teknologi" = "technology"

## Download Jurnal

### Persyaratan Download
1. **Login Required**: Harus login sebagai dosen/mahasiswa atau admin
2. **Jurnal Published**: Hanya jurnal yang sudah diverifikasi
3. **Rate Limiting**: Max 10 download per menit

### Proses Download
1. **Akses Jurnal**
   - Buka halaman detail jurnal
   - Pastikan status "Published"

2. **Klik Download**
   - Klik tombol "Download PDF"
   - File akan terdownload otomatis

3. **Log Aktivitas**
   - Download tercatat di log
   - Admin bisa monitor aktivitas

### Troubleshooting Download
1. **Error: Unauthorized**
   - Pastikan sudah login
   - Cek role user (dosen/mahasiswa/admin)

2. **Error: File Not Found**
   - File mungkin terhapus
   - Hubungi admin

3. **Error: Rate Limited**
   - Tunggu 1 menit
   - Coba download lagi

## Troubleshooting

### Masalah Umum

#### 1. Tidak Bisa Login
**Penyebab**: 
- Email/password salah
- Akun belum diaktifkan
- Akun dinonaktifkan admin

**Solusi**:
- Cek email dan password
- Hubungi admin untuk aktivasi
- Reset password jika perlu

#### 2. Upload Gagal
**Penyebab**:
- File terlalu besar (>10MB)
- Format bukan PDF
- Koneksi internet lambat

**Solusi**:
- Kompres file PDF
- Pastikan format PDF
- Coba upload lagi

#### 3. Download Gagal
**Penyebab**:
- Belum login
- Role tidak sesuai
- Rate limit exceeded

**Solusi**:
- Login terlebih dahulu
- Cek role user
- Tunggu 1 menit

#### 4. Pencarian Tidak Akurat
**Penyebab**:
- Kata kunci terlalu umum
- Filter tidak tepat
- Database belum terindex

**Solusi**:
- Gunakan kata kunci spesifik
- Kombinasi filter
- Hubungi admin

### Error Messages

#### "Unauthorized Access"
- **Penyebab**: Role tidak sesuai
- **Solusi**: Login dengan akun yang tepat

#### "File Not Found"
- **Penyebab**: File terhapus atau tidak ada
- **Solusi**: Hubungi admin

#### "Rate Limit Exceeded"
- **Penyebab**: Terlalu banyak request
- **Solusi**: Tunggu 1 menit

#### "Database Connection Error"
- **Penyebab**: Server database down
- **Solusi**: Hubungi admin

### Kontak Support

#### Level 1: Self Service
- Cek dokumentasi
- Coba solusi troubleshooting
- Restart browser

#### Level 2: Admin Support
- Email: admin@sireju.example.com
- Telepon: +62-xxx-xxx-xxxx
- Jam kerja: Senin-Jumat 08:00-17:00

#### Level 3: Technical Support
- Email: support@sireju.example.com
- Issue Tracker: https://github.com/sireju/issues
- Response time: 24-48 jam

### FAQ (Frequently Asked Questions)

#### Q: Bagaimana cara upload jurnal?
A: Login → Dashboard → Upload Jurnal → Isi form → Upload file PDF → Submit

#### Q: Kapan jurnal bisa didownload?
A: Setelah admin memverifikasi dan mengubah status ke "Published"

#### Q: Berapa ukuran maksimal file PDF?
A: Maksimal 10MB per file

#### Q: Bagaimana cara reset password?
A: Klik "Forgot Password" di halaman login → Ikuti instruksi email

#### Q: Bisa upload jurnal dalam bahasa asing?
A: Bisa, sistem mendukung semua bahasa

#### Q: Bagaimana cara edit jurnal yang sudah diupload?
A: Dashboard → Jurnal Saya → Edit → Update informasi → Save

### Tips & Best Practices

#### Untuk Dosen/Mahasiswa
1. **Upload Jurnal Berkualitas**
   - Pastikan file PDF berkualitas baik
   - Isi metadata dengan lengkap
   - Gunakan keywords yang relevan

2. **Optimasi Pencarian**
   - Gunakan judul yang deskriptif
   - Tulis abstrak yang jelas
   - Pilih kategori yang tepat

3. **Keamanan Akun**
   - Gunakan password yang kuat
   - Logout setelah selesai
   - Jangan share akun

#### Untuk Admin
1. **Verifikasi Jurnal**
   - Cek kualitas file PDF
   - Verifikasi metadata
   - Cek plagiarisme jika perlu

2. **Monitor Aktivitas**
   - Cek log aktivitas regular
   - Monitor download patterns
   - Identifikasi aktivitas mencurigakan

3. **Maintenance Sistem**
   - Backup database regular
   - Update sistem jika ada
   - Monitor performance

### Update & Maintenance

#### Jadwal Maintenance
- **Weekly**: Backup database
- **Monthly**: Update dependencies
- **Quarterly**: Security audit

#### Notifikasi Maintenance
- Email notification 24 jam sebelum
- Banner di website
- Social media announcement

#### Downtime
- Biasanya 2-4 jam
- Jadwal: Minggu malam 02:00-06:00
- Notifikasi real-time di website

