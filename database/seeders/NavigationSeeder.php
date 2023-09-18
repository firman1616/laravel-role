<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Navigation::create([
            'name' => 'Konfigurasi',
            'url' => 'konfigurasi',
            'icon' => 'ti-settings',
            'main_menu' => null
        ]);
        Navigation::create([
            'name' => 'Roles',
            'url' => 'konfigurasi/roles',
            'icon' => '',
            'main_menu' => 1
        ]);
        Navigation::create([
            'name' => 'Permission',
            'url' => 'konfigurasi/permissions',
            'icon' => '',
            'main_menu' => 1
        ]);
    }
}
