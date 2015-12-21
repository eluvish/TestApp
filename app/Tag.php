<?php

namespace myCloset;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function items() {
        return $this->belongsToMany('myCloset\Item')->withTimestamps();
    }
}
