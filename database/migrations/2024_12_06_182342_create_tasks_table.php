<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_done')->default(false);
            $table->string('title');
            $table->string('description')->nullable();
            $table->dateTime('due_date');
            $table
                ->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->onDelete('CASCADE');
            $table
                ->foreignIdFor(Category::class)
                ->references('id')
                ->on('categories')
                ->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropForeignIdFor(Category::class);
        });
        Schema::dropIfExists('tasks');
    }
};
