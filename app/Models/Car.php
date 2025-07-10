<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $table = "cars";
    protected $guarded = ['id'];

    public function carType()
    {
        return $this->belongsTo(CarType::class);
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'sparepart_cars');
    }
}
