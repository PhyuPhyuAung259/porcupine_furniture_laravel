<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    use HasFactory;
    public function product()
{
  return $this->belongsTo('App\Product', 'product_id');
}
}
