<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table = "features";
    protected $fillable = ['image','title_en','title_ar','content_ar','content_en','active','updated_at'];
}
