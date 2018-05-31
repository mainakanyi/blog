<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $guarded = [];

//    Adds many to many relationship to users table
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
