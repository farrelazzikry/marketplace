<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $apiKey;
    protected $baseUrl;

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
        $this->baseUrl = 'https://api.rajaongkir.com/starter';
    }

    public function getCities()
    {
        try {
            $response = Http::withHeaders([
                'key' => $this->apiKey
            ])->timeout(4)->get("{$this->baseUrl}/city");

            if ($response->successful()) {
                return $response->json()['rajaongkir']['results'];
            }

            throw new \Exception("Gagal mengambil data");
        } catch (\Exception $e) {
            // Data dummy jika API gagal
            return [
                ['city_id' => '444', 'city_name' => 'Batam', 'type' => 'Kota'],
                ['city_id' => '21', 'city_name' => 'Bandung', 'type' => 'Kota'],
                ['city_id' => '152', 'city_name' => 'Jakarta Barat', 'type' => 'Kota'],
                ['city_id' => '457', 'city_name' => 'Surabaya', 'type' => 'Kota'],
                ['city_id' => '23', 'city_name' => 'Bekasi', 'type' => 'Kota'],
            ];
        }
    }

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
}