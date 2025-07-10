<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSite extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceSiteFactory> */
    use HasFactory;

    protected $table = "service_sites";
    protected $guarded = ['id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
