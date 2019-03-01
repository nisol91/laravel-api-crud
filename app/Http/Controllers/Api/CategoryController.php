<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function index() {

        $category = Category::all();
        return response()->json($category);

    }

    public function create(Request $request) {
        $data = $request->all();

        $validatedData = $request->validate([
            'name'=>'required',
        ]);

        $newCategory = new Category;
        $newCategory->fill($validatedData);
        $newCategory->save();
        // dd($newCategory);

        return response()->json($newCategory);
    }

    public function show($id) {
        $category = Category::find($id);
        //in alternativa
        // $Category = Category::where('id', $id)->first();

        if (empty($category)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        return response()->json($category);
    }

    public function update(Request $request, $id) {

        $data = $request->all();
        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        $category ->update($data);
        return response()->json($category);
    }
    public function destroy($id) {

        $category = Category::find($id);

        if (empty($category)) {
            return response()->json([
                'error'=>'Mi hai passato un errore'
            ]);
        }
        $category ->delete();
        return response()->json([]);
    }
}
