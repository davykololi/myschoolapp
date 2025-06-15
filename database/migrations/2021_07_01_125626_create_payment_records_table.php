<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->decimal('amount_paid')->default(0);
            $table->decimal('balance')->default(0);
            $table->string('payment_mode');
            $table->string('payment_ref_code');
            $table->string('payment_date');
            $table->boolean('verified')->default(0);
            $table->string('ref_no', 100)->unique()->nullable();
            $table->string('barcode');
            $table->foreignUuid('student_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('payment_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('accountant_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('payment_section_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('payment_records');
    }
}
