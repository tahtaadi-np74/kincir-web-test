<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // generate user_token if not exists
        if (!$request->session()->has('user_token')) {
            $userToken = Str::uuid();

            $request->session()->put('user_token', $userToken);
        }

        $data = [
            'products' => Product::orderBy('created_at', 'ASC')->get()
        ];

        return view('home', $data);
    }
}
