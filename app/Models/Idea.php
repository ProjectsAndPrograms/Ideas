<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    /*
        THESE VALUES ARE NOT MASS ASIGNABLE
        protected $guarded = [
            // same as fillable 
        ];
    */

    // way of using EIGER LOADING : you can also use $without which is opposite of $with;you can use eiger loaing on controller example is given on dashboard controller 
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];

    protected $withCount = ['likes'];

    // THESE VALUES ARE MASS ASIGNABLE
    protected $fillable = [
        'user_id',
        'content',
    ];

    public function comments(){
        // return $this->hasMany(Comment::class, 'idea_id', 'id');
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }

    public function top_comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC')->limit(3);
    }

    public function user(){         // creating relationship 
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    // this is the scope: the nameing convention is scope always strarts with scope followed by the name of that scope
    // it takes atleast one parameter that is query, you can add additional parameter when you want to send any value to it
    public function scopeSearch(Builder $query, $search): void{

        $query->where('content', 'like', '%' . $search . '%');
    }
}
