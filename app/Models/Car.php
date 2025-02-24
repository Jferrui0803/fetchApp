<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'coches';

    protected $fillable = ['marca', 'modelo', 'anio', 'color', 'precio'];

    static function change($request)
    {
        $car = new Car($request->all());
        return $car->store();
    }

    function modify($request)
    {
        $result = false;
        try {
            $result = $this->update($request->all());
        } catch (\Exception $e) {
        }
        return $result;
    }

    function store()
    {
        try {
            $result = $this->save();
        } catch (\Exception $e) {
            $result = false;
        }
        return $result;
    }
}