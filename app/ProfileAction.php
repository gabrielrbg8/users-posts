<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileAction extends Model
{
    //
    protected $fillable = [
        'name', 'description'
    ];
    public function action(){
        return $this->belongsTo(Action::class, 'action_id', 'id');
    }
}
