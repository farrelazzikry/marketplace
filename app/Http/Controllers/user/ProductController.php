<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function getCategories()
    {
        return [
            1 => ['id' => 1, 'name' => 'Hoodie'],
            2 => ['id' => 2, 'name' => 'Celana'],
            3 => ['id' => 3, 'name' => 'Topi'],
            4 => ['id' => 4, 'name' => 'Set Olahraga'],
            5 => ['id' => 5, 'name' => 'Baju']
        ];
    }
    public function getProducts()
    {
        return [
            1 => [
                'id' => 1,
                'name' => 'Hoodie',
                'price' => 'Rp 350.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/df/cc/4b/dfcc4b0d43fbdfae32a639cc944224b5.jpg',
                'desc' => 'Hoodie nyaman dengan bahan premium cocok untuk sehari-hari.',
                'size' => 'M, L, XL'
            ],
            2 => [
                'id' => 2,
                'name' => 'T-Shirt',
                'price' => 'Rp 180.000',
                'category_id' => 1,
                'image' => 'https://i.pinimg.com/736x/8f/25/72/8f2572b25e71778b84c48972c3f5395d.jpg',
                'desc' => 'Kaos simpel dengan bahan adem dan nyaman dipakai.',
                'size' => 'S, M, L'
            ],
            3 => [
                'id' => 3,
                'name' => 'Jersey Bola',
                'price' => 'Rp 250.000',
                'category_id' => 4,
                'image' => 'https://imgs.search.brave.com/kP-IqldBN2sq6Yd4lSCZHYnn3uRNSJrll0v2okddo5A/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9qZXJz/ZXlwbGFuZXQubXkv/d3AtY29udGVudC91/cGxvYWRzLzIwMjQv/MDEvamVyc2V5LXBs/YW5ldC1jdXN0b20t/ZGVzaWduLWthdGFs/b2ctanAtMDExMi0z/MDB4MzAwLnBuZw',
                'desc' => 'Jersey olahraga dengan bahan breathable dan ringan.',
                'size' => 'M, L, XL'
            ],
            4 => [
                'id' => 4,
                'name' => 'Celana Cargo',
                'price' => 'Rp 275.000',
                'category_id' => 2,
                'image' => 'https://imgs.search.brave.com/_hOCWjvRj629i9-5n52uzRiTrDcBz_f3iZkIG8S4PNQ/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly93d3cu/c3RhdGljLXNyYy5j/b20vd2Nzc3RvcmUv/SW5kcmFwcmFzdGhh/L2ltYWdlcy9jYXRh/bG9nL21lZGl1bS9j/YXRhbG9nLWltYWdl/LzEwNi9NVEEtMTgy/NTkwMzc3L2JyZC00/NDI2MV9iZXR0ZXJo/YWxmLWNlbGFuYS1j/YXJnby1wYW5qYW5n/LWhpdGFtLXVuaXNl/eC1wb2Nrb25fZnVs/bDAyLTdjOTU0NTA1/LmpwZw',
                'desc' => 'Celana cargo dengan banyak kantong.',
                'size' => 'M, L, XL'
            ],
            5 => [
                'id' => 5,
                'name' => 'Topi Snapback',
                'price' => 'Rp 120.000',
                'category_id' => 3,
                'image' => 'https://imgs.search.brave.com/VoqJECJRCPhVGpsSxHsoI1w3A9gRoR6eoMKVJKXguS0/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly93d3cu/c3RhdGljLXNyYy5j/b20vd2Nzc3RvcmUv/SW5kcmFwcmFzdGhh/L2ltYWdlcy9jYXRh/bG9nL21lZGl1bS9j/YXRhbG9nLWltYWdl/L01UQS0xODMyMzQ1/MDcvc2tlY2hlcnNf/c2tlY2hlcnNfd29t/ZW5fc3BvcnRzd2Vh/cl9jYXBfdG9waV93/YW5pdGFfLXNrZXNo/bDI1MTViay1fZnVs/bDA1X2huYWtoZzhs/LndlYnA',
                'desc' => 'Topi snapback dengan desain modern.',
                'size' => ''
            ],
            6 => [
                'id' => 6,
                'name' => 'Sweater Rajut',
                'price' => 'Rp 300.000',
                'category_id' => 1,
                'image' => 'https://imgs.search.brave.com/ftLzCtP5ogL80UWDSqiKbrtNmdNG3SEMCB4EmyOhE2k/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/OTE1UlBZMXNjM0wu/anBn',
                'desc' => 'Sweater rajut hangat dengan desain klasik dan bisa dipakai untuk pria dan wanita.',
                'size' => 'M, L, XL'
            ],
            7 => [
                'id' => 7,
                'name' => 'Legging Olahraga',
                'price' => 'Rp 200.000',
                'category_id' => 4,
                'image' => 'https://imgs.search.brave.com/dgigH9VfHHVSlxpdOAby3avywGyRqUy20dekDtXMa8M/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9wMTYt/b2VjLXNnLmlieXRl/aW1nLmNvbS90b3Mt/YWxpc2ctaS1hcGhs/dXY0eHdjLXNnLzdj/NDlmYWUwY2Q3OTQz/N2I5YmM1MWIwZGJl/YWMwMDlmfnRwbHYt/YXBobHV2NHh3Yy1y/ZXNpemUtd2VicDo4/MDA6ODAwLndlYnA_/ZHI9MTU1ODQmdD01/NTVmMDcyZCZwcz05/MzNiNWJkZSZzaHA9/NmNlMTg2YTEmc2hj/cD1lMWJlOGY1MyZp/ZGM9bXkmZnJvbT0x/ODI2NzE5Mzkz',
                'desc' => 'Legging olahraga dengan bahan elastis dan nyaman.',
                'size' => 'S, M, L'
            ],
            8 => [
                'id' => 8,
                'name' => 'Ransel Casual',
                'price' => 'Rp 400.000',
                'category_id' => 3,
                'image' => 'https://imgs.search.brave.com/gM-4iyG7rEYuKgOmZh6Cs911SkTa1gVkN0hcIlJxeIE/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9jZi5z/aG9wZWUuY28uaWQv/ZmlsZS9zZy0xMTEz/NDIwMS04MjYxdS1t/ajc1ZHozc2ljanE0/Yw',
                'desc' => 'Ransel casual dengan banyak kompartemen.',
                'size' => 'M, L, XL'
            ],
            9 => [
                'id' => 9,
                'name' => 'Jaket Denim',
                'price' => 'Rp 450.000',
                'category_id' => 1,
                'image' => 'https://imgs.search.brave.com/nAAhNY3_PPzkEDSJ39Wm1fDeATOxqrS1fguAW84_Frs/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tZWRp/YS5ncS5jb20vcGhv/dG9zLzY4OWI5YjY5/Y2Y1OTNlNmFjZjI1/ODljNi8zOjQvd183/NDgsY19saW1pdC9D/cm9wcGVkJTIwRGVu/aW0lMjBUcnVja2Vy/JTIwSmFja2V0IS5w/bmc',
                'desc' => 'Jaket denim klasik dengan potongan modern.',
                'size' => 'M, L, XL, XXL'
            ],
            10 => [
                'id' => 10,
                'name' => 'Celana Jeans',
                'price' => 'Rp 350.000',
                'category_id' => 2,
                'image' => 'https://imgs.search.brave.com/FGKCGhv9SmnuaspReb2zc7fN7wVTW9D94EypSdo3_Uw/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9tMjMx/LmNvbS9jZG4vc2hv/cC9wcm9kdWN0cy84/NDRhN2U2YWM0OTAx/NzBiMmU2MmMxN2Rh/N2IwMTZjYV82MDB4/LmpwZz92PTE3NDAz/ODczODY',
                'desc' => 'Celana jeans dengan bahan kulit buaya.',
                'size' => 'S, M, L, XL'
            ],
        ];
    }

    // INDEX (KIRIM PRODUCT + CATEGORY)
    public function index()
    {
        $products = $this->getProducts();
        $categories = $this->getCategories();

        return view('pages.user.products.index', compact('products', 'categories'));
    }
    // DETAIL PRODUCT
    public function show($id)
    {
        $products = $this->getProducts();
        
        // Cari produk berdasarkan ID, kalau ga ketemu return 404
        if (!isset($products[$id])) {
            abort(404);
        }

        $product = $products[$id];

        return view('pages.user.products.show', compact('product'));
    }
}