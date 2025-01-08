<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    /**
     * Display a listing of the resource.
     */

     function fetch(){
        return view('fetch');
     }

    public function index() {
        
        return response()->json([
            'products' => Product::orderBy('name')->get(),
            'token' => csrf_token()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() { 

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        /*$validated = $request->validate([
            'name'  => 'required|unique:product|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);*/
        $object = new Product($request->all());
        try {
            $result = $object->save();
        } catch(\Exception $e) {
            $result = false;
        }
        return response()->json(['result' => $result]);
    } 

    /**
     * Display the specified resource.
     */
    public function show($id) {
        $product = Product::find($id);
        $message = '';
        if($product === null) {
            $message = 'Product not found';
        }
        return response()->json([
            'message' => $message,
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    /*public function edit(Product $product) {
        //
    }*/

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $product = Product::find($id);
        if($product != null ) {
        $validated = $request->validate([
            'name'  => 'required|max:100|min:2|unique:product,name,' . $product->id,
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);
        try {
            $result = $product->update($request->all());
            //$product->fill($request->all());
            //$result = $product->save();
            return redirect('product')->with(['message' => 'The product has been updated.']);
        } catch(\Exception $e) {
            return back()->withInput()->withErrors(['message' => 'The product has not been updated.']);
        }

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        //
    }
}
