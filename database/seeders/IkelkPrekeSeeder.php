<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IkelkPreke;
class IkelkPrekeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IkelkPreke::create([
            'id' => 0,
            'preke_id' =>'1',
            'preke_pavadinimas' => 'ProduktasSuper',
            'preke_aprasymas' => 'Negali buti nieko geresnio jei kalnu kristolo kanape',
            'preke_kaina' => 999,
            'preke_foto1' => 'pirmafoto.jpg',
            'preke_foto2' =>'antrafoto.jpg',
            'preke_foto3' => 'treciafoto.jpg',
            'preke_foto4' => 'ketvirtafoto.jpg'
        ]);
    
    }
}
