<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function actions(){
        return $this->hasMany(ProfileAction::class, 'profile_id');
    }

}
