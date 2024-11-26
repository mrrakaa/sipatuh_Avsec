<?php

namespace App\Http\Controllers;

use App\Models\hbscpsaved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class HBSCPFormController extends Controller
{
  public function store(Request $request)
  {
    Log::info('Received HBSCP data:', $request->all());

    try {
      $validatedData = $request->validate([
        'operatorName' => 'required|string',
        'testDateTime' => 'required|date',
        'location' => 'required|string',
        'deviceInfo' => 'required|string',
        'certificateInfo' => 'required|string',
        'terpenuhi' => 'boolean',
        'tidak_terpenuhi' => 'boolean',
        't2a_ab' => 'nullable|boolean',
        't2b_ab' => 'nullable|boolean',
        't3_14_ab' => 'nullable|boolean',
        't3_16_ab' => 'nullable|boolean',
        't3_18_ab' => 'nullable|boolean',
        't3_20_ab' => 'nullable|boolean',
        't3_22_ab' => 'nullable|boolean',
        't3_24_ab' => 'nullable|boolean',
        't3_26_ab' => 'nullable|boolean',
        't3_28_ab' => 'nullable|boolean',
        't3_30_ab' => 'nullable|boolean',
        't1a_36_ab' => 'nullable|boolean',
        't1a_32_ab' => 'nullable|boolean',
        't1a_30_ab' => 'nullable|boolean',
        't1a_24_ab' => 'nullable|boolean',
        't1b_47mm_r1_ab' => 'nullable|boolean',
        't1b_47mm_r2_ab' => 'nullable|boolean',
        't1b_47mm_r3_ab' => 'nullable|boolean',
        't1b_47mm_r4_ab' => 'nullable|boolean',
        't1b_79mm_r1_ab' => 'nullable|boolean',
        't1b_79mm_r2_ab' => 'nullable|boolean',
        't1b_79mm_r3_ab' => 'nullable|boolean',
        't1b_79mm_r4_ab' => 'nullable|boolean',
        't1b_111mm_r1_ab' => 'nullable|boolean',
        't1b_111mm_r2_ab' => 'nullable|boolean',
        't1b_111mm_r3_ab' => 'nullable|boolean',
        't1b_111mm_r4_ab' => 'nullable|boolean',
        't4_15mm_hab' => 'nullable|boolean',
        't4_15mm_vab' => 'nullable|boolean',
        't4_20mm_hab' => 'nullable|boolean',
        't4_20mm_vab' => 'nullable|boolean',
        't4_10mm_hab' => 'nullable|boolean',
        't4_10mm_vab' => 'nullable|boolean',
        't5_k005mm_ab' => 'nullable|boolean',
        't5_k010mm_ab' => 'nullable|boolean',
        't5_k015mm_ab' => 'nullable|boolean',
        't2a_sp' => 'nullable|boolean',
        't2b_sp' => 'nullable|boolean',
        't3_14_sp' => 'nullable|boolean',
        't3_16_sp' => 'nullable|boolean',
        't3_18_sp' => 'nullable|boolean',
        't3_20_sp' => 'nullable|boolean',
        't3_22_sp' => 'nullable|boolean',
        't3_24_sp' => 'nullable|boolean',
        't3_26_sp' => 'nullable|boolean',
        't3_28_sp' => 'nullable|boolean',
        't3_30_sp' => 'nullable|boolean',
        't1a_36_sp' => 'nullable|boolean',
        't1a_32_sp' => 'nullable|boolean',
        't1a_30_sp' => 'nullable|boolean',
        't1a_24_sp' => 'nullable|boolean',
        't1b_47mm_r1_sp' => 'nullable|boolean',
        't1b_47mm_r2_sp' => 'nullable|boolean',
        't1b_47mm_r3_sp' => 'nullable|boolean',
        't1b_47mm_r4_sp' => 'nullable|boolean',
        't1b_79mm_r1_sp' => 'nullable|boolean',
        't1b_79mm_r2_sp' => 'nullable|boolean',
        't1b_79mm_r3_sp' => 'nullable|boolean',
        't1b_79mm_r4_sp' => 'nullable|boolean',
        't1b_111mm_r1_sp' => 'nullable|boolean',
        't1b_111mm_r2_sp' => 'nullable|boolean',
        't1b_111mm_r3_sp' => 'nullable|boolean',
        't1b_111mm_r4_sp' => 'nullable|boolean',
        't4_15mm_hsp' => 'nullable|boolean',
        't4_15mm_vsp' => 'nullable|boolean',
        't4_20mm_hsp' => 'nullable|boolean',
        't4_20mm_vsp' => 'nullable|boolean',
        't4_10mm_hsp' => 'nullable|boolean',
        't4_10mm_vsp' => 'nullable|boolean',
        't5_k005mm_sp' => 'nullable|boolean',
        't5_k010mm_sp' => 'nullable|boolean',
        't5_k015mm_sp' => 'nullable|boolean',
        'result' => 'required|in:pass,fail',
        'notes' => 'nullable|string',
        'status' => 'required|in:pending_supervisor,approved,rejected',
        'officer_signature' => 'nullable|string',
        'supervisor_signature' => 'nullable|string',
        'supervisor_id' => 'required|exists:users,id,role,supervisor',
      ]);

      // Proses checkbox fields
      $checkboxFields = [
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
        't5_k015mm_sp'
      ];

      foreach ($checkboxFields as $field) {
        $validatedData[$field] = $request->has($field);
      }

      // Proses tanda tangan
      if ($request->has('officer_signature_data')) {
        $validatedData['officer_signature'] = $request->input('officer_signature_data');
      }

      if ($request->has('supervisor_signature_data')) {
        $validatedData['supervisor_signature'] = $request->input('supervisor_signature_data');
      }

      $hbscpsave = new hbscpsaved($validatedData);

      // Set user information
      if (Auth::guard('web')->check()) {
        $hbscpsave->submitted_by = Auth::guard('web')->id();
        $hbscpsave->officerName = Auth::user()->name;
      } elseif (Auth::guard('officer')->check()) {
        $hbscpsave->submitted_by = Auth::guard('officer')->id();
        $hbscpsave->officerName = Auth::guard('officer')->user()->name;
      } else {
        return redirect()->back()->with('error', 'Anda harus login untuk mengirimkan formulir ini.');
      }

      $hbscpsave->supervisor_id = $validatedData['supervisor_id'];

      $hbscpsave->save();
      return redirect()->route('officer.dashboard')->with('success', 'HBSCP data berhasil disimpan dan menunggu persetujuan supervisor.');
    } catch (\Exception $e) {
      Log::error('Error saving HBSCP data: ' . $e->getMessage());
      return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
    }
  }

  public function create()
  {
    return view('forms.xray-form');
  }

  public function show($id)
  {
    try {
      $data = hbscpsaved::findOrFail($id);
      return view('forms.hbscp-show', compact('data'));
    } catch (\Exception $e) {
      Log::error('Error showing data: ' . $e->getMessage());
      return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
  }

  public function review($id)
  {
    $form = hbscpsaved::findOrFail($id);
    $supervisor = User::find($form->supervisor_id);
    return view('review.xray.reviewhbscp', compact('form', 'supervisor'));
  }

  public function updateStatus(Request $request, $id)
  {
    $form = hbscpsaved::findOrFail($id);

    // Validasi input
    $request->validate([
      'status' => 'required|in:pending_supervisor,approved,rejected',
      'rejection_note' => 'required_if:status,rejected|nullable|string',
      'supervisor_signature_data' => 'nullable|string',
    ]);

    // Update status dan data review
    $form->status = $request->status;
    $form->reviewed_at = now();
    $form->reviewed_by = Auth::id();

    // Jika ditolak, simpan catatan penolakan
    if ($request->status === 'rejected') {
      $form->rejection_note = $request->rejection_note;
    }

    // Jika disetujui
    if ($request->status === 'approved') {
      $form->supervisorName = Auth::user()->name;
      if ($request->has('supervisor_signature_data')) {
        $form->supervisor_signature = $request->supervisor_signature_data;
      }
    }

    try {
      $form->save();
      $message = $request->status === 'rejected'
        ? 'Form ditolak dan catatan telah disimpan.'
        : 'Form berhasil disetujui!';

      return redirect()->route('dashboard')->with('success', $message);
    } catch (\Exception $e) {
      Log::error('Error updating HBSCP status: ' . $e->getMessage());
      return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui status.');
    }
  }

  public function saveSupervisorSignature(Request $request, $id)
  {
    $form = hbscpsaved::findOrFail($id);

    $request->validate([
      'signature' => 'required|string',
    ]);

    $form->supervisor_signature = $request->signature;
    $form->supervisorName = Auth::user()->name;
    $form->save();

    return response()->json(['success' => true]);
  }

  public function edit($id)
  {
    $form = hbscpsaved::findOrFail($id);

    // Pastikan officer hanya bisa edit formnya sendiri
    if ($form->submitted_by !== Auth::guard('officer')->id()) {
      return redirect()->route('officer.dashboard')
        ->with('error', 'Anda tidak memiliki akses ke form ini');
    }

    return view('officer.edit', compact('form'));
  }

  public function update(Request $request, $id)
  {
    $form = hbscpsaved::findOrFail($id);

    // Validasi akses
    if ($form->submitted_by !== Auth::guard('officer')->id()) {
      return redirect()->route('officer.dashboard')
        ->with('error', 'Anda tidak memiliki akses ke form ini');
    }

    try {
      $validatedData = $request->validate([
        'operatorName' => 'required|string',
        'testDateTime' => 'required|date',
        'location' => 'required|string',
        'deviceInfo' => 'required|string',
        'certificateInfo' => 'required|string',
        'result' => 'required|in:pass,fail',
        'notes' => 'nullable|string',
      ]);

      // Process checkbox fields
      $checkboxFields = [
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
        't5_k015mm_sp'
      ];

      foreach ($checkboxFields as $field) {
        $validatedData[$field] = $request->has($field);
      }

      // Set status ke pending_supervisor
      $validatedData['status'] = 'pending_supervisor';

      // Update form
      $form->update($validatedData);
      $form->status = 'pending_supervisor'; // Reset status ke pending
      $form->save();

      return redirect()->route('officer.dashboard')
        ->with('success', 'Form berhasil diperbarui dan menunggu review ulang');
    } catch (\Exception $e) {
      Log::error('Error updating HBSCP form: ' . $e->getMessage());
      return back()->with('error', 'Terjadi kesalahan saat memperbarui form');
    }
  }
}
