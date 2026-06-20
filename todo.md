# MARKETPLACE UMKM

# Deskripsi Singkat 
-- Project Ini Dibuat Karena Ada Satu Pengusaha Umkm Ingin Melakukan Penjualan Tidak Hanya Melalui Offline Store Namun Mereka Ingin Menjual Produk Mereka Melalui Website Juga Jadi Website Ini Memiliki Offline Store Dan Online Store --

# Role

## Admin
Berperan Sebagai Penjual UMKM
## User
Berperan Sebagai Pelanggan

## Fitur User
1. Register akun
2. Login akun
3. Melihat daftar produk
4. Melihat detail produk
5. Menambahkan produk ke keranjang
6. Checkout pesanan
7. Melihat history pesanan
8. Melihat status pesanan
9. Mencari produk berdasarkan nama dan kategori

## Fitur Admin
1. Login admin
2. Menambah produk
3. Mengedit produk
4. Menghapus produk
5. Memverifikasi pembayaran user

# Fitur Non Fungsional
1. Responsive Mobile Dan Desktop 
2. Bisa Diakses All Browser

# Tech Stack
- Laravel
- PHP
- MySql
- Tailwind CSS
- JavaScript

# Struktur Folder
1. Controller
- Controller / User / ..... ( Controller User )
- Controller / Admin / .... ( Controller Admin )
- Controller Auth ( Controller Login Dan Register )
- Controller Home ( Controller Landing Page)

2. View
- Pages / Admin / .... / Index ( Untuk Halaman Admin Terkecuali Dashboard, Kalau Dashboard Pages / Admin / Dashboard )
- Pages / User / .... / Index ( Untuk Halaman User Terkecuali Dashboard, Kalau Dashboard Pages / User / Dashboard )
- Pages / Auth / .... ( Untuk Login Dan Register)
- Pages / Home ( Landing Page / Akses Publik )
- Components / Admin / ..... / ..... ( Component Yang Digunakan Untuk Admin )
- Components / User / ..... / ..... ( Component Untuk User) 
- Layout / .... ( Berlaku Untuk Auth, Admin Dan User Dengan Nama Sesuai Yang Udah Gua Ketik )

# API 
- QRISLY API BY RAJA ONGKIR
- ONGKIR BY RAJA ONGKIR

# MIDDLEWARE
- Auth
- Admin
- User

# Table Database
1. Users
- 