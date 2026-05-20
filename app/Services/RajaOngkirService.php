<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class RajaOngkirService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('9ydZ4Kwf9d2dd55795c1117cg2fiJWmh');
        $this->baseUrl = 'https://api.rajaongkir.com/starter';
    }

    public function getCities()
    {
        try {
            $response = Http::withHeaders([
                'key' => $this->apiKey
            ])->timeout(4)->get("{$this->baseUrl}/city"); // timeout diturunkan ke 4 detik biar gak kelamaan nunggu

            if ($response->successful()) {
                return $response->json()['rajaongkir']['results'];
            }

            throw new \Exception("Gagal mengambil data");
        } catch (\Exception $e) {
            // JIKA TIMEOUT / INTERNET ERROR, LUAPKAN DATA DUMMY INI AGAR CODING TETEP JALAN
            return [
                ['city_id' => '444', 'city_name' => 'Batam', 'type' => 'Kota'],
                ['city_id' => '21', 'city_name' => 'Bandung', 'type' => 'Kota'],
                ['city_id' => '152', 'city_name' => 'Jakarta Barat', 'type' => 'Kota'],
                ['city_id' => '457', 'city_name' => 'Surabaya', 'type' => 'Kota'],
                ['city_id' => '23', 'city_name' => 'Bekasi', 'type' => 'Kota'],
            ];
        }
    }

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
}