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
        Schema::table('menus', function (Blueprint $table) {
            $table->string('header')->unique()->after('slug')->nullable();
            $table->string('desc')->nullable();
            $table->string('title_card_one')->nullable();
            $table->string('title_card_two')->nullable();
            $table->string('image_card_one')->nullable();
            $table->string('image_card_two')->nullable();
            $table->string('desc_card_one')->nullable();
            $table->string('desc_card_two')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('header')->nullable();
            $table->dropColumn('desc');
            $table->dropColumn('title_card_one');
            $table->dropColumn('title_card_two');
            $table->dropColumn('image_card_one');
            $table->dropColumn('image_card_two');
            $table->dropColumn('desc_card_one');
            $table->dropColumn('desc_card_two');
        });
    }
};
