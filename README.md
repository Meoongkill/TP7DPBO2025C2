# Janji Desain dan Pemrograman Berorientasi Objek
Saya Muhammad Fathan Putra dengan NIM 2300330 mengerjakan soal Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Desain dan ERD Dari Database
![1  ERD_db_rentagirlfriend](https://github.com/user-attachments/assets/3048a07a-90f6-44ff-870d-b7e324b78bcc)

# Isi dan Atribut dari setiap tabel
# Tabel: users
- user_id	Primary key, identifikasi unik tiap user.
- username	Nama login user (bisa berupa nama pengguna atau nickname).
- password	Kata sandi untuk autentikasi user (harus dienkripsi di sistem nyata).
- email	Alamat email user, untuk komunikasi atau notifikasi.
- phone_number	Nomor telepon user, opsional tapi bisa berguna untuk kontak langsung.
- created_at	Tanggal dan waktu ketika user mendaftar.

# Tabel: girlfriends
- girlfriend_id	Primary key, ID unik tiap girlfriend.
- name	Nama dari girlfriend (contoh: Acin Baik, Acin Nakal, dst).
- age	Umur girlfriend.
- rate_per_hour	Tarif sewa girlfriend per jam.
- availability_status	Status apakah girlfriend tersedia atau sedang disewa.
- photo	Nama file foto girlfriend (disimpan di folder assets/).

# Tabel: schedules
- schedule_id	Primary key, ID unik tiap jadwal.
- girlfriend_id	Foreign key, mengacu ke girlfriend yang punya jadwal ini.
- available_date	Tanggal kapan girlfriend tersedia.
- start_time	Jam mulai ketersediaan.
- end_time	Jam selesai ketersediaan.
  
# Tabel: rentals
- rental_id	Primary key, ID unik tiap rental (penyewaan).
- user_id	Foreign key, user yang menyewa girlfriend.
- girlfriend_id	Foreign key, girlfriend yang disewa.
- start_time	Waktu mulai rental.
- end_time	Waktu selesai rental.
- status	Status penyewaan: ongoing, completed, cancelled.
  
# Tabel: payments
- payment_id	Primary key, ID unik tiap transaksi pembayaran.
- rental_id	Foreign key, menghubungkan ke rental yang dibayar.
- amount	Jumlah pembayaran berdasarkan durasi dan tarif.
- payment_method	Cara pembayaran (e.g., transfer, gopay, dana).
- payment_date	Tanggal pembayaran dilakukan.
  
# Tabel: reviews
- review_id	Primary key, ID unik tiap ulasan.
- rental_id	Foreign key, merujuk ke rental yang diulas.
- rating	Nilai rating dari user (biasanya 1–5).
- comment	Komentar/ulasan dari user.
- review_date	Tanggal ulasan diberikan.
  
# Keterkaitan antara relasi-relasi antar tabel
# 1. users ⇄ rentals
- Relasi: Satu user dapat melakukan banyak rental.
- Jenis: One-to-Many (1:N)
- Alasan: Seorang user bisa menyewa beberapa girlfriend, tapi satu rental hanya dimiliki oleh satu user.
- Foreign Key: rentals.user_id → users.user_id

# 2. girlfriends ⇄ rentals
- Relasi: Satu girlfriend bisa disewa beberapa kali.
- Jenis: One-to-Many (1:N)
- Alasan: Satu girlfriend bisa tersedia untuk disewa oleh banyak user pada waktu yang berbeda.
- Foreign Key: rentals.girlfriend_id → girlfriends.girlfriend_id

# 3. rentals ⇄ payments
- Relasi: Satu rental memiliki satu pembayaran.
- Jenis: One-to-One (1:1)
- Alasan: Satu sesi rental hanya memiliki satu transaksi pembayaran.
- Foreign Key: payments.rental_id → rentals.rental_id

# 4. rentals ⇄ reviews
- Relasi: Satu rental dapat memiliki satu review dari user.
- Jenis: One-to-One (1:1)
- Alasan: Satu sesi rental bisa diberi satu review oleh user. Tidak bisa lebih dari satu review untuk satu rental.
- Foreign Key: reviews.rental_id → rentals.rental_id

# 5. girlfriends ⇄ schedules
- Relasi: Satu girlfriend punya banyak jadwal.
- Jenis: One-to-Many (1:N)
- Alasan: Setiap girlfriend bisa memiliki banyak slot waktu untuk tersedia (availability schedule).
- Foreign Key: schedules.girlfriend_id → girlfriends.girlfriend_id

Ilustrasi Sederhana:
- user menyewa girlfriend → tercatat di rentals.
- Setelah selesai, user membayar via payments, dan bisa kasih feedback di reviews.
- girlfriend punya jadwal tersedia di schedules.

# Alur Program
- User diberikan interface (Index.php) yang berisi 5 menu yang dapat dituju
- User dapat melakukan CRUD sesuai keinginan user, dan langsung terhubung ke database
- Belum bisa searching, karena algoritmanya rusak terus.... maaf kang, saya balas minggu depan
