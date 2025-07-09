<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCar extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerCarFactory> */
    use HasFactory;
    protected $table = "customer_cars";
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
