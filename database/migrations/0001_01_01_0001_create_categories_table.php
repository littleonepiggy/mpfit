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
       Schema::create('categories', function (Blueprint $table) {
          $table->id();
          $table->string("name");
          $table->timestamp('created_at')->useCurrent();
          $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
       });

       // Insert 3 rows directly after table creation
       DB::table('categories')->insert([
          ['name' => 'хрупкий'],
          ['name' => 'легкий'],
          ['name' => 'тяжелый'],
       ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
