<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function colors()
    {
        return $this->belongsToMany("App\Models\Color");
    }

    public function category()
    {
        return $this->belongsTo("App\Models\Category");
    }

    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size');
    }
}
