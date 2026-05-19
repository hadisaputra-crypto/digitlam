# Entity Relationship Diagram (ERD) - Sistem Informasi Repository Jurnal

## Database Schema

### Tabel: users
```
+------------------+------------------+------+-----+---------+----------------+
| Field            | Type             | Null | Key | Default | Extra          |
+------------------+------------------+------+-----+---------+----------------+
| id               | bigint unsigned  | NO   | PRI | NULL    | auto_increment |
| name             | varchar(255)     | NO   |     | NULL    |                |
| email            | varchar(255)     | NO   | UNI | NULL    |                |
| email_verified_at| timestamp        | YES  |     | NULL    |                |
| password         | varchar(255)     | NO   |     | NULL    |                |
| role             | enum('admin','dosen_mahasiswa','guest') | NO | | guest | |
| is_active        | tinyint(1)       | NO   |     | 1       |                |
| remember_token   | varchar(100)     | YES  |     | NULL    |                |
| created_at       | timestamp        | YES  |     | NULL    |                |
| updated_at       | timestamp        | YES  |     | NULL    |                |
+------------------+------------------+------+-----+---------+----------------+
```

### Tabel: categories
```
+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| id          | bigint unsigned  | NO   | PRI | NULL    | auto_increment |
| name        | varchar(255)     | NO   |     | NULL    |                |
| slug        | varchar(255)     | NO   | UNI | NULL    |                |
| description | text             | YES  |     | NULL    |                |
| created_at  | timestamp        | YES  |     | NULL    |                |
| updated_at  | timestamp        | YES  |     | NULL    |                |
+-------------+------------------+------+-----+---------+----------------+
```

### Tabel: journals
```
+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| id          | bigint unsigned  | NO   | PRI | NULL    | auto_increment |
| title       | varchar(255)     | NO   |     | NULL    |                |
| slug        | varchar(255)     | NO   | UNI | NULL    |                |
| abstract    | text             | NO   |     | NULL    |                |
| authors     | varchar(255)     | YES  |     | NULL    |                |
| year        | year             | YES  |     | NULL    |                |
| category_id | bigint unsigned  | YES  | MUL | NULL    |                |
| keywords    | varchar(255)     | YES  |     | NULL    |                |
| file_path   | varchar(255)     | YES  |     | NULL    |                |
| file_size   | int              | YES  |     | NULL    |                |
| uploaded_by | bigint unsigned  | NO   | MUL | NULL    |                |
| status      | enum('draft','published','rejected') | NO | | draft | |
| published_at| timestamp        | YES  |     | NULL    |                |
| created_at  | timestamp        | YES  |     | NULL    |                |
| updated_at  | timestamp        | YES  |     | NULL    |                |
+-------------+------------------+------+-----+---------+----------------+
```

### Tabel: activity_logs
```
+-------------+------------------+------+-----+---------+----------------+
| Field       | Type             | Null | Key | Default | Extra          |
+-------------+------------------+------+-----+---------+----------------+
| id          | bigint unsigned  | NO   | PRI | NULL    | auto_increment |
| user_id     | bigint unsigned  | YES  | MUL | NULL    |                |
| action      | varchar(255)     | NO   |     | NULL    |                |
| meta        | json             | YES  |     | NULL    |                |
| created_at  | timestamp        | YES  |     | NULL    |                |
| updated_at  | timestamp        | YES  |     | NULL    |                |
+-------------+------------------+------+-----+---------+----------------+
```

## Relationships

### 1. Users → Journals (One-to-Many)
```
users.id (1) ←→ journals.uploaded_by (Many)
```
- **Constraint**: `FOREIGN KEY (uploaded_by) REFERENCES users(id) ON DELETE CASCADE`
- **Description**: Satu user bisa upload banyak jurnal, satu jurnal hanya punya satu uploader

### 2. Categories → Journals (One-to-Many)
```
categories.id (1) ←→ journals.category_id (Many)
```
- **Constraint**: `FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL`
- **Description**: Satu kategori bisa punya banyak jurnal, satu jurnal hanya punya satu kategori

### 3. Users → Activity Logs (One-to-Many)
```
users.id (1) ←→ activity_logs.user_id (Many)
```
- **Constraint**: `FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL`
- **Description**: Satu user bisa punya banyak log aktivitas, satu log hanya punya satu user

## Indexes

### Primary Keys
- `users.id` (PRIMARY)
- `categories.id` (PRIMARY)
- `journals.id` (PRIMARY)
- `activity_logs.id` (PRIMARY)

### Unique Keys
- `users.email` (UNIQUE)
- `categories.slug` (UNIQUE)
- `journals.slug` (UNIQUE)

### Foreign Keys
- `journals.uploaded_by` → `users.id`
- `journals.category_id` → `categories.id`
- `activity_logs.user_id` → `users.id`

