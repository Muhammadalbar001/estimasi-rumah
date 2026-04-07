<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActualMaterial extends Model
{
    protected $fillable = [
        'estimation_id', 'master_material_id', 'qty', 'price', 'discount', 'subtotal'
    ];

    public function masterMaterial()
    {
        return $this->belongsTo(MasterMaterial::class);
    }
    
    public function estimation()
    {
        return $this->belongsTo(Estimation::class);
    }
}