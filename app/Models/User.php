<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */

  protected $guarded = ['id'];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $hidden = [
    'api_token',
    'password',
  ];

  public function full()
  {
    return $this->load([
      'application' => function ($query) {
        $query->with('catalog');
      }
    ]);
  }

  public function image()
  {
    return $this->belongsTo(related: Image::class);
  }

  public function application()
  {
    return $this->hasMany(related: Application::class);
  }

  public function setPasswordAttribute($value)
  {
    $this->attributes['password'] = Hash::make($value);
  }
}
