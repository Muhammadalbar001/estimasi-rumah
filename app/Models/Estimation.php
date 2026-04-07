<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    protected $fillable = [
        'user_id',
        'project_name',
        'house_type',
        'building_area',
        'bed_count',
        'bath_count',
        'price_per_m2_used',
        'bed_price_used',
        'bath_price_used',
        'total_base_cost',
        'total_additional_cost',
        'grand_total',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}