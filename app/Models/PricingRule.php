<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingRule extends Model
{
    protected $fillable = [
        'house_type',
        'base_price_per_m2',
        'bed_additional_cost',
        'bath_additional_cost',
    ];
}