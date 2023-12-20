<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Product;

class ProductTags extends Model
{
    use HasFactory;
    protected $table = 'product_tags';
    protected $guarded = false;

    public function mytags(){
        return $this->belongsTo(Tag::class, 'tag_id', 'id');
    }

    public function myproduct(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
