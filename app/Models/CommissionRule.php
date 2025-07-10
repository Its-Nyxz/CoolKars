<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionRule extends Model
{
    /** @use HasFactory<\Database\Factories\CommissionRuleFactory> */
    use HasFactory;

    protected $table = "commission_rules";
    protected $guarded = ['id'];
}
