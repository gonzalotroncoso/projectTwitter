<?php

namespace App;

use App\Entry;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    //$entry->user
    //Entry N - 1 User
    //Eager loading
    public function user(){
    	return $this->belongsTo(User::class);
    }
    //mutator
    public function setTitleAttribute($value){
    	$this->attributes['title']=Str::slug($value);
    	$this->attributes['slug']=Str::slug($value);
    }

    public function getRouteKeyName(){
    	return 'slug';
    }
 /*   public function getUrl(){
    	return url($this->slug.'-'.$this->id)
    }*/
}
