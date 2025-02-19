<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $guarded = ['id'];

  public function full()
  {
    return $this->load('user');
  }

  public function user()
  {
    return $this->belongsTo(related: User::class);
  }
}
