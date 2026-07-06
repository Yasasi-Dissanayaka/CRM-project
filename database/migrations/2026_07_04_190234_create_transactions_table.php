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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('customer_id')->constrained()->onDelete('cascade');

            $table->string('invoice_number');

            $table->string('transaction_number')->unique();

            $table->decimal('amount', 10, 2);

            $table->date('payment_date');

            $table->enum('payment_method', [
                'Stripe',
                'Cash',
                'Card',
                'Bank Transfer'
            ]);

            $table->enum('status', [
                'Completed',
                'Pending',
                'Failed'
            ])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
