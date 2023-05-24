<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listing extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'featured_image',
        'image_one',
        'image_two',
        'image_three',
        'category_id',
        'sub_category_id',
        'child_category_id',
        'title',
        'slug',
        'description',
        'price',
        'facilities',
        'location',
        'country_id',
        'state_id',
        'city_id',
        'phone_number',
        'is_published'




    ];

    public function category()
    {
        return $this->belongsTo(Category::class);

    }
    public function childcategory()
    {
        return $this->belongsTo(ChildCategory::class);

    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);

    }
    public function country()
    {
        return $this->belongsTo(Country::class);

    }
    public function lcomments()
    {
        return $this->hasMany(lcomment::class,'listing_id','id');
        
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
//     public function scopeStartsBefore(Builder $query, $max_price): Builder
// {
//     return $query->where('price', '<=', $max_price);
// }
}
