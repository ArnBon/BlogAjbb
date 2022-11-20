<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $guarded = [];
   protected $dates = ['published_at']; 

   public function category()
    {
        return $this->belongsTo(Category::class);
    } 

     public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /*video 19*/
    public function scopePublished($query)
    {
        $query->WhereNotNull('published_at')
         ->where('published_at', '<=', Carbon::now() )
         ->latest('published_at');
    }

    
}


