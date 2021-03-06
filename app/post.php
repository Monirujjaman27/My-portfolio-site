<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class post extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tags()
    {
    return $this->belongsToMany('App\tag');
    }
}
