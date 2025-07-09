<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
    /** @use HasFactory<\Database\Factories\CitieFactory> */
    use HasFactory;
    protected $table = "cities";
    protected $guarded = ['id'];

    /**
     * A city belongs to a country.
     */
    public function country()
    {
        return $this->belongsTo(Countries::class);
    }

    /**
     * A city has many zip codes.
     */
    public function zipCodes()
    {
        return $this->hasMany(ZipCode::class);
    }
}
