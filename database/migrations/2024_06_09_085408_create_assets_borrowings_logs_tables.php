<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsBorrowingsLogsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_assets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->string('serial_number', 50);
            $table->string('status', 50);
            $table->timestamps();
        });

        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained('mst_assets')->onDelete('cascade');
            $table->string('user_email', 50);
            $table->dateTime('borrow_date');
            $table->dateTime('expected_return_date');
            $table->dateTime('actual_return_date')->nullable();
            $table->text('user_signature');
            $table->text('it_staff_signature');
            $table->timestamps();
        });

        Schema::create('borrowing_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('borrowing_id')->constrained('borrowings')->onDelete('cascade');
            $table->dateTime('log_date');
            $table->string('action', 50);
            $table->foreignId('it_staff_id')->constrained('users')->onDelete('cascade');
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
        Schema::dropIfExists('borrowing_logs');
        Schema::dropIfExists('borrowings');
        Schema::dropIfExists('mst_assets');
    }
}
