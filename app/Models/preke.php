<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\krepselis;

class preke extends Model
{
    use HasFactory;

    public function prekesKainaKrepselis(){
        $this->belongsTo(krepselis::class, 'preke_kaina', 'preke_kaina');
    }

}
