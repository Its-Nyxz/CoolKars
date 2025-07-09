<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $table = "companies";
    protected $guarded = ['id'];

    public function sites()
    {
        return $this->hasMany(Site::class);
    }

    // Relasi ke User yang terakhir mengubah (optional)
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
