<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarParameterOption extends Model
{
    /** @use HasFactory<\Database\Factories\CarParameterOptionFactory> */
    use HasFactory;

    protected $table = "car_parameter_options";
    protected $guarded = ['id'];

    public const CATEGORY_NO_ISSUE = 0;
    public const CATEGORY_ISSUE_FOUND = 1;

    public static function categoryOptions(): array
    {
        return [
            self::CATEGORY_NO_ISSUE => 'No Issue',
            self::CATEGORY_ISSUE_FOUND => 'Issue Found',
        ];
    }

    public function getCategoryLabelAttribute(): string
    {
        return self::categoryOptions()[$this->category] ?? 'Unknown';
    }
}
