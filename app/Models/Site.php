<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /** @use HasFactory<\Database\Factories\SiteFactory> */
    use HasFactory;

    protected $table = "sites";
    protected $guarded = ['id'];

    const CATEGORY_CAR_DEALER = 0;
    const CATEGORY_COOLKARS   = 1;

    public static function categoryOptions(): array
    {
        return [
            self::CATEGORY_CAR_DEALER => 'Car Dealer',
            self::CATEGORY_COOLKARS   => 'CoolKars',
        ];
    }

    public function getCategoryNameAttribute(): string
    {
        return self::categoryOptions()[$this->category] ?? 'Unknown';
    }

    // Relasi: Site dimiliki oleh Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relasi: Site punya banyak Department
    public function departments()
    {
        return $this->hasMany(Department::class);
    }

    // Relasi ke User yang terakhir mengubah
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function sparepartSites()
    {
        return $this->hasMany(SparepartSite::class);
    }
}
