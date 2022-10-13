<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('barcodeNumber');
            $table->date('processDate')->nullable();
            $table->enum('process',['IN','OUT'])->default('IN');
            $table->string('productName');
            $table->enum('unit',['Adet','KG','Koli']);

            $table->string('quantity')->default('0');       
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('inAmount')->nullable();
            $table->string('outAmount')->nullable();
            $table->string('companyName');
            $table->char('phone',15);
            $table->string('email')->unique();
            $table->string('criticalAmount');
            $table->string('currentStock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
