<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JournalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();
        $users = \App\Models\User::where('role', 'dosen_mahasiswa')->get();

        $journals = [
            [
                'title' => 'Implementasi Machine Learning dalam Sistem Rekomendasi',
                'slug' => 'implementasi-machine-learning-dalam-sistem-rekomendasi',
                'abstract' => 'Penelitian ini membahas implementasi algoritma machine learning untuk sistem rekomendasi yang dapat meningkatkan akurasi prediksi preferensi pengguna. Metode yang digunakan meliputi collaborative filtering, content-based filtering, dan hybrid approach.',
                'authors' => 'Dr. Ahmad Wijaya;Siti Nurhaliza',
                'year' => 2024,
                'category_id' => $categories->where('slug', 'teknologi-informasi')->first()->id,
                'keywords' => 'machine learning, sistem rekomendasi, collaborative filtering, artificial intelligence',
                'file_path' => 'sample-journal-1.pdf',
                'file_size' => 2048576,
                'uploaded_by' => $users->first()->id,
                'status' => 'published',
                'published_at' => now(),
            ],
            [
                'title' => 'Analisis Pengaruh Metode Pembelajaran Online terhadap Hasil Belajar',
                'slug' => 'analisis-pengaruh-metode-pembelajaran-online-terhadap-hasil-belajar',
                'abstract' => 'Penelitian ini menganalisis efektivitas pembelajaran online dibandingkan dengan pembelajaran konvensional dalam meningkatkan hasil belajar siswa. Data dikumpulkan dari 200 responden siswa SMA.',
                'authors' => 'Budi Santoso;Dr. Ahmad Wijaya',
                'year' => 2024,
                'category_id' => $categories->where('slug', 'pendidikan')->first()->id,
                'keywords' => 'pembelajaran online, hasil belajar, pendidikan, teknologi pembelajaran',
                'file_path' => 'sample-journal-2.pdf',
                'file_size' => 1536000,
                'uploaded_by' => $users->skip(1)->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'Strategi Digital Marketing untuk UMKM di Era Digital',
                'slug' => 'strategi-digital-marketing-untuk-umkm-di-era-digital',
                'abstract' => 'Penelitian ini mengkaji strategi digital marketing yang efektif untuk Usaha Mikro, Kecil dan Menengah (UMKM) dalam menghadapi tantangan era digital. Fokus pada penggunaan media sosial dan e-commerce.',
                'authors' => 'Siti Nurhaliza',
                'year' => 2023,
                'category_id' => $categories->where('slug', 'ekonomi')->first()->id,
                'keywords' => 'digital marketing, UMKM, media sosial, e-commerce, strategi bisnis',
                'file_path' => 'sample-journal-3.pdf',
                'file_size' => 3072000,
                'uploaded_by' => $users->skip(2)->first()->id,
                'status' => 'draft',
            ],
            [
                'title' => 'Aplikasi IoT dalam Monitoring Kesehatan Pasien',
                'slug' => 'aplikasi-iot-dalam-monitoring-kesehatan-pasien',
                'abstract' => 'Penelitian ini mengembangkan sistem monitoring kesehatan berbasis Internet of Things (IoT) untuk memantau kondisi pasien secara real-time. Sistem menggunakan sensor wearable dan aplikasi mobile.',
                'authors' => 'Dr. Ahmad Wijaya;Budi Santoso',
                'year' => 2024,
                'category_id' => $categories->where('slug', 'kesehatan')->first()->id,
                'keywords' => 'IoT, monitoring kesehatan, sensor wearable, telemedicine, kesehatan digital',
                'file_path' => 'sample-journal-4.pdf',
                'file_size' => 4096000,
                'uploaded_by' => $users->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(10),
            ],
            [
                'title' => 'Optimasi Struktur Jembatan dengan Finite Element Analysis',
                'slug' => 'optimasi-struktur-jembatan-dengan-finite-element-analysis',
                'abstract' => 'Penelitian ini menggunakan metode Finite Element Analysis (FEA) untuk mengoptimalkan struktur jembatan agar lebih efisien dan aman. Analisis dilakukan pada berbagai kondisi beban dan lingkungan.',
                'authors' => 'Siti Nurhaliza;Dr. Ahmad Wijaya',
                'year' => 2023,
                'category_id' => $categories->where('slug', 'teknik')->first()->id,
                'keywords' => 'finite element analysis, struktur jembatan, optimasi, teknik sipil, simulasi',
                'file_path' => 'sample-journal-5.pdf',
                'file_size' => 5120000,
                'uploaded_by' => $users->skip(1)->first()->id,
                'status' => 'published',
                'published_at' => now()->subDays(15),
            ],
        ];

        foreach ($journals as $journal) {
            \App\Models\Journal::create($journal);
        }
    }
}
