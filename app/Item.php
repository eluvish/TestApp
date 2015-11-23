<?php

namespace Testbed;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    public function tags() {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('\Testbed\Tag')->withTimestamps();
    }

    public function users() {
        return $this->belongsTo('\Testbed\Users');
    }

}
