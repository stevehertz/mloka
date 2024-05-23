<?php

namespace Database\Seeders;

use App\Models\KenyaCounty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KenyaCountiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $counties = [
            ['name' => 'Baringo'],
            ['name' => 'Bomet'],
            ['name' => 'Bungoma'],
            ['name' => 'Busia'],
            ['name' => 'Elgeyo-Marakwet'],
            ['name' => 'Embu'],
            ['name' => 'Garissa'],
            ['name' => 'Homa Bay'],
            ['name' => 'Isiolo'],
            ['name' => 'Kajiado'],
            ['name' => 'Kakamega'],
            ['name' => 'Kericho'],
            ['name' => 'Kiambu'],
            ['name' => 'Kilifi'],
            ['name' => 'Kirinyaga'],
            ['name' => 'Kisii'],
            ['name' => 'Kisumu'],
            ['name' => 'Kitui'],
            ['name' => 'Kwale'],
            ['name' => 'Laikipia'],
            ['name' => 'Lamu'],
            ['name' => 'Machakos'],
            ['name' => 'Makueni'],
            ['name' => 'Mandera'],
            ['name' => 'Marsabit'],
            ['name' => 'Meru'],
            ['name' => 'Migori'],
            ['name' => 'Mombasa'],
            ['name' => 'Murang\'a'],
            ['name' => 'Nairobi'],
            ['name' => 'Nakuru'],
            ['name' => 'Nandi'],
            ['name' => 'Narok'],
            ['name' => 'Nyamira'],
            ['name' => 'Nyandarua'],
            ['name' => 'Nyeri'],
            ['name' => 'Samburu'],
            ['name' => 'Siaya'],
            ['name' => 'Taita-Taveta'],
            ['name' => 'Tana River'],
            ['name' => 'Tharaka-Nithi'],
            ['name' => 'Trans-Nzoia'],
            ['name' => 'Turkana'],
            ['name' => 'Uasin Gishu'],
            ['name' => 'Vihiga'],
            ['name' => 'Wajir'],
            ['name' => 'West Pokot'],
        ];

        foreach ($counties as $county) {
            KenyaCounty::create($county);
        }
    }
}
