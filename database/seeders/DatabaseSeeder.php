<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\Client\Client;
use App\Models\Client\ClientType;
use App\Models\Faq\Faq;
use App\Models\News\News;
use Database\Seeders\Prod\Culture2021;
use Database\Seeders\Prod\Culture2022;
use Database\Seeders\Prod\FaqSeeder;
use Database\Seeders\Prod\Justice2023;
use Database\Seeders\Prod\People2020;
use Database\Seeders\Prod\Values2014;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         $this->call(FaqSeeder::class);
         $this->call(Justice2023::class);
         $this->call(Values2014::class);
         $this->call(Culture2021::class);
//         $this->call(People2020::class);


//        Faq::factory(10)->create();
//        News::factory(40)->create();

        ClientType::factory(5)->create();

        Client::factory(20)->create();
        Client::factory()->create([
            'first_name' => 'Seiitmurat',
            'last_name' => 'Kalmurat',
            'phone_number' => '77064301045',
            'organization' => 'ЖенПУ',
            'email' => 'test@dataportal.kz',
            'password' => Hash::make('asdasdasd'),
        ]);
        Admin::factory()->create([
            'first_name' => 'Seiitmurat',
            'last_name' => 'Kalmurat',
            'email' => 'admin@dataportal.kz',
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
        ]);
    }
}
