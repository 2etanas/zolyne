<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkelkPreke extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'preke_id',
        'preke_pavadinimas',
        'preke_aprasymas',
        'preke_kaina',
        'preke_foto1',
        'preke_foto2',
        'preke_foto3',
        'preke_foto4',
        'updated_at',
    ];

}
