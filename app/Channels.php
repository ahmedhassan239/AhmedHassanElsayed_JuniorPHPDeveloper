<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    protected $table ="channels";
    protected $fillable = [
     	'name'
    ];
    
    public function client()
    {
        return $this->belongsToMany('App\Clients');
    }
}
