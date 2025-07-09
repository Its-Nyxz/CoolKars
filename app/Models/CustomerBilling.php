<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBilling extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerBillingFactory> */
    use HasFactory;
    protected $table = "customer_billings";
    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke country
    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    // Relasi ke city
    public function city()
    {
        return $this->belongsTo(Citie::class);
    }

    // Relasi ke zip code
    public function zipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }
}
