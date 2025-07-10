<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    /** @use HasFactory<\Database\Factories\CommissionFactory> */
    use HasFactory;

    protected $table = "commissions";
    protected $guarded = ['id'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
