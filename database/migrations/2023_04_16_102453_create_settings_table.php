<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('video',1000);
            $table->string('logo_header');
            $table->string('logo_footer');
            $table->string('title_video_en',255);
            $table->string('title_video_ar',255);
            $table->string('content_video_en',500);
            $table->string('content_video_ar',500);
            $table->string('title_gallary_en',255);
            $table->string('title_gallary_ar',255);
            $table->string('content_gallary_en',500);
            $table->string('content_gallary_ar',500);
            $table->string('privacy_policy_en',1000);//سياسة الخصوصية
            $table->string('privacy_policy_ar',1000);//سياسة الخصوصية
            $table->string('Terms_and_Conditions_en',1000);//الشروط والاحكام
            $table->string('Terms_and_Conditions_ar',1000);//الشروط والاحكام
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
