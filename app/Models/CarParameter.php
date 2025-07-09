<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarParameter extends Model
{
    /** @use HasFactory<\Database\Factories\CarParameterFactory> */
    use HasFactory;

    protected $table = "car_parameters";
    protected $guarded = ['id'];

    const CATEGORY_CHECKING = 0;
    const CATEGORY_SERVICE  = 1;

    public static function categoryOptions(): array
    {
        return [
            self::CATEGORY_CHECKING => 'Checking',
            self::CATEGORY_SERVICE  => 'Service',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categoryOptions()[$this->category] ?? 'Unknown';
    }
}
