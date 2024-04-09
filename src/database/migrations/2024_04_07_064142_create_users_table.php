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
         if(Schema::exists('users'))
        {
    
            Schema::table('users', function (Blueprint $table) {
                $table->string('PhoneNumber');
            });
        }else{
            $table->id();
            $table->string('PhoneNumber');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    
    }
};
