<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $faker = Factory::create();
    $files = Storage::disk('public')->files('');
    for ($i = 0; $i <= 16; $i++) {
      foreach ($files as $file) {
        $image = \App\Models\Image::create([
          'path' => $file,
        ]);
        \App\Models\Catalog::create([
          'image_id' => $image->id,
          'name' => $faker->unique()->word,
          'type' => $image->path,
          'description' => $faker->unique()->text(100),
          'price' => $faker->randomFloat(0, 2000, 20000),
        ]);
        $image = \App\Models\Image::create([
          'path' => $file,
        ]);
        \App\Models\Portfolio::create([
          'image_id' => $image->id,
          'name' => $faker->unique()->word,
          'type' => $image->path,
          'description' => $faker->unique()->text(1000),
        ]);
      }
    }
  }
}
