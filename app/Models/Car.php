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

    const TYPE_MEDIUM = 0;
    const TYPE_CBU    = 1;
    const TYPE_EUROPE = 2;

    public static function typeOptions(): array
    {
        return [
            self::TYPE_MEDIUM => 'Medium',
            self::TYPE_CBU    => 'CBU',
            self::TYPE_EUROPE => 'Europe',
        ];
    }

    public function getTypeNameAttribute(): string
    {
        return self::typeOptions()[$this->type] ?? 'Unknown';
    }

    public function spareparts()
    {
        return $this->belongsToMany(Sparepart::class, 'sparepart_cars');
    }
}