### Full-Text Index
- `journals(title, abstract, authors, keywords)` (FULLTEXT)

## Data Flow Diagram

```
┌─────────────┐    ┌─────────────┐    ┌─────────────┐
│    Users    │    │ Categories  │    │  Journals   │
│             │    │             │    │             │
│ - id        │    │ - id        │    │ - id        │
│ - name      │    │ - name      │    │ - title     │
│ - email     │    │ - slug      │    │ - abstract  │
│ - role      │    │ - desc      │    │ - authors   │
│ - is_active │    │             │    │ - year      │
└─────────────┘    └─────────────┘    │ - category_id│
       │                   │           │ - keywords  │
       │                   │           │ - file_path │
       │                   │           │ - file_size │
       │                   │           │ - uploaded_by│
       │                   │           │ - status    │
       │                   │           │ - published_at│
       │                   │           └─────────────┘
       │                           │
       │                           │
       │                   ┌─────────────┐
       │                   │Activity Logs│
       │                   │             │
       └───────────────────│ - id        │
                           │ - user_id   │
                           │ - action    │
                           │ - meta      │
                           │ - created_at│
                           └─────────────┘
```

## Business Rules

### 1. User Management
- **Role Hierarchy**: admin > dosen_mahasiswa > guest
- **Account Status**: is_active (boolean)
- **Email Uniqueness**: Setiap email hanya bisa digunakan sekali

### 2. Journal Management
- **Status Flow**: draft → published/rejected
- **File Validation**: PDF only, max 10MB
- **Slug Uniqueness**: Setiap slug harus unik
- **Publication Date**: Hanya bisa diisi jika status = published

### 3. Category Management
- **Slug Generation**: Auto-generate dari name
- **Soft Delete**: Kategori tidak bisa dihapus jika ada jurnal

### 4. Activity Logging
- **Automatic Logging**: Setiap aksi user dicatat
- **Metadata Storage**: JSON format untuk fleksibilitas
- **Retention Policy**: Log disimpan minimal 1 tahun

## Security Considerations

### 1. Data Protection
- **Password Hashing**: bcrypt dengan salt
- **File Storage**: Secure directory dengan proper permissions
- **SQL Injection**: Prepared statements untuk semua query

### 2. Access Control
- **Role-Based Access**: Middleware untuk setiap route
- **File Download**: Authentication + role check
- **Admin Panel**: Hanya admin yang bisa akses

### 3. Rate Limiting
- **Download Limit**: 10 requests per minute per user
- **Upload Limit**: 5 requests per minute per user
- **API Limit**: 60 requests per minute per IP

## Performance Optimization

### 1. Database Indexing
- **Primary Keys**: Auto-increment dengan index
- **Foreign Keys**: Index untuk join operations
- **Full-Text Search**: Index untuk pencarian teks

### 2. Caching Strategy
- **Query Caching**: Cache hasil query yang sering digunakan
- **File Caching**: CDN untuk static assets
- **Session Caching**: Redis untuk session storage

### 3. File Storage
- **Local Storage**: storage/app/public/journals/
- **File Naming**: UUID untuk menghindari konflik
- **File Compression**: Otomatis compress file besar

## Backup Strategy

### 1. Database Backup
- **Daily Backup**: mysqldump dengan compression
- **Weekly Backup**: Full database backup
- **Monthly Backup**: Archive backup ke cloud storage

### 2. File Backup
- **Daily Sync**: Sync file ke cloud storage
- **Version Control**: Keep last 30 versions
- **Integrity Check**: MD5 checksum untuk setiap file

### 3. Configuration Backup
- **Environment Files**: Backup .env dan config files
- **Code Backup**: Git repository dengan tags
- **Documentation**: Backup semua dokumentasi

## Monitoring & Alerting

### 1. System Monitoring
- **Database Performance**: Query execution time
- **File Storage**: Disk usage dan file count
- **User Activity**: Login attempts dan suspicious activity

### 2. Error Monitoring
- **Application Errors**: Laravel log monitoring
- **Database Errors**: MySQL error log
- **File System Errors**: Storage permission issues

### 3. Security Monitoring
- **Failed Logins**: Brute force detection
- **Suspicious Activity**: Unusual download patterns
- **File Access**: Unauthorized file access attempts

## Scalability Considerations

### 1. Horizontal Scaling
- **Load Balancer**: Multiple app servers
- **Database Replication**: Master-slave setup
- **File Storage**: Distributed file system

### 2. Vertical Scaling
- **Database Optimization**: Query optimization
- **Memory Management**: PHP memory limits
- **CPU Optimization**: Background job processing

### 3. Cloud Migration
- **Containerization**: Docker untuk deployment
- **Microservices**: Split monolith ke services
- **Auto-scaling**: Cloud auto-scaling groups

