<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;
    protected $table = "customers";
    protected $guarded = ['id'];
    
    public function cars()
    {
        return $this->hasMany(CustomerCar::class);
    }

    // Relasi ke CustomerBilling
    public function billings()
    {
        return $this->hasMany(CustomerBilling::class);
    }
}
