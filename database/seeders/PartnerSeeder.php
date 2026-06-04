<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partner::firstOrCreate(
            ['name' => 'Google'],
            ['logo_url' => 'https://placehold.co/200x200']
        );

        Partner::firstOrCreate(
            ['name' => 'Microsoft'],
            ['logo_url' => 'https://placehold.co/200x200']
        );

        Partner::firstOrCreate(
            ['name' => 'Bank Mandiri'],
            ['logo_url' => 'https://placehold.co/200x200']
        );

        Partner::firstOrCreate(
            ['name' => 'Amikom Tech'],
            ['logo_url' => 'https://placehold.co/200x200']
        );
    }
}
