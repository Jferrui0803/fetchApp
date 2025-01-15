<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    function main()
    {
        return view('main');
    }

    /*function fetch()
    {
        return view('fetch');
    }*/

    public function index()
    {
        return response()->json([
            'products' => Product::orderBy('name')->paginate(10)
        ]);
    }

    public function index1()
    {
        return response()->json([
            'products' => Product::orderBy('name')->get()
        ]);
    }


    /*public function create() {
        //
    }*/


    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:products|max:100|min:2',
            'price' => 'required|numeric|gte:0|lte:100000',
        ]);
        if ($validator->passes()) {
            $message = '';
            $object = new Product($request->all());
            try {
                $result = $object->save();
                //$products = Product::orderBy('name')->get();
                $products = Product::orderBy('name')->paginate(10);
            } catch (\Exception $e) {
                $result = false;
                $message = $e->getMessage();
            }
        } else {
            $result = false;
            $message = $validator->getMessageBag();
        }
        return response()->json(['result' => $result, 'message' => $message, 'products' => $products ?? []]);
    }

    public function show($id)
    {
        sleep(2);
        $product = Product::find($id);
        $message = '';
        if ($product === null) {
            $message = 'Product not found.';
        }
        return response()->json([
            'message' => $message,
            'product' => $product
        ]);
    }

    /*public function edit(Product $product) {
        //
    }*/


    public function update(Request $request, $id)
    {
        $message = '';
        $products = [];
        $product = Product::find($id);
        $result = false;
        if ($product != null) {
            $validator = Validator::make($request->all(), [
                'name'  => 'required|max:100|min:2|unique:products,name,' . $product->id,
                'price' => 'required|numeric|gte:0|lte:100000',
            ]);
            if ($validator->passes()) {
                try {
                    $result = $product->update($request->all());
                    $products = Product::orderBy('name')->paginate(10);
                } catch (\Exception $e) {
                    $message = $e->getMessage();
                }
            } else {
                $message = $validator->getMessageBag();
            }
        } else {
            $message = 'Product not found';
        }
        return response()->json(['result' => $result, 'message' => $message, 'products' => $products]);
    }

    //../product/65
    public function destroy(Request $request, $id)
    {
        $message = '';
        $products = [];
        $product = Product::find($id);
        $result = false;
        if ($product != null) {
            try {
                $result = $product->delete();
                //$products = Product::orderBy('name')->get();
                $page = $request->query('page', 1);
                //$products = Product::orderBy('name')->paginate(10, [], $page)->setPath(url('product'));
                $products = Product::orderBy('name')->paginate(10, ['*'], 'page', $page)->setPath(url('product'));
                if($products->isEmpty() && $page > 1) {
                    $page = $page - 1;
                    $products = Product::orderBy('name')->paginate(10, ['*'], 'page', $page)->setPath(url('product'));
                }
            } catch (\Exception $e) {
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
