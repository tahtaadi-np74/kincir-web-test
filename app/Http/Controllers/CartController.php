<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data = [
            'carts' =>  session()->get('cart', [])
        ];

        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        // get product
        $product = Product::find($request->productId);

        // get cart session
        $cart = session()->get('cart', []);

        // check if product exist
        $key = array_search($request->product_id, array_column($cart, 'product_id'));

        // conditional for existing product
        if ($key !== false) {
            // update qty if product exist in cart
            $cart[$key]['qty'] += 1;
        } else {
            // add product if product not exist in cart
            $cart[] = [
                'id_produk' => $product->id,
                'nama' => $product->nama,
                'harga' => $product->harga,
                'qty' => 1,
            ];
        }

        // store cart
        session(['cart' => $cart]);

        return response()->json(['success' => true]);
    }
}
