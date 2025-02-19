<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
  protected $guarded = ['id'];

  public function full()
  {
    return $this->load([
      'image',
      'comment' => function ($query) {
        $query->with('user');
      }
    ]);
  }

  public function image()
  {
    return $this->belongsTo(related: Image::class);
  }

  public function comment()
  {
    return $this->hasMany(related: Comment::class);
  }
}
