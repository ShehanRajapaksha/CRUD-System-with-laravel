<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table ='posts';
    protected $fillable =[
        'category_id',
        'sub_category_id',
        'child_category_id',
        'name',
        'featured_image',
        'featured_text',
        'slug',
        'description',
        'is_published',
        'user_id'


    ];



    public function category()
    {
        return $this->belongsTo((Category::class));

    }
    public function childcategory()
    {
        return $this->belongsTo((ChildCategory::class));

    }

    public function user()
    {
        return $this->belongsTo((User::class));

    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}

