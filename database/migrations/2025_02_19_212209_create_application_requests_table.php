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
    Schema::create('application_requests', function (Blueprint $table) {
      $table->id();
      $table->foreignIdFor(model: \App\Models\User::class)->nullable()->constrained()->cascadeOnDelete();
      $table->foreignIdFor(model: \App\Models\Catalog::class)->nullable()->constrained()->cascadeOnDelete();
      $table->string('status');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('application_requests');
  }
};
