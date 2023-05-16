<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    protected $table = "blogs";
    protected $fillable = ['image','title_en','title_ar','slug','content_en','content_ar','added_by','updated_by','active'];

    // ex. $blog->image_url
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return;
        }
        return Storage::disk('upload')->url($this->image);
    }
}


