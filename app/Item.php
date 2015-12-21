<?php

namespace myCloset;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function tags() {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('myCloset\Tag')->withTimestamps();
    }

    public function user() {
        return $this->belongsTo('myCloset\User');
    }

}
