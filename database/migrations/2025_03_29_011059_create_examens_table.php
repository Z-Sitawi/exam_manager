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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('code_module', 5);
            $table->string('titre_module', 100);
            $table->string('filiere', 150);
            $table->enum('type', ['théorique', 'pratique', 'synthèse']);
            $table->unsignedInteger('duree')->nullable()->default(150);
            $table->date('date_examen');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE examens ADD CONSTRAINT chk_code_module CHECK (code_module REGEXP '^M[0-9]{3}$') ");
        DB::statement("ALTER TABLE examens ADD CONSTRAINT chk_filiere CHECK (filiere != '') ");
        DB::statement("ALTER TABLE examens ADD CONSTRAINT chk_duree CHECK (duree BETWEEN 30 AND 240)");

        //! 'chk_date_examen' contains disallowed function: curdate
        // DB::statement("ALTER TABLE examens ADD CONSTRAINT chk_date_examen CHECK (date_examen > CURDATE())");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
