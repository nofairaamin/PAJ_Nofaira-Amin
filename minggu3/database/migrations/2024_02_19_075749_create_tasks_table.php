<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /**
 * Mendefinisikan method up untuk membuat tabel tasks.
 * Method ini digunakan untuk membuat struktur tabel tasks dalam database.
 * Tabel tasks memiliki kolom id (primary key), name (string), description (string), dan timestamps (created_at dan updated_at).
 */
public function up(): void
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id(); // Kolom primary key untuk id
        $table->string('name'); // Kolom untuk menyimpan nama task
        $table->string('description'); // Kolom untuk menyimpan deskripsi task
        $table->timestamps(); // Kolom untuk menyimpan informasi waktu pembuatan dan pembaruan task
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};