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

## ERD Relasi Database

```
Users (1) ──────── (N) Carts
  │
  └──────── (N) Orders ──────── (N) OrderItems ──────── (N) Products
                                       (1)
Products (1) ──────── (N) Carts
    │
    └──────── (N) OrderItems
```

## Penjelasan Struktur Table

### 1. **Users**
| Field | Type | Constraint | Keterangan |
|-------|------|-----------|-----------|
| id | BIGINT | PRIMARY KEY | Unique identifier |
| name | VARCHAR(255) | NOT NULL | Nama user |
| email | VARCHAR(255) | NOT NULL, UNIQUE | Email unik untuk login |
| password | VARCHAR(255) | NOT NULL | Password ter-hash |
| email_verified_at | TIMESTAMP | NULLABLE | Untuk verifikasi email |
| role | ENUM('admin','user') | DEFAULT 'user' | Role user (admin/customer) |
| remember_token | VARCHAR(100) | NULLABLE | Token remember me |
| created_at | TIMESTAMP | - | Waktu pembuatan record |
| updated_at | TIMESTAMP | - | Waktu update record |

**Relasi**: 
- 1 User → Many Carts (1 user bisa punya banyak item di cart)
- 1 User → Many Orders (1 user bisa punya banyak pesanan)

---

### 2. **Products**
| Field | Type | Constraint | Keterangan |
|-------|------|-----------|-----------|
| id | BIGINT | PRIMARY KEY | Unique identifier |
| name | VARCHAR(255) | NOT NULL | Nama produk |
| category | VARCHAR(255) | NOT NULL | Kategori produk (untuk filter) |
| description | TEXT | NULLABLE | Deskripsi detail produk |
| price | INTEGER | NOT NULL | Harga normal produk |
| discount_price | INTEGER | NULLABLE | Harga setelah diskon (jika ada) |
| stock | INTEGER | NOT NULL | Stok produk |
| size | VARCHAR(50) | NULLABLE | Ukuran (S, M, L, XL, dll) |
| image | VARCHAR(255) | NULLABLE | Path gambar produk |
| created_at | TIMESTAMP | - | Waktu pembuatan record |
| updated_at | TIMESTAMP | - | Waktu update record |

**Relasi**:
- 1 Product → Many Carts (1 produk bisa di-add ke cart oleh user manapun)
- 1 Product → Many OrderItems (1 produk bisa dibeli berkali-kali)

---

### 3. **Carts** ⭐ REFACTORED
| Field | Type | Constraint | Keterangan |
|-------|------|-----------|-----------|
| id | BIGINT | PRIMARY KEY | Unique identifier |
| user_id | BIGINT | FOREIGN KEY | Reference ke Users |
| product_id | BIGINT | FOREIGN KEY | Reference ke Products |
| quantity | INTEGER | NOT NULL | Jumlah item |
| size | VARCHAR(50) | NULLABLE | Ukuran yang dipilih |
| created_at | TIMESTAMP | - | Waktu pembuatan record |
| updated_at | TIMESTAMP | - | Waktu update record |

**Catatan Penting**:
- Sebelumnya: 1 User → 1 Cart (master) + Many CartItems (detail)
- Sekarang: Struktur DIUBAH menjadi 1 User → Many Carts (tiap record = 1 item dalam keranjang)
- Model CartItem sudah di-merge ke model Cart
- Setiap row di table carts = 1 item dalam shopping cart user
- Foreign keys: `user_id` → Users(id), `product_id` → Products(id)

**Relasi**:
- Belongs To User (Many Carts → 1 User)
- Belongs To Product (Many Carts → 1 Product)

---

### 4. **Orders**
| Field | Type | Constraint | Keterangan |
|-------|------|-----------|-----------|
| id | BIGINT | PRIMARY KEY | Unique identifier |
| user_id | BIGINT | FOREIGN KEY | Reference ke Users |
| total_price | INTEGER | NOT NULL | Total harga pesanan |
| payment_method | VARCHAR(50) | NULLABLE | Metode pembayaran (QRIS, Transfer, dll) |
| payment_status | VARCHAR(50) | NULLABLE | Status pembayaran |
| phone_number | VARCHAR(20) | NOT NULL | No. HP untuk konfirmasi |
| address | TEXT | NOT NULL | Alamat pengiriman |
| proof_of_payment | VARCHAR(255) | NULLABLE | Path bukti pembayaran (foto) |
| status | ENUM | DEFAULT 'pending' | Status pesanan (pending/processing/completed/cancelled) |
| admin_note | TEXT | NULLABLE | Catatan admin (alasan penolakan, dll) |
| shipping_name | VARCHAR(255) | NULLABLE | Nama penerima pengiriman |
| shipping_phone | VARCHAR(20) | NULLABLE | No. HP penerima |
| shipping_address | TEXT | NULLABLE | Alamat pengiriman detail |
| created_at | TIMESTAMP | - | Waktu pembuatan record |
| updated_at | TIMESTAMP | - | Waktu update record |

**Relasi**:
- Belongs To User (Many Orders → 1 User)
- Has Many OrderItems (1 Order → Many OrderItems)

---

### 5. **OrderItems**
| Field | Type | Constraint | Keterangan |
|-------|------|-----------|-----------|
| id | BIGINT | PRIMARY KEY | Unique identifier |
| order_id | BIGINT | FOREIGN KEY | Reference ke Orders |
| product_id | BIGINT | FOREIGN KEY | Reference ke Products |
| quantity | INTEGER | NOT NULL | Jumlah item yang dibeli |
| price | INTEGER | NOT NULL | Harga saat barang dibeli (snapshot) |
| size | VARCHAR(50) | NULLABLE | Ukuran yang dibeli |
| created_at | TIMESTAMP | - | Waktu pembuatan record |
| updated_at | TIMESTAMP | - | Waktu update record |

**Catatan Penting**:
- Field `price` menyimpan harga saat transaksi (snapshot), bukan mengambil dari Products table
- Ini penting agar history order tidak berubah meski harga produk berubah
- Foreign keys: `order_id` → Orders(id), `product_id` → Products(id)

**Relasi**:
- Belongs To Order (Many OrderItems → 1 Order)
- Belongs To Product (Many OrderItems → 1 Product)

---

## Diagram Relasi Dari Migration File

```
┌─────────────────────────────────────────────────────────────────┐
│                          DATABASE                               │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌──────────┐         ┌──────────┐       ┌────────────┐        │
│  │  USERS   │         │ PRODUCTS │       │   CARTS    │        │
│  ├──────────┤         ├──────────┤       ├────────────┤        │
│  │ id (PK)  │         │ id (PK)  │       │ id (PK)    │        │
│  │ name     │         │ name     │       │ user_id    │───┐    │
│  │ email    │         │ category │       │ product_id │──┼─┐  │
│  │ password │         │ price    │       │ quantity   │  │ │  │
│  │ role     │         │ discount │       │ size       │  │ │  │
│  └──────────┘         │ stock    │       └────────────┘  │ │  │
│       ▲               │ image    │            ▲          │ │  │
│       │               └──────────┘            │          │ │  │
│       └──────────────────────────────────────┘          │ │  │
│                                                          │ │  │
│       ┌──────────────────────────────────────────────────┘ │  │
│       │                                                    │  │
│  ┌──────────┐       ┌──────────────┐       ┌────────────┐ │  │
│  │  ORDERS  │       │ ORDER_ITEMS  │       │ PRODUCTS   │ │  │
│  ├──────────┤       ├──────────────┤       ├────────────┤ │  │
│  │ id (PK)  │───┐   │ id (PK)      │       │ id (PK)    │ │  │
│  │ user_id  │───┼──▶│ order_id     │       │ ...        │◀┘  │
│  │ total    │   │   │ product_id   │──────▶│ ...        │    │
│  │ status   │   │   │ quantity     │       └────────────┘    │
│  └──────────┘   │   │ price        │                         │
│       ▲         │   └──────────────┘                         │
│       │         │                                            │
│       └─────────┘                                            │
│                                                              │
└──────────────────────────────────────────────────────────────┘
```

---

# TODO: Pekerjaan yang Harus Dilakukan

## ⚠️ CRITICAL: Mismatch Struktur Saat Ini

**Masalah yang Ditemukan:**
- ✅ **Models**: Sudah di-update ke struktur CartItem merged ke Cart
- ❌ **Migrations**: Masih menggunakan struktur lama (carts hanya punya user_id, ada table cart_items terpisah)
- ❌ **Controllers**: Masih menggunakan CartItem model dan query lama
- ⚠️ **AppServiceProvider**: Masih share `$cartItems` ke views

