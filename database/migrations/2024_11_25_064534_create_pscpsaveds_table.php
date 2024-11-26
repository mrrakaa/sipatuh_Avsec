<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pscpsaveds', function (Blueprint $table) {
            $table->id();
            $table->string('operatorName');
            $table->dateTime('testDateTime');
            $table->enum('location', ['Cabin Utara', 'Cabin Selatan']);
            $table->string('deviceInfo');
            $table->string('certificateInfo');
            $table->boolean('terpenuhi')->default(true);
            $table->boolean('tidak_terpenuhi')->default(false);
            // Tambahkan kolom-kolom lain sesuai dengan $fillable di model
            $table->boolean('t2a_ab')->default(false);
            $table->boolean('t2b_ab')->default(false);
            $table->boolean('t3_14_ab')->default(false);
            $table->boolean('t3_16_ab')->default(false);
            $table->boolean('t3_18_ab')->default(false);
            $table->boolean('t3_20_ab')->default(false);
            $table->boolean('t3_22_ab')->default(false);
            $table->boolean('t3_24_ab')->default(false);
            $table->boolean('t3_26_ab')->default(false);
            $table->boolean('t3_28_ab')->default(false);
            $table->boolean('t3_30_ab')->default(false);
            $table->boolean('t1a_36_ab')->default(false);
            $table->boolean('t1a_32_ab')->default(false);
            $table->boolean('t1a_30_ab')->default(false);
            $table->boolean('t1a_24_ab')->default(false);
            $table->boolean('t1b_47mm_r1_ab')->default(false);
            $table->boolean('t1b_47mm_r2_ab')->default(false);
            $table->boolean('t1b_47mm_r3_ab')->default(false);
            $table->boolean('t1b_47mm_r4_ab')->default(false);
            $table->boolean('t1b_79mm_r1_ab')->default(false);
            $table->boolean('t1b_79mm_r2_ab')->default(false);
            $table->boolean('t1b_79mm_r3_ab')->default(false);
            $table->boolean('t1b_79mm_r4_ab')->default(false);
            $table->boolean('t1b_111mm_r1_ab')->default(false);
            $table->boolean('t1b_111mm_r2_ab')->default(false);
            $table->boolean('t1b_111mm_r3_ab')->default(false);
            $table->boolean('t1b_111mm_r4_ab')->default(false);
            $table->boolean('t4_15mm_hab')->default(false);
            $table->boolean('t4_15mm_vab')->default(false);
            $table->boolean('t4_20mm_hab')->default(false);
            $table->boolean('t4_20mm_vab')->default(false);
            $table->boolean('t4_10mm_hab')->default(false);
            $table->boolean('t4_10mm_vab')->default(false);
            $table->boolean('t5_k005mm_ab')->default(false);
            $table->boolean('t5_k010mm_ab')->default(false);
            $table->boolean('t5_k015mm_ab')->default(false);
            $table->boolean('t2a_sp')->default(false);
            $table->boolean('t2b_sp')->default(false);
            $table->boolean('t3_14_sp')->default(false);
            $table->boolean('t3_16_sp')->default(false);
            $table->boolean('t3_18_sp')->default(false);
            $table->boolean('t3_20_sp')->default(false);
            $table->boolean('t3_22_sp')->default(false);
            $table->boolean('t3_24_sp')->default(false);
            $table->boolean('t3_26_sp')->default(false);
            $table->boolean('t3_28_sp')->default(false);
            $table->boolean('t3_30_sp')->default(false);
            $table->boolean('t1a_36_sp')->default(false);
            $table->boolean('t1a_32_sp')->default(false);
            $table->boolean('t1a_30_sp')->default(false);
            $table->boolean('t1a_24_sp')->default(false);
            $table->boolean('t1b_47mm_r1_sp')->default(false);
            $table->boolean('t1b_47mm_r2_sp')->default(false);
            $table->boolean('t1b_47mm_r3_sp')->default(false);
            $table->boolean('t1b_47mm_r4_sp')->default(false);
            $table->boolean('t1b_79mm_r1_sp')->default(false);
            $table->boolean('t1b_79mm_r2_sp')->default(false);
            $table->boolean('t1b_79mm_r3_sp')->default(false);
            $table->boolean('t1b_79mm_r4_sp')->default(false);
            $table->boolean('t1b_111mm_r1_sp')->default(false);
            $table->boolean('t1b_111mm_r2_sp')->default(false);
            $table->boolean('t1b_111mm_r3_sp')->default(false);
            $table->boolean('t1b_111mm_r4_sp')->default(false);
            $table->boolean('t4_15mm_hsp')->default(false);
            $table->boolean('t4_15mm_vsp')->default(false);
            $table->boolean('t4_20mm_hsp')->default(false);
            $table->boolean('t4_20mm_vsp')->default(false);
            $table->boolean('t4_10mm_hsp')->default(false);
            $table->boolean('t4_10mm_vsp')->default(false);
            $table->boolean('t5_k005mm_sp')->default(false);
            $table->boolean('t5_k010mm_sp')->default(false);
            $table->boolean('t5_k015mm_sp')->default(false);
            $table->enum('result', ['pass', 'fail'])->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['pending_supervisor', 'approved', 'rejected'])->default('pending_supervisor');
            $table->unsignedBigInteger('submitted_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pscpsaveds');
    }
};
