<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $guarded = ['id'];

    public function full()
    {
        return $this->load('image');
    }

    public function image()
    {
        return $this->belongsTo(related: Image::class);
    }
}
