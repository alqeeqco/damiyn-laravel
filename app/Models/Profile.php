<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $fillable = ['name_en','name_ar','email','mobile_number','added_by','updaetd_by','active'];
}
