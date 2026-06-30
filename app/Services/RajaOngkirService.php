<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $apiKey;
    protected $baseUrl;

<<<<<<< HEAD
    public function __construct()
    {
        $this->apiKey = env('9ydZ4Kwf9d2dd55795c1117cg2fiJWmh');
=======
    // Daftar ongkir per kota (dalam Rupiah) untuk berat standar 1 kg
    protected $cityPrices = [
        'Batam' => 0,
        'Bandung' => 30000,
        'Jakarta Barat' => 40000,
        'Jakarta' => 40000,
        'Surabaya' => 50000,
        'Bekasi' => 25000,
    ];

    public function __construct()
    {
        $this->apiKey = env('RAJAONGKIR_API_KEY', '9ydZ4Kwf9d2dd55795c1117cg2fiJWmh');
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
        $this->baseUrl = 'https://api.rajaongkir.com/starter';
    }

    public function getCities()
    {
        try {
            $response = Http::withHeaders([
                'key' => $this->apiKey
<<<<<<< HEAD
            ])->timeout(4)->get("{$this->baseUrl}/city"); // timeout diturunkan ke 4 detik biar gak kelamaan nunggu
=======
            ])->timeout(4)->get("{$this->baseUrl}/city");
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2

            if ($response->successful()) {
                return $response->json()['rajaongkir']['results'];
            }

            throw new \Exception("Gagal mengambil data");
        } catch (\Exception $e) {
<<<<<<< HEAD
            // JIKA TIMEOUT / INTERNET ERROR, LUAPKAN DATA DUMMY INI AGAR CODING TETEP JALAN
=======
            // Data dummy jika API gagal
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
            return [
                ['city_id' => '444', 'city_name' => 'Batam', 'type' => 'Kota'],
                ['city_id' => '21', 'city_name' => 'Bandung', 'type' => 'Kota'],
                ['city_id' => '152', 'city_name' => 'Jakarta Barat', 'type' => 'Kota'],
                ['city_id' => '457', 'city_name' => 'Surabaya', 'type' => 'Kota'],
                ['city_id' => '23', 'city_name' => 'Bekasi', 'type' => 'Kota'],
            ];
        }
    }

<<<<<<< HEAD
=======
    // 🔥 Hitung ongkir berdasarkan nama kota dan berat
    public function getCostByCity($cityName, $weight)
    {
        $baseCost = $this->cityPrices[$cityName] ?? 15000;

        // Hitung biaya tambahan jika berat > 1000 gram
        $cost = $baseCost;
        if ($weight > 1000) {
            $extraKg = ceil(($weight - 1000) / 1000);
            $cost += $extraKg * 5000; // tambahan 5000 per kg
        }

        // Format response seperti yang diharapkan frontend
        return [
            [
                'service' => 'REG',
                'description' => 'Layanan Reguler',
                'cost' => [
                    ['value' => $cost, 'etd' => '2-3', 'note' => '']
                ]
            ],
            [
                'service' => 'OKE',
                'description' => 'Ongkos Kirim Ekonomis',
                'cost' => [
                    ['value' => max(0, $cost - 5000), 'etd' => '4-5', 'note' => '']
                ]
            ]
        ];
    }

    // Fungsi untuk mendapatkan ongkir berdasarkan city_id (API atau fallback statis)
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
    public function getCost($destination, $weight, $courier)
    {
        try {
            $response = Http::withHeaders([
                'key' => $this->apiKey
            ])->timeout(4)->post("{$this->baseUrl}/cost", [
                        'origin' => env('RAJAONGKIR_ORIGIN_CITY_ID', 444),
                        'destination' => $destination,
                        'weight' => $weight,
                        'courier' => $courier
                    ]);

            if ($response->successful()) {
                return $response->json()['rajaongkir']['results'][0]['costs'] ?? [];
            }

            throw new \Exception("Gagal hitung ongkir");
        } catch (\Exception $e) {
<<<<<<< HEAD
            // JIKA TIMEOUT, KASIH LAYANAN DUMMY BIAR BISA DI-KLIK USER
            return [
                [
                    'service' => 'REG',
                    'description' => 'Layanan Reguler (Simulasi)',
                    'cost' => [
                        ['value' => 15000, 'etd' => '2-3', 'note' => '']
                    ]
                ],
                [
                    'service' => 'OKE',
                    'description' => 'Ongkos Kirim Ekonomis (Simulasi)',
                    'cost' => [
                        ['value' => 10000, 'etd' => '4-5', 'note' => '']
                    ]
                ]
            ];
        }
    }
=======
            // Fallback: cari nama kota dari city_id
            $cities = $this->getCities();
            $cityName = null;
            foreach ($cities as $city) {
                if ($city['city_id'] == $destination) {
                    $cityName = $city['city_name'];
                    break;
                }
            }
            if (!$cityName) {
                $cityName = 'Jakarta';
            }
            return $this->getCostByCity($cityName, $weight);
        }
    }

    // Ambil ongkir langsung dari nama kota (untuk dipakai di proses checkout)
    public function getShippingCostByCity($cityName)
    {
        return $this->cityPrices[$cityName] ?? 15000;
    }
>>>>>>> aa4e8e45e796cd87ec122787605ffc667eb436d2
}