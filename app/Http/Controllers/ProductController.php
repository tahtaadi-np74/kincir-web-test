<?php

namespace App\Http\Controllers;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(ProductsDataTable $dataTable)
    {
        return $dataTable->render('product.index');
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string|max:255',
            'harga' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'stok' => 'required|numeric',
        ]);

        try {
            Product::create($data);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Something wrong');
        }

        session()->flash('success', 'New product has been added!');
        return redirect()->route('product.index');
    }
}
