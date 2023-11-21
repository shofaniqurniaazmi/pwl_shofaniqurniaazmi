<?php

use App\Models\setting;
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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->string('label');
            $table->string('value')->nullable();
            $table->string('type');
            $table->timestamps();
        });

        setting::create([
            'key'=>'_site_name',
            'label'=>'Judul Situs',
            'value'=>'Toko Bunga',
            'type'=>'text',
        ]);

        setting::create([
            'key'=>'_location',
            'label'=>'Alamat',
            'value'=>' Rogojampi, Banyuwangi, Jawa Timur',
            'type'=>'text',
        ]);

        setting::create([
            'key' => '_whatsapp_number',
            'label' => 'Nomor WhatsApp',
            'value' => '6282334310302', 
            'type' => 'text',
        ]);
        
        setting::create([
            'key' => '_instagram',
            'label' => 'instagram',
            'value' => 'https://instagram.com/shofaniqr_?igshid=MzMyNGUyNmU2YQ==', 
            'type' => 'text',
        ]);

        setting::create([
            'key' => '_site_description',
            'label' => 'Site Description',
            'value' => 'Membuat Aplikasi Toko Bunga Sederhana untuk Memenuhi salah satu tugas mata kuliah pwl', 
            'type' => 'text',
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
