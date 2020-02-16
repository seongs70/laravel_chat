<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //아무거나 넣을수 있음
    protected $guarded = [];

    public function from()
    {
        return $this->belongsTo(User::class, 'from');
    }

    public function to()
    {
        return $this->belongsTo(User::class, 'to');
    }
}
