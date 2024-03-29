<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'slug', 'image', 'text'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getImageURL() : string
    {
        return URL::asset('image/categories/' . $this->image);
    }
}
