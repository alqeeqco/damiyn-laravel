<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class New_order extends Model
{
    use HasFactory;
    protected $table = "new_order";
    protected $fillable = ['mobile_number','type','added_by','updated_by'];
}
