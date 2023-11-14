<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->integer('id_country')->nullable();
            $table->string('avatar')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        // Sử dụng DB::statement để sắp xếp lại vị trí của các cột
        DB::statement("ALTER TABLE users MODIFY phone varchar(255) NULL AFTER password");
        DB::statement("ALTER TABLE users MODIFY address varchar(255) NULL AFTER phone");
        DB::statement("ALTER TABLE users MODIFY id_country int NULL AFTER address");
        DB::statement("ALTER TABLE users MODIFY avatar varchar(255) NULL AFTER id_country");
        
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('level')->after('remember_token')
                      ->default(1)->comment = '1:admin 0:member';
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
