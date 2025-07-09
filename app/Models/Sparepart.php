<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    /** @use HasFactory<\Database\Factories\SparepartFactory> */
    use HasFactory;

    protected $table = "spareparts";
    protected $guarded = ['id'];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'sparepart_cars');
    }

    public function sparepartSites()
    {
        return $this->hasMany(SparepartSite::class);
    }
}
