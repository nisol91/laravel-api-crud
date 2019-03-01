<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all();
        return response()->json($products);

    }

    public function create(Request $request) {
        $data = $request->all();

        $validatedData = $request->validate([
            'name'=>'required',
            'description'=>'required',
            'serial_number'=>'required',
        ]);

        $newProduct = new Product;
        $newProduct->fill($validatedData);
        $newProduct->save();
        // dd($newProduct);

        return response()->json($newProduct);
    }

    public function show($id) {
        $product = Product::find($id);
        //in alternativa
        // $product = Product::where('id', $id)->first();

        if (empty($product)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        return response()->json($product);
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);

        if (empty($product)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        $product ->update();
        return response()->json($product);
    }
    public function destroy($id) {

        $product = Product::find($id);

        if (empty($product)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        $product ->delete();
        return response()->json([]);
    }
}
