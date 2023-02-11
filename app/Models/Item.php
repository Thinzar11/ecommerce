<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }
}
