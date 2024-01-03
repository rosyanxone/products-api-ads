<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductAsset extends Model
{
    use HasFactory;
    
    protected $table = 'product_assets';
    protected $fillable = ['product_id', 'image'];

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_id');
    }
}
