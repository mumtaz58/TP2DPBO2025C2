**Janji**

Saya Armelia Zahrah Mumtaz dengan NIM 2300801 berjanji mengerjakan TP2 DPBO dengan keberkahan-Nya, maka saya tidak akan melakukan kecurangan sesuai yang telah di spesifikasikan, Aamiin

**Class PetShop**

Class PetShop merupakan class dasar (base class) untuk sistem manajemen produk pet shop.

 Atribut:
- `id`: ID unik untuk setiap produk
- `nama`: Nama produk
- `harga`: Harga produk dalam rupiah
- `stok`: Jumlah stok produk yang tersedia
- `jenis`: Jenis produk (mis. Tali, Bantal, Pakaian)
- `bahan`: Bahan pembuatan produk (mis. Nylon, Katun, Wol)
- `warna`: Warna produk
- `untuk`: Target hewan peliharaan (mis. Anjing, Kucing)
- `size`: Ukuran produk (S, M, L, dll)
- `merk`: Merek produk

 **Methods:**
- Constructor: Menginisialisasi semua atribut produk
- Getter methods: Setiap atribut memiliki getter method untuk mengakses nilainya
  - `getId()`: Mengembalikan ID produk
  - `getNama()`: Mengembalikan nama produk
  - `getHarga()`: Mengembalikan harga produk
  - `getStok()`: Mengembalikan jumlah stok produk
  - `getJenis()`: Mengembalikan jenis produk (virtual)
  - `getBahan()`: Mengembalikan bahan produk (virtual)
  - `getWarna()`: Mengembalikan warna produk (virtual)
  - `getUntuk()`: Mengembalikan untuk hewan apa produk tersebut (virtual)
  - `getSize()`: Mengembalikan ukuran produk (virtual)
  - `getMerk()`: Mengembalikan merek produk (virtual)
- Destructor virtual: Memungkinkan pembebasan memori yang tepat untuk class turunan

 **Class Aksesoris**
 
Class Aksesoris merupakan turunan dari PetShop untuk produk-produk aksesoris hewan peliharaan.

**Methods:**
- Constructor: Meneruskan semua parameter ke constructor PetShop
- Override methods:
  - `getJenis()`: Override method untuk fitur khusus jenis aksesoris
  - `getBahan()`: Override method untuk fitur khusus bahan aksesoris
  - `getWarna()`: Override method untuk fitur khusus warna aksesoris

 **Class Baju**
 
Class Baju merupakan turunan dari Aksesoris untuk produk-produk pakaian hewan peliharaan.

**Methods:**
- Constructor: Meneruskan semua parameter ke constructor Aksesoris
- Override methods:
  - `getUntuk()`: Override method untuk fitur khusus target hewan pakaian
  - `getSize()`: Override method untuk fitur khusus ukuran pakaian
  - `getMerk()`: Override method untuk fitur khusus merek pakaian

**Penjelasan Alur Program**

1. Inisialisasi Program:
   - Program dimulai dengan inisialisasi vector yang berisi beberapa produk contoh dari berbagai jenis (PetShop, Aksesoris, dan Baju).
   - Produk-produk ini ditampilkan dalam format tabel menggunakan fungsi `displayProducts()`.

2. Menu Utama:
   - Program menampilkan menu dengan tiga opsi:
     1. Tampilkan Semua Produk
     2. Tambah Produk Baru
     3. Keluar

3. Fungsi Tampilan Produk:
   - Fungsi `displayProducts()` menampilkan semua produk dalam format tabel.
   - Jika tidak ada produk, pesan "Tidak ada produk dalam daftar" akan ditampilkan.
   - Tabel menampilkan semua detail produk: ID, Nama, Harga, Stok, Jenis, Bahan, Warna, Untuk, Size, dan Merk.
   - Lebar kolom disesuaikan secara dinamis berdasarkan panjang konten.

4. Fungsi Tambah Produk:
   - Pengguna diminta untuk memilih tipe produk (PetShop, Aksesoris, atau Baju).
   - Kemudian pengguna diminta untuk memasukkan semua atribut produk.
   - Produk baru dibuat sesuai dengan tipe yang dipilih dan ditambahkan ke dalam vector produk.
   - Daftar produk yang diperbarui kemudian ditampilkan.

5. Penutupan Program:
   - Saat pengguna memilih keluar, pesan perpisahan ditampilkan.
   - Semua memori yang dialokasikan untuk objek produk dibebaskan dengan loop delete.
   - Vector produk dikosongkan.

Sistem ini menerapkan konsep polymorphism melalui penggunaan fungsi virtual di class dasar dan override di class turunan, memungkinkan class-class turunan untuk memiliki perilaku khusus saat memanggil method yang sama.
