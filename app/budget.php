<?php

namespace Budgetapp;

use Illuminate\Database\Eloquent\Model;

class budget extends Model
{
    public function user(){
        return $this->belongsTo('Budgetapp\User');
    }
}
