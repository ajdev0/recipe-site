<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    //
    use SoftDeletes;

    protected $dates=[
        'published_at'
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'description', 'content' , 'image',
        'published_at', 'user_id', 'category_id',  
        'cookTimeFrom' , 'cookTimeTo' 
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }

    //function for relationship between user and post
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toArray());
    }

    /**
     * pulished
     * 
     */
    public function scopePublished($query){
         
        return $query->where('published_at','<=', now());

    }

    /**
     * scope for search
     */
    public function scopeSearched($query){
        
        $search = request()->query('search');

        if(!$search){
            return $query->published();
        }
        
        return $query->published()->where('title','LIKE',"%{$search}%");
    }

    public function scopeAuthor($query){
        
        return $query->where('user_id','==',Auth::id());
    }
    
}
