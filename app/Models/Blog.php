<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = ['image','title_en','title_ar','content_en','content_ar','added_by','updated_by','active'];
}

