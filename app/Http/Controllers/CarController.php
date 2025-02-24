<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    function main()
    {
        return view('main');
    }

    public function index(Request $request)
    {
        return response()->json([
            'cars' => Car::orderBy('id')->paginate(10),
            'user' => Auth::user()
        ]);
    }

    public function index1()
    {
        return response()->json([
            'cars' => Car::orderBy('marca')->get()
        ]);
    }

    public function store(Request $request)
    {
        $cars = [];
        $validator = Validator::make($request->all(), [
            'marca'  => 'required|string|max:100|min:2',
            'modelo' => 'required|string|max:100',
            'anio'   => 'required|integer|gte:1886',
            'color'  => 'required|string|max:50',
            'precio' => 'required|numeric|gte:0'
        ]);
        if ($validator->passes()) {
            $message = '';
            $result = Car::change($request);
            if ($result) {
                $cars = Car::orderBy('marca')->paginate(10)->setPath(url('cars'));
            } else {
                $message = 'Car has not been saved.';
            }
        } else {
            $result = false;
            $message = $validator->getMessageBag();
        }
        return response()->json(['result' => $result, 'message' => $message, 'cars' => $cars]);
    }

    public function show($id)
    {
        $car = Car::find($id);
        $message = '';
        if ($car === null) {
            $message = 'Car not found.';
        }
        return response()->json([
            'message' => $message,
            'car' => $car
        ]);
    }

    public function showSingle($id)
    {
        $car = Car::find($id);
        if ($car === null) {
            return redirect('/')->with('error', 'Car not found.');
        }
        return view('car-single', ['car' => $car]);
    }

    public function update(Request $request, $id)
    {
        $message = '';
        $car = Car::find($id);
        $cars = [];
        $result = false;

        if ($car != null) {
            $validator = Validator::make($request->all(), [
                'marca'  => 'required|string|max:100|min:2',
                'modelo' => 'required|string|max:100',
                'anio'   => 'required|integer|gte:1886',
                'color'  => 'required|string|max:50',
                'precio' => 'required|numeric|gte:0'
            ]);

            if ($validator->passes()) {
                $result = $car->modify($request);
                if ($result) {
                    $cars = Car::orderBy('marca')->paginate(10)->setPath(url('cars'));
                } else {
                    $message = 'Car has not been updated.';
                }
            } else {
                $message = $validator->getMessageBag();
            }
        } else {
            $message = 'Car not found';
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'cars' => $cars
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $message = '';
        $cars = [];
        $result = false;
        $car = Car::find($id);

        if ($car) {
            try {
                $result = $car->delete();
                if ($result) {
                    $cars = Car::orderBy('marca')->paginate(10)->setPath(url('cars'));
                } else {
                    $message = 'Car could not be deleted.';
                }
            } catch (\Exception $e) {
                $message = 'An error occurred: ' . $e->getMessage();
            }
        } else {
            $message = 'Car not found';
        }

        return response()->json([
            'result' => $result,
            'message' => $message,
            'cars' => $cars
        ]);
    }
}