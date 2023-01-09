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
}
