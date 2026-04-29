<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.user.checkout.index');
    }
}
