<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Catalog;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Models\Portfolio;
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

    $files = Storage::disk('public')->files('ava');

    $users = [];

    foreach ($files as $file) {
      $image = Image::create([
        'path' => $file,
      ]);
      $users[] = User::create([
        'login' => $faker->unique()->userName,
        'password' => '123',
        'image_id' => $image->id,
      ]);
    }

    $files = Storage::disk('public')->files('');
    for ($i = 0; $i <= 4; $i++) {
      foreach ($files as $file) {
        $image = Image::create([
          'path' => $file,
        ]);
        $catalog = Catalog::create([
          'image_id' => $image->id,
          'name' => $faker->unique()->word,
          'type' => $image->path,
          'time_value' => $faker->numberBetween(1, 12),
          'time_unit' => $faker->randomElement(['hour', 'day', 'week', 'month']),
          'description' => $faker->unique()->text(100),
          'price' => $faker->randomFloat(0, 2000, 20000),
        ]);

        Comment::create([
          'catalog_id' => $catalog->id,
          'user_id' => $users[0]->id,
          'text' => 'Реально крутая работа 👍👍👍',
        ]);
        Comment::create([
          'catalog_id' => $catalog->id,
          'user_id' => $users[1]->id,
          'text' => 'Крутяк 😎',
        ]);

        $image = Image::create([
          'path' => $file,
        ]);
        Portfolio::create([
          'image_id' => $image->id,
          'name' => $faker->unique()->word,
          'type' => $image->path,
          'time_value' => $faker->numberBetween(1, 12),
          'time_unit' => $faker->randomElement(['hour', 'day', 'week', 'month']),
          'description' => $faker->unique()->text(1000),
        ]);
      }
    }

    $user = User::create([
      'login' => 'admin',
      'password' => 'admin',
    ]);
    Application::create([
      'catalog_id' => $catalog->id,
      'user_id' => $user->id,
    ]);
  }
}
