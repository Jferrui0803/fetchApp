<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller {

    function main() {
        return view('main');
    }

    public function index() {
        return response()->json([
            'products' => Product::orderBy('name')->paginate(10),
            'user' => Auth::user()
        ]);
    }

    public function index1() {
        return response()->json([
            'products' => Product::orderBy('name')->get()
        ]);
    }

    public function store(Request $request) {
        $products = [];
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:products|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);
        // $validator = validator($request->all(), [
        if ($validator->passes()) {
            $message = '';
            //$product = new Product($request->all());
            //$result = $product->store();
            $result = Product::change($request);
            if ($result) {
                $products = Product::orderBy('name')->paginate(10)->setPath(url('products'));
            }
            else {
                $message = 'Error saving the product';
            }
        } else {
            $result = false;
            $message = $validator->getMessageBag();
        }
        return response()->json(['result' => $result, 'message' => $message, 'products' => $products]);
    }

    public function show($id) {
        $product = Product::find($id);
        $message = '';
        if($product === null) {
            $message = 'Product not found.';
        }
        return response()->json([
            'message' => $message,
            'products' => $product
        ]);
    }

    public function update(Request $request, $id) {
        $message = '';
        $product = Product::find($id);
        $products = [];
        $result = false;
        if($product != null) {
            $validator = Validator::make($request->all(), [
                'name'  => 'required|max:100|min:2|unique:products,name,' . $product->id,
                'price' => 'required|numeric|gte:0|lte:100000',
            ]);
            if($validator->passes()) {
                $result = $product->modify($request);
                if($result) {
                    $products = Product::orderBy('name')->paginate(10)->setPath(url('products'));
                } else {
                    $message = 'Error updating the product';
                }
            } else {
                $message = $validator->getMessageBag();
            }
        } else {
            $message = 'Product not found';
        }
        return response()->json(['result' => $result, 'message' => $message, 'products' => $products]);
    }


    public function destroy(Request $request, $id) {
        $message = '';
        $products = [];
        $product = Product::find($id);
        $result = false;
        if($product != null) {
            try {
                $result = $product->delete();
                //$page = $request->query('page', 1);
                //$products = Product::orderBy('name')->paginate(10, ['*'], 'page', $page)->setPath(url('product'));
                $products = Product::orderBy('name')->paginate(10)->setPath(url('products'));
                if($products->isEmpty()) {
                    $page = $products->lastPage();//$page - 1;
                    $products = Product::orderBy('name')->paginate(10, ['*'], 'page', $page)->setPath(url('product'));
                }
            } catch(\Exception $e) {
                $message = $e->getMessage();
            }
        } else {
            $message = 'Product not found';
        }
        return response()->json([
            'message' => $message,
            'products' => $products,
            'result' => $result
        ]);
    }
}
