<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug', 'extract', 'body', 'status', 'user_id', 'category_id'];



    // Relación uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos inversa
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    // Relación muchos a muchos
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Relación  1 a  1 polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable'); 
    }
    

}
