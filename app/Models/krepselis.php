<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\preke;

class krepselis extends Model
{

    use HasFactory;

    public function krepselisPrekesKaina(){
        $this->belongsTo(preke::class, 'preke_kaina', 'preke_kaina');
    }
    protected $fillable = [
        'id',
        'pirkimo_id',
        'vartotojas_id',
        'preke_id',
        'preke_kaina',
        'preke_vienetai',
        'preke_total',
        'ar_apmoketa',
    ];
}
