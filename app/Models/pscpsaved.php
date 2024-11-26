<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class pscpsaved extends Model
{

  protected $fillable = [
    'operatorName',
    'testDateTime',
    'location',
    'deviceInfo',
    'certificateInfo',
    'terpenuhi',
    'tidak_terpenuhi',
    't2a_ab',
    't2b_ab',
    't3_14_ab',
    't3_16_ab',
    't3_18_ab',
    't3_20_ab',
    't3_22_ab',
    't3_24_ab',
    't3_26_ab',
    't3_28_ab',
    't3_30_ab',
    't1a_36_ab',
    't1a_32_ab',
    't1a_30_ab',
    't1a_24_ab',
    't1b_47mm_r1_ab',
    't1b_47mm_r2_ab',
    't1b_47mm_r3_ab',
    't1b_47mm_r4_ab',
    't1b_79mm_r1_ab',
    't1b_79mm_r2_ab',
    't1b_79mm_r3_ab',
    't1b_79mm_r4_ab',
    't1b_111mm_r1_ab',
    't1b_111mm_r2_ab',
    't1b_111mm_r3_ab',
    't1b_111mm_r4_ab',
    't4_15mm_hab',
    't4_15mm_vab',
    't4_20mm_hab',
    't4_20mm_vab',
    't4_10mm_hab',
    't4_10mm_vab',
    't5_k005mm_ab',
    't5_k010mm_ab',
    't5_k015mm_ab',
    't2a_sp',
    't2b_sp',
    't3_14_sp',
    't3_16_sp',
    't3_18_sp',
    't3_20_sp',
    't3_22_sp',
    't3_24_sp',
    't3_26_sp',
    't3_28_sp',
    't3_30_sp',
    't1a_36_sp',
    't1a_32_sp',
    't1a_30_sp',
    't1a_24_sp',
    't1b_47mm_r1_sp',
    't1b_47mm_r2_sp',
    't1b_47mm_r3_sp',
    't1b_47mm_r4_sp',
    't1b_79mm_r1_sp',
    't1b_79mm_r2_sp',
    't1b_79mm_r3_sp',
    't1b_79mm_r4_sp',
    't1b_111mm_r1_sp',
    't1b_111mm_r2_sp',
    't1b_111mm_r3_sp',
    't1b_111mm_r4_sp',
    't4_15mm_hsp',
    't4_15mm_vsp',
    't4_20mm_hsp',
    't4_20mm_vsp',
    't4_10mm_hsp',
    't4_10mm_vsp',
    't5_k005mm_sp',
    't5_k010mm_sp',
    't5_k015mm_sp',
    'result',
    'notes',
    'status',
    'submitted_by',
    'officerName',
    'supervisorName',
    'officer_signature',
    'supervisor_signature',
    'rejection_note',
    'reviewed_at',
    'reviewed_by',
    'supervisor_id'
  ];

  protected $casts = [
    'testDateTime' => 'datetime',
    'reviewed_at' => 'datetime',
    'terpenuhi' => 'boolean',
    'tidak_terpenuhi' => 'boolean',
    'created_at' => 'datetime',
    't2a_ab' => 'boolean',
    't2b_ab' => 'boolean',
    't3_14_ab' => 'boolean',
    't3_16_ab' => 'boolean',
    't3_18_ab' => 'boolean',
    't3_20_ab' => 'boolean',
    't3_22_ab' => 'boolean',
    't3_24_ab' => 'boolean',
    't3_26_ab' => 'boolean',
    't3_28_ab' => 'boolean',
    't3_30_ab' => 'boolean',
    't1a_36_ab' => 'boolean',
    't1a_32_ab' => 'boolean',
    't1a_30_ab' => 'boolean',
    't1a_24_ab' => 'boolean',
    't1b_47mm_r1_ab' => 'boolean',
    't1b_47mm_r2_ab' => 'boolean',
    't1b_47mm_r3_ab' => 'boolean',
    't1b_47mm_r4_ab' => 'boolean',
    't1b_79mm_r1_ab' => 'boolean',
    't1b_79mm_r2_ab' => 'boolean',
    't1b_79mm_r3_ab' => 'boolean',
    't1b_79mm_r4_ab' => 'boolean',
    't1b_111mm_r1_ab' => 'boolean',
    't1b_111mm_r2_ab' => 'boolean',
    't1b_111mm_r3_ab' => 'boolean',
    't1b_111mm_r4_ab' => 'boolean',
    't4_15mm_hab' => 'boolean',
    't4_15mm_vab' => 'boolean',
    't4_20mm_hab' => 'boolean',
    't4_20mm_vab' => 'boolean',
    't4_10mm_hab' => 'boolean',
    't4_10mm_vab' => 'boolean',
    't5_k005mm_ab' => 'boolean',
    't5_k010mm_ab' => 'boolean',
    't5_k015mm_ab' => 'boolean',
    't2a_sp' => 'boolean',
    't2b_sp' => 'boolean',
    't3_14_sp' => 'boolean',
    't3_16_sp' => 'boolean',
    't3_18_sp' => 'boolean',
    't3_20_sp' => 'boolean',
    't3_22_sp' => 'boolean',
    't3_24_sp' => 'boolean',
    't3_26_sp' => 'boolean',
    't3_28_sp' => 'boolean',
    't3_30_sp' => 'boolean',
    't1a_36_sp' => 'boolean',
    't1a_32_sp' => 'boolean',
    't1a_30_sp' => 'boolean',
    't1a_24_sp' => 'boolean',
    't1b_47mm_r1_sp' => 'boolean',
    't1b_47mm_r2_sp' => 'boolean',
    't1b_47mm_r3_sp' => 'boolean',
    't1b_47mm_r4_sp' => 'boolean',
    't1b_79mm_r1_sp' => 'boolean',
    't1b_79mm_r2_sp' => 'boolean',
    't1b_79mm_r3_sp' => 'boolean',
    't1b_79mm_r4_sp' => 'boolean',
    't1b_111mm_r1_sp' => 'boolean',
    't1b_111mm_r2_sp' => 'boolean',
    't1b_111mm_r3_sp' => 'boolean',
    't1b_111mm_r4_sp' => 'boolean',
    't4_15mm_hsp' => 'boolean',
    't4_15mm_vsp' => 'boolean',
    't4_20mm_hsp' => 'boolean',
    't4_20mm_vsp' => 'boolean',
    't4_10mm_hsp' => 'boolean',
    't4_10mm_vsp' => 'boolean',
    't5_k005mm_sp' => 'boolean',
    't5_k010mm_sp' => 'boolean',
    't5_k015mm_sp' => 'boolean',
  ];

  // Boot method untuk logging
  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      Log::info('Creating new xraysaved record with data:', $model->toArray());
    });

    static::created(function ($model) {
      Log::info('Successfully created xraysaved record with ID: ' . $model->id);
    });

    static::saving(function ($model) {
      Log::info('Attempting to save xraysaved record:', $model->toArray());
    });

    static::saved(function ($model) {
      Log::info('Successfully saved xraysaved record with ID: ' . $model->id);
    });

    static::updating(function ($model) {
      Log::info('Updating xraysaved record:', $model->toArray());
    });

    static::updated(function ($model) {
      Log::info('Successfully updated xraysaved record with ID: ' . $model->id);
    });

    static::deleting(function ($model) {
      Log::info('Deleting xraysaved record with ID: ' . $model->id);
    });

    static::deleted(function ($model) {
      Log::info('Successfully deleted xraysaved record with ID: ' . $model->id);
    });
  }

  public function officer()
  {
    return $this->belongsTo(Officer::class, 'submitted_by');
  }
  // Relationship dengan user (jika ada)
  public function submitter()
  {
    return $this->belongsTo(User::class, 'submitted_by');
  }

  public function reviewer()
  {
    return $this->belongsTo(User::class, 'reviewed_by');
  }

  public function supervisor()
  {
    return $this->belongsTo(User::class, 'supervisor_id');
  }

  // Method untuk mengecek status
  public function isPending()
  {
    return $this->status === 'pending_supervisor';
  }

  public function isApproved()
  {
    return $this->status === 'approved';
  }

  public function isRejected()
  {
    return $this->status === 'rejected';
  }
}
