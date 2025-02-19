<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('portfolios', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(model: \App\Models\Image::class)->constrained()->cascadeOnDelete();
      $table->string('name');
      $table->string('description');
      $table->string('type');
      $table->integer('views')->default(0);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('portfolios');
  }
};
