<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'categories';
    protected $fillable = ['name'];
    protected $appends = ['product_amount'];
    
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function getProductAmountAttribute()
    {
        return $this->product->count();
    }
}
