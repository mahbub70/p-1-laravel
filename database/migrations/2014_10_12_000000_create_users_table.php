<?php

use App\Enums\Gender;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',250);
            $table->string('username',250)->unique()->nullable();
            $table->string('email',250)->unique();
            $table->string('full_phone',250)->unique();
            $table->string('blood_group',250);
            $table->string('image',250)->nullable();
            $table->text('address',1000);
            $table->string('gender')->nullable();
            $table->string('password',250);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
