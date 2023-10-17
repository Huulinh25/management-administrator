<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('description')->nullable();

            $table->timestamps();
        });

        DB::statement("ALTER TABLE blogs MODIFY title varchar(255) NULL AFTER id");
        DB::statement("ALTER TABLE blogs MODIFY image varchar(255) NULL AFTER title");
        DB::statement("ALTER TABLE blogs MODIFY description varchar(255) NULL AFTER image");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
