<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarType extends Model
{
    /** @use HasFactory<\Database\Factories\CarTypeFactory> */
    use HasFactory;
    protected $table = "car_types";
    protected $guarded = ['id'];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