**Solusi**: Perlu refactor besar-besaran untuk konsisten!

---

## 1. ⚡ URGENT: Update Migration Files (Priority #1)

### A. Buat Migration Baru untuk Refactor Carts Table

```bash
php artisan make:migration refactor_carts_table --table=carts
```

**Isi migration** (timpa structure carts dari scratch):
```php
Schema::table('carts', function (Blueprint $table) {
    // Tambah columns baru
    $table->foreignId('product_id')->after('user_id')->constrained()->onDelete('cascade');
    $table->integer('quantity')->after('product_id')->default(1);
    $table->string('size')->nullable()->after('quantity');
});

// Di down(): 
Schema::table('carts', function (Blueprint $table) {
    $table->dropForeignIdFor(Product::class);
    $table->dropColumn(['product_id', 'quantity', 'size']);
});
```

### B. Buat Migration untuk Hapus/Disable CartItems Table

```bash
php artisan make:migration drop_cart_items_table
```

**Isi migration**:
```php
// up()
Schema::dropIfExists('cart_items');

// down()
Schema::create('cart_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('cart_id')->constrained()->onDelete('cascade');
    $table->foreignId('product_id')->constrained()->onDelete('cascade');
    $table->integer('quantity');
    $table->string('size')->nullable();
    $table->timestamps();
});
```

### C. Update OrderItems Migration

File: [database/migrations/2026_03_13_124822_create_order_items_table.php](database/migrations/2026_03_13_124822_create_order_items_table.php)

**Add field**:
```php
$table->string('size')->nullable();
```

---

## 2. 🏗️ Update/Refactor CartController (Priority #2)

File: [app/Http/Controllers/user/CartController.php](app/Http/Controllers/user/CartController.php)

**Perubahan Besar:**

```php
// ❌ HAPUS import
use App\Models\CartItem;

// ✅ UBAH method index()
public function index()
{
    $userId = session('user_id');
    $carts = Cart::with('product')  // <--- Load product relation
        ->where('user_id', $userId)
        ->get();  // <--- Gunakan get() bukan first()

    $total = 0;
    foreach ($carts as $cart) {
        $total += $cart->getSubtotal();  // <--- Gunakan method dari model
    }

    return view('pages.user.cart.index', compact('carts', 'total'));
}

// ✅ UBAH method add()
public function add(Request $request, $id)
{
    $userId = session('user_id');
    $product = Product::findOrFail($id);

    // Cek apakah user sudah punya item ini di cart dengan size yang sama
    $cart = Cart::where('user_id', $userId)
        ->where('product_id', $product->id)
        ->where('size', $request->size)
        ->first();

    if ($cart) {
        $cart->increment('quantity');
    } else {
        Cart::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'size' => $request->size,
            'quantity' => 1,
        ]);
    }

    return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
}

// ✅ UBAH method remove()
public function remove($id)
{
    $cart = Cart::findOrFail($id);
    $cart->delete();
    return back()->with('success', 'Produk dihapus dari cart');
}

// ✅ UBAH method update()
public function update(Request $request, $id)
{
    $cart = Cart::findOrFail($id);
    
    $request->validate([
        'quantity' => 'required|integer|min:1'
    ]);

    $cart->update([
        'quantity' => $request->quantity
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Kuantitas berhasil diperbarui'
    ]);
}
```

---

## 3. 🎨 Update Views (Priority #3)

### A. Cart Page

File: [resources/views/pages/user/cart/index.blade.php](resources/views/pages/user/cart/index.blade.php)

**Update**:
```blade
{{-- ❌ UBAH dari --}}
@foreach($cartItems as $item)
    {
        id: '{{ $item->id }}',
        price: {{ $item->product->discount_price ?? $item->product->price }},
        qty: {{ $item->quantity }}
    },
@endforeach

{{-- ✅ MENJADI --}}
@foreach($carts as $cart)
    {
        id: '{{ $cart->id }}',
        price: {{ $cart->product->discount_price ?? $cart->product->price }},
        qty: {{ $cart->quantity }}
    },
@endforeach
```

**Dan**:
```blade
{{-- ❌ Loop lama --}}
@foreach($cartItems as $item)
    <x-user.cart.cart-item :id="$item->id" ... />
@endforeach

{{-- ✅ Loop baru --}}
@foreach($carts as $cart)
    <x-user.cart.cart-item :id="$cart->id" ... />
@endforeach
```

