<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name' => 'Laravel Blogs',
            'contact_number' => '91 940123896',
            'contact_email' => 'laravelsupports@laracast.com',
            'address'   => 'chennai,India'
        ]);
    }
}
