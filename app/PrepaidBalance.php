<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrepaidBalance extends Model
{
    protected $fillable = ['mobile_number', 'value'];
}
