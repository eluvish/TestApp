<?php

namespace myCloset;

use Illuminate\Database\Eloquent\Model;

class Outfit extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['top','bottom','shoe'];

    public function user() {
        return $this->belongsTo('myCloset\User');
    }
}
