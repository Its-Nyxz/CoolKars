<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory;

    protected $table = "services";
    protected $guarded = ['id'];

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'service_sites')
            ->withPivot('price')
            ->withTimestamps();
    }

    public function serviceSites()
    {
        return $this->hasMany(ServiceSite::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function typeService()
    {
        return $this->belongsTo(TypeService::class, 'type_service_id');
    }
    public function commissions()
    {
        return $this->hasMany(Commission::class);
    }
}
