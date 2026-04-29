<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\User\ProductController;

class HomeController extends Controller
{
    public function index()
    {
        $products = app(ProductController::class)->getProducts();

        $flashSale = collect($products)->take(5);
        $recommended = collect($products)->skip(5)->take(10);

        return view('home', compact('flashSale', 'recommended'));
    }
}