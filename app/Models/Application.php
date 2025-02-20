<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
  protected $guarded = ['id'];

  public function full()
  {
    return $this->load([
      'catalog',
      'user'
    ]);
  }

  public function catalog()
  {
    return $this->belongsTo(related: Catalog::class);
  }

  public function user()
  {
    return $this->belongsTo(related: User::class);
  }
}