### B. Product Pages

File: [resources/views/pages/user/products/index.blade.php](resources/views/pages/user/products/index.blade.php)

**Pastikan**:
```blade
{{-- ✅ Sudah benar (gunakan model object, bukan array) --}}
@foreach ($products as $product)
    <x-user.product.product-card 
        :id="$product->id" 
        :image="$product->image" 
        :name="$product->name"
        :price="$product->price" 
        :discount="$product->discount_price ?? null" 
    />
@endforeach
```

---

## 4. 🔧 REMOVE CartItem References (Priority #2.5)

### A. Cek apakah CartItem Model masih ada

- [ ] Jika ada file `app/Models/CartItem.php`, **HAPUS**
  
### B. Remove dari CartController

- [ ] Hapus `use App\Models\CartItem;`

### C. Check AppServiceProvider

File: [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php)

**Update**:
```php
// ❌ Ganti logika lama
$cartItems = $globalCart ? $globalCart->items : collect();

// ✅ Dengan yang baru
$carts = auth('web')->user() ? auth('web')->user()->carts : collect();

// ✅ Update share ke view
'carts' => $carts,
'cartCount' => $carts->count(),
```

---

## 5. 🗄️ Run Migrations (Priority #4)

**Pastikan sudah selesai**:
1. Buat migration refactor carts table
2. Buat migration drop cart_items table  
3. Update order_items migration untuk tambah size

**Run**:
```bash
# Option 1: Refresh (hati-hati: hapus semua data!)
php artisan migrate:refresh

# Option 2: Run migration baru saja (jika sudah migrate sebelumnya)
php artisan migrate
```

---

## Daftar File yang Perlu Diubah

| File | Status | Action | Priority |
|------|--------|--------|----------|
| **Migrations** | | | |
| `2026_03_13_124808_create_carts_table.php` | ❌ Outdated | Buat migration baru refactor | P0 |
| `2026_03_13_124813_create_cart_items_table.php` | ❌ To Delete | Buat migration drop | P0 |
| `2026_03_13_124822_create_order_items_table.php` | ✅ Partial | Tambah field `size` | P0 |
| **Controllers** | | | |
| `app/Http/Controllers/user/CartController.php` | ❌ Outdated | Refactor semua methods | P1 |
| **Models** | | | |
| `app/Models/CartItem.php` | ❌ Outdated | HAPUS jika ada | P1 |
| `app/Models/Cart.php` | ✅ OK | Tidak perlu ubah | - |
| `app/Models/Product.php` | ✅ OK | Tidak perlu ubah | - |
| `app/Models/Order.php` | ✅ OK | Tidak perlu ubah | - |
| `app/Models/OrderItem.php` | ✅ OK | Tidak perlu ubah | - |
| **Providers** | | | |
| `app/Providers/AppServiceProvider.php` | ⚠️ Partial | Update cart sharing logic | P2 |
| **Views** | | | |
| `resources/views/pages/user/cart/index.blade.php` | ⚠️ Partial | Update variable dari `$cartItems` → `$carts` | P2 |
| `resources/views/pages/user/products/index.blade.php` | ✅ OK | Verify already using model objects | - |
| `resources/views/components/user/cart/cart-item.blade.php` | ⚠️ Check | Verify props dan logika | P2 |
| `resources/views/components/user/product/product-card.blade.php` | ✅ OK | Tidak perlu ubah | - |

---

## ✅ Urutan Pengerjaan yang Benar

1. **FIRST (P0)**: Buat & jalankan migrations baru
2. **SECOND (P1)**: Refactor CartController
3. **THIRD (P1.5)**: Hapus/Update references CartItem
4. **FOURTH (P2)**: Update AppServiceProvider
5. **FIFTH (P2)**: Update views
6. **FINAL**: Test semua functionality

---

## Testing Checklist Setelah Selesai

- [ ] `php artisan migrate` berhasil tanpa error
- [ ] Add to cart berfungsi
- [ ] View cart menampilkan items dengan benar
- [ ] Update quantity dari cart berfungsi
- [ ] Remove item dari cart berfungsi
- [ ] Checkout dari cart berfungsi
- [ ] OrderItems di database tersimpan dengan benar


