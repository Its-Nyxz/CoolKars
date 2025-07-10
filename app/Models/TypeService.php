<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeService extends Model
{
    /** @use HasFactory<\Database\Factories\TypeServiceFactory> */
    use HasFactory;

    protected $table = "type_services";
    protected $guarded = ['id'];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
