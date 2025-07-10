<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    /** @use HasFactory<\Database\Factories\PromoFactory> */
    use HasFactory;

    protected $table = "promos";
    protected $guarded = ['id'];

    /**
     * Relasi dinamis ke Sparepart atau Service berdasarkan 'type'
     */
    public function related()
    {
        if ($this->type === 0) {
            return $this->belongsTo(Sparepart::class, 'related_id');
        }

        if ($this->type === 1) {
            return $this->belongsTo(Service::class, 'related_id');
        }

        return null;
    }

    /**
     * Alias accessor agar bisa langsung panggil: $promo->item
     */
    public function getItemAttribute()
    {
        if ($this->type === 0) {
            return Sparepart::find($this->related_id);
        }

        if ($this->type === 1) {
            return Service::find($this->related_id);
        }

        return null;
    }
}
