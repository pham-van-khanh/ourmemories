<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('memory_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memory_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['story', 'timeline', 'quote', 'video', 'image'])->default('story');
            $table->string('label')->nullable();
            $table->string('heading')->nullable();
            $table->longText('content')->nullable();
            $table->string('handwritten_note')->nullable();
            $table->string('image')->nullable();
            $table->string('image_tag')->nullable();
            $table->boolean('image_right')->default(false);
            $table->string('time_label')->nullable();
            $table->string('video_url')->nullable();
            $table->string('quote_author')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['memory_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memory_sections');
    }
};
