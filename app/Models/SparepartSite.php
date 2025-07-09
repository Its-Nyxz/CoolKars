<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SparepartSite extends Model
{
    /** @use HasFactory<\Database\Factories\SparepartSiteFactory> */
    use HasFactory;

    protected $table = "sparepart_sites";
    protected $guarded = ['id'];

    /**
     * Relasi ke model Sparepart
     */
    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class);
    }

    /**
     * Relasi ke model Site
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
