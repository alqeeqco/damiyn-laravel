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
            $table->string('video');
            $table->string('logo_header');
            $table->string('logo_footer');
            $table->string('title_video_en');
            $table->string('title_video_ar');
            $table->text('content_video_en');
            $table->text('content_video_ar');
            $table->string('title_gallary_en');
            $table->string('title_gallary_ar');
            $table->text('content_gallary_en');
            $table->text('content_gallary_ar');
            $table->text('privacy_policy_en');//سياسة الخصوصية
            $table->text('privacy_policy_ar');//سياسة الخصوصية
            $table->text('Terms_and_Conditions_en');//الشروط والاحكام
            $table->text('Terms_and_Conditions_ar');//الشروط والاحكام
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('active')->default(1);
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
