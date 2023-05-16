<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table = "settings";
    protected $fillable = ['video','title_video_en','title_video_ar','content_video_en','content_video_ar','title_gallary_en','title_gallary_ar','content_gallary_en','content_gallary_ar','Articles','logo_header','logo_footer','privacy_policy_en','privacy_policy_ar','Terms_and_Conditions_en','Terms_and_Conditions_ar','added_by','updated_by'];
}
