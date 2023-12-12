<?php

use App\Models\Order;
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
        Schema::create('invoices', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->enum(
                'status',
                [
                    'pendiente',
                    'cancelado',

                ]
            )->default('pendiente');

            $table->string('address');
            $table->string('description');
            $table->string('value');
            $table->string('phone');
            $table->string('email');
            $table->string('nit');
            $table->foreignIdFor(Order::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
