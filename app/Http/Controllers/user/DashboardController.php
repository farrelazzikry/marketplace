<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $products = app(\App\Http\Controllers\User\ProductController::class)->getProducts();

        $flashSale = collect($products)->take(5);
        $recommended = collect($products)->skip(5)->take(4);
        $latest = collect($products)->reverse()->take(4);

        return view('pages.user.dashboard', compact('flashSale', 'recommended', 'latest'));
    }
}
