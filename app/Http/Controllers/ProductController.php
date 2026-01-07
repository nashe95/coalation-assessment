<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index() {
        return view('products');
    }

    public function list() {
        $products = Product::orderBy('created_at', 'desc')->get();

        return response()->json([
            'products' => $products,
            'total' => $products->sum(fn($product) => $product->total_value)
        ]);
    }

    public function store(Request $request) {
        $data = $request->validate([
            'product_name'  => 'required|string',
            'quantity'      => 'required|integer|min:0',
            'price'         => 'required|numeric|min:0'
        ]);

        Product::create($data);

        $this->writeToJson();

        return $this->list();
    }

    public function update(Request $request, Product $product) {
        $product->update($request->only('product_name', 'quantity', 'price');

        $this->writeToJson();

        return $this->list();
    }

    private function writeToJson() {
        $products = Product::orderBy('created_at', 'desc')->get()->map(
            fn($product) => {
                return [
                    'product_name'  => $product->product_name,
                    'quantity'      => $product->quantity,
                    'price'         => $product->price,
                    'datetime'      => $product->created_at->toDateTimeString(),
                    'total_value'   => $product->total_value
                ];
            }
        );

        Storage::put('products.json', json_encode($products, JSON_PRETTY_PRINT);
    }

}
