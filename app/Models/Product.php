<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Tag;


class Product extends Model
{
    protected $fillable = ['name','category_id', 'price', 'image', 'description'];
    use HasFactory, SoftDeletes;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tag() {
        return $this->belongsToMany(Tag::class);
    }
}
