<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = ['number_orders','mobile_user','order_status','order_type','added_by','date','active','show_order_en','show_order_ar'];
}
