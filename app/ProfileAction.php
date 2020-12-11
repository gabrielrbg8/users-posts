<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileAction extends Model
{
    //

    public function action(){
        return $this->belongsToMany(Action::class, 'action_id', 'id');
    }
}
