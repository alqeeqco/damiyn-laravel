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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('number_orders');
            $table->string('mobile_user');
            $table->tinyInteger('Order_status')->default(2);//حالة الطلب
            $table->tinyInteger('Order_type');//نوع الطلب
            $table->string('show_order_en')->nullable();
            $table->string('show_order_ar')->nullable();
            $table->integer('added_by');
            $table->integer('updated_by')->nullable();
            $table->tinyInteger('active');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
