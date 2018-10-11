<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{
    protected $fillable = ['user_id','name','avatar','contactno','notes'];

    public function user(){
        $this->belongsTo('App\User');
    }
}
