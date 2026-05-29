<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // Ini KTP asli resep (Primary Key)

            $table->string('recipe_name');
            // Ini fotokopi KTP dari tabel kategori Hilman (Foreign Key)
            $table->integer('kategori_id');
            $table->string('image');
            $table->text('ingredients');
            $table->text('instructions');
            $table->timestamps(); // Bikin kolom created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
