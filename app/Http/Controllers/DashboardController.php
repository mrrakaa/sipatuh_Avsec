<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hhmdsaved;
use App\Models\wtmdsaved;
use App\Models\pscpsaved;
use App\Models\hbscpsaved;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pendingHhmdForms = collect();
        $pendingWtmdForms = collect();
        $pendingXrayForms = collect();
        $pendingPscpForms = collect();
        $pendingHbscpForms = collect();

        // Pengecekan peran pengguna yang sedang login
        if ($user->role == 'supervisor') {
            // Jika pengguna adalah supervisor, ambil semua formulir HHMD 
            // yang berstatus 'pending_supervisor' dan ditujukan kepada supervisor tersebut
            $pendingPscpForms = pscpsaved::where('status', 'pending_supervisor')
                ->where('supervisor_id', $user->id)  // Filter berdasarkan ID supervisor
                ->get();
        } elseif ($user->role == 'superadmin') {
            // Jika pengguna adalah superadmin, ambil SEMUA formulir HHMD 
            // yang berstatus 'pending_supervisor' tanpa batasan
            $pendingPscpForms = pscpsaved::where('status', 'pending_supervisor')->get();
        }

        // Pengecekan peran pengguna yang sedang login 
        if ($user->role == 'supervisor') {
            // Jika pengguna adalah supervisor, ambil semua formulir PSCP 
            // yang berstatus 'pending_supervisor' dan ditujukan kepada supervisor tersebut
            $pendingPscpForms = pscpsaved::where('status', 'pending_supervisor')
                ->where('supervisor_id', $user->id)  // Filter berdasarkan ID supervisor
                ->get();
        } elseif ($user->role == 'superadmin') {
            // Jika pengguna adalah superadmin, ambil SEMUA formulir PSCP 
            // yang berstatus 'pending_supervisor' tanpa batasan
            $pendingPscpForms = pscpsaved::where('status', 'pending_supervisor')->get();
        }

        // Pengecekan peran pengguna yang sedang login 
        if ($user->role == 'supervisor') {
            // Jika pengguna adalah supervisor, ambil semua formulir HBSCP 
            // yang berstatus 'pending_supervisor' dan ditujukan kepada supervisor tersebut
            $pendingHbscpForms = hbscpsaved::where('status', 'pending_supervisor')
                ->where('supervisor_id', $user->id)  // Filter berdasarkan ID supervisor
                ->get();
        } elseif ($user->role == 'superadmin') {
            // Jika pengguna adalah superadmin, ambil SEMUA formulir HBSCP 
            // yang berstatus 'pending_supervisor' tanpa batasan
            $pendingHbscpForms = hbscpsaved::where('status', 'pending_supervisor')->get();
        }

        return view('dashboard', compact('pendingHhmdForms', 'pendingWtmdForms', 'pendingXrayForms', 'pendingPscpForms', 'pendingHbscpForms'));
    }

    public function hhmdIndex()
    {
        $user = Auth::user();
        $locations = [
            'HBSCP',
            'Pos Kedatangan',
            'Pos Timur',
            'PSCP Selatan',
            'Pos Barat',
            'PSCP Utara'
        ];

        $pendingCounts = [];

        // Query dasar
        $baseQuery = hhmdsaved::where('status', 'pending_supervisor');

        if ($user->role == 'supervisor') {
            $baseQuery->where('supervisor_id', $user->id);
        }

        // Hitung pending untuk setiap lokasi
        foreach ($locations as $location) {
            $pendingCounts[$location] = (clone $baseQuery)
                ->where('location', $location)
                ->count();
        }

        // Query untuk semua form
        $allHhmdForms = hhmdsaved::when($user->role == 'supervisor', function ($query) use ($user) {
            return $query->where('supervisor_id', $user->id);
        })
            ->orderBy('testDateTime', 'desc')
            ->paginate(5);

        // Query untuk form yang sudah diputuskan
        $passorfailForms = hhmdsaved::whereIn('status', ['approved', 'rejected'])->get();

        return view('hhmdform', compact('pendingCounts', 'allHhmdForms', 'passorfailForms'));
    }

    public function xrayIndex()
    {
        $user = Auth::user();
        $locations = [
            'Cabin Utara',
            'Cabin Selatan',
            'Bagasi Timur',
            'Bagasi Barat'
        ];

        // Inisialisasi $pendingCounts dengan default 0 untuk semua lokasi
        $pendingCounts = [
            'pscp' => array_fill_keys($locations, 0),
            'hbscp' => array_fill_keys($locations, 0)
        ];

        // Query untuk pscpsaved
        $allPscpForms = pscpsaved::when($user->role == 'supervisor', function ($query) use ($user) {
            return $query->where('supervisor_id', $user->id);
        })
            ->where('status', 'pending_supervisor')
            ->orderBy('testDateTime', 'desc')
            ->paginate(5);

        // Query untuk hbscpsaved
        $allHbscpForms = hbscpsaved::when($user->role == 'supervisor', function ($query) use ($user) {
            return $query->where('supervisor_id', $user->id);
        })
            ->where('status', 'pending_supervisor')
            ->orderBy('testDateTime', 'desc')
            ->paginate(5);

        // Hitung pending untuk setiap lokasi (untuk pscpsaved)
        foreach ($locations as $location) {
            $pendingCounts['pscp'][$location] = pscpsaved::where('status', 'pending_supervisor')
                ->where('location', $location)
                ->when($user->role == 'supervisor', function ($query) use ($user) {
                    return $query->where('supervisor_id', $user->id);
                })
                ->count();

            // Hitung pending untuk setiap lokasi (untuk hbscpsaved)
            $pendingCounts['hbscp'][$location] = hbscpsaved::where('status', 'pending_supervisor')
                ->where('location', $location)
                ->when($user->role == 'supervisor', function ($query) use ($user) {
                    return $query->where('supervisor_id', $user->id);
                })
                ->count();
        }

        // Query untuk form yang sudah diputuskan (pscpsaved)
        $passPscpForms = pscpsaved::whereIn('status', ['approved', 'rejected'])
            ->when($user->role == 'supervisor', function ($query) use ($user) {
                return $query->where('supervisor_id', $user->id);
            })
            ->get();

        // Query untuk form yang sudah diputuskan (hbscpsaved)
        $passHbscpForms = hbscpsaved::whereIn('status', ['approved', 'rejected'])
            ->when($user->role == 'supervisor', function ($query) use ($user) {
                return $query->where('supervisor_id', $user->id);
            })
            ->get();

        return view('xrayform', compact(
            'pendingCounts',
            'passPscpForms',
            'passHbscpForms',
            'allPscpForms',
            'allHbscpForms'
        ));
    }

    public function cabinutara_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Cabin Utara
        $baseQuery = pscpsaved::where('location', 'Cabin Utara');

        if ($user->role == 'supervisor') {
            $allPscpForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allPscpForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.cabinutara', compact('allPscpForms'));
    }

    public function filtercabinutara_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = pscpsaved::where('location', 'Pos Kedatangan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.cabinutara', [
                'allPscpForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Kedatangan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function cabinselatan_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Cabin Selatan
        $baseQuery = pscpsaved::where('location', 'Cabin Selatan');

        if ($user->role == 'supervisor') {
            $allPscpForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allPscpForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.cabinselatan', compact('allPscpForms'));
    }

    public function filtercabinselatan_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = pscpsaved::where('location', 'Pos Kedatangan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.cabinselatan', [
                'allPscpForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Kedatangan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function bagasitimur_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Cabin Selatan
        $baseQuery = hbscpsaved::where('location', 'Bagasi Timur');

        if ($user->role == 'supervisor') {
            $allHbscpForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHbscpForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.bagasitimur', compact('allHbscpForms'));
    }

    public function filterbagasitimur_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hbscpsaved::where('location', 'Pos Kedatangan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.bagasitimur', [
                'allHbscpForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Kedatangan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function bagasibarat_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Cabin Selatan
        $baseQuery = hbscpsaved::where('location', 'Bagasi Barat');

        if ($user->role == 'supervisor') {
            $allHbscpForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHbscpForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.bagasibarat', compact('allHbscpForms'));
    }

    public function filterbagasibarat_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hbscpsaved::where('location', 'Pos Kedatangan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.bagasibarat', [
                'allHbscpForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Kedatangan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function kedatangan_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'Pos Kedatangan');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.kedatangan', compact('allHhmdForms'));
    }

    public function filterKedatangan_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'Pos Kedatangan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.kedatangan', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Kedatangan Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function postimur_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'Pos Timur');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.postimur', compact('allHhmdForms'));
    }

    public function filterpostimur_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'Pos Timur')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.postimur', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Pos Timur Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function posbarat_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'Pos Barat');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.posbarat', compact('allHhmdForms'));
    }

    public function filterposbarat_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'Pos Barat')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.posbarat', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter Posbarat Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function pscputara_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'PSCP Utara');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.pscputara', compact('allHhmdForms'));
    }

    public function filterpscputara_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'PSCP Utara')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.pscputara', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter PSCP Utara Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function pscpselatan_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'PSCP Selatan');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.pscpselatan', compact('allHhmdForms'));
    }

    public function filterpscpselatan_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'PSCP Selatan')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.pscpselatan', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter HBSCP Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }

    public function hbscp_formCard()
    {
        $user = Auth::user();

        // Query dasar untuk lokasi Pos Kedatangan
        $baseQuery = hhmdsaved::where('location', 'HBSCP');

        if ($user->role == 'supervisor') {
            $allHhmdForms = $baseQuery->where('supervisor_id', $user->id)
                ->orderBy('testDateTime', 'desc')
                ->get();
        } else {
            $allHhmdForms = $baseQuery->orderBy('testDateTime', 'desc')
                ->get();
        }

        return view('partials.hbscp', compact('allHhmdForms'));
    }

    public function filterhbscp_FormCardByDate(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        try {
            $filteredForms = hhmdsaved::where('location', 'HBSCP')
                ->whereBetween('testDateTime', [
                    Carbon::parse($startDate)->startOfDay(),
                    Carbon::parse($endDate)->endOfDay(),
                ])->get();

            if ($filteredForms->isEmpty()) {
                return back()->with('status', 'Tidak ada data yang ditemukan dalam rentang tanggal tersebut.');
            }

            return view('partials.hbscp', [
                'allHhmdForms' => $filteredForms,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ]);
        } catch (\Exception $e) {
            Log::error('Filter HBSCP Error: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memfilter data: ' . $e->getMessage()]);
        }
    }
}
