<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lcomment extends Model
{
    use HasFactory;
    protected $fillable=[
        'listing_id',
        'user_id',
        'comment',
        'is_published'
    ];

    public function listing()
    {
        return $this->belongsTo(listing::class,'listing_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
