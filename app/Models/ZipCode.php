<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    /** @use HasFactory<\Database\Factories\ZipCodeFactory> */
    use HasFactory;

    protected $table = "zip_codes";
    protected $guarded = ['id'];

    public function citie()
    {
        return $this->belongsTo(Citie::class);
    }
}
