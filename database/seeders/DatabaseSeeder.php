<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Contact::factory(10)->create();
        \App\Models\Admin::factory(10)->create();
        \App\Models\BlogCategory::factory(10)->create()->each(function ($blogCategory) {
            //create 10 blogs for each blog category
            $blogCategory->blogs()->saveMany(\App\Models\Blog::factory(2)->make());
        });
    }
}
