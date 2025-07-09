<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartCar extends Model
{
    /** @use HasFactory<\Database\Factories\SparepartCarFactory> */
    use HasFactory;

    protected $table = "sparepart_cars";
    protected $guarded = ['id'];
}
