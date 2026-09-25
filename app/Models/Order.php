<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    // The products that belongs to order
  use HasFactory;
  protected $fillable = [
    'status',
    'total_price',
    'shipping_address',
  ];

  public function products(): BelongsToMany
  {
    return $this->belongsToMany(Product::class);
  }
}
