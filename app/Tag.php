<?php

namespace Testbed;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function items() {
        return $this->belongsToMany('\Testbed\Item')->withTimestamps();
    }
}
