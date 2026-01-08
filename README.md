# Project UAS Pemrograman Web

**Nama Mahasiswa** : Anthonius Dale Fernando  
**NIM** : 312410162  
**Mata Kuliah** : Pemrograman Web

## Aplikasi Manajemen Data Buku Perpustakaan

### Deskripsi Umum
Aplikasi ini merupakan aplikasi web sederhana berbasis PHP Native dengan konsep OOP (Object Oriented Programming) dan arsitektur MVC (Model-View-Controller). Aplikasi digunakan untuk mengelola data buku perpustakaan dan dibuat untuk memenuhi tugas Ujian Akhir Semester (UAS) Pemrograman Web.

Aplikasi telah dilengkapi dengan sistem login, pembagian role pengguna (Admin dan User), serta fitur CRUD lengkap, pencarian data, dan pagination. Tampilan aplikasi dibuat responsif dengan pendekatan mobile-first menggunakan Bootstrap.

### Fitur Aplikasi
1. **Autentikasi & Autorisasi**
   - Login menggunakan username dan password
   - Role pengguna:
     - Admin: dapat menambah, mengedit, dan menghapus data buku
     - User: hanya dapat melihat data buku
   - Proteksi halaman menggunakan session

2. **Manajemen Data Buku (CRUD)**
   - Tambah data buku
   - Tampilkan daftar buku
   - Edit data buku
   - Hapus data buku

3. **Pencarian Data**
   - Pencarian berdasarkan judul buku
   - Menggunakan query LIKE pada database

4. **Pagination**
   - Menampilkan data buku per halaman (5 data per halaman)
   - Navigasi halaman otomatis menyesuaikan hasil pencarian

5. **Desain UI**
   - Responsive (mobile, tablet, desktop)
   - Menggunakan Bootstrap 5
   - Tampilan bersih dan profesional

### Teknologi yang Digunakan
- PHP Native (OOP)
- MySQL (Database)
- Bootstrap 5
- Apache (.htaccess Routing)
- XAMPP

### Instalasi & Cara Menjalankan
1. Aktifkan Apache dan MySQL di XAMPP
2. Letakkan folder `book_web` di dalam `htdocs`
3. Buat database `db_book_`
4. Import file `db_book.sql`
5. Akses di browser: `http://localhost/book_web`

### Akun Login Default
**Admin**
- Username: admin
- Password: admin123

**User**
- Username: user
- Password: user123

### Kesimpulan
Aplikasi ini telah memenuhi semua persyaratan UAS Pemrograman Web: OOP, MVC sederhana, routing, autentikasi dengan role, CRUD, pencarian, pagination, dan desain responsif.
