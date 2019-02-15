<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no', 'total', 'date', 'orderable_id', 'orderable_type'];
}
