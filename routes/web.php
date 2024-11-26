<?php

use App\Http\Controllers\DailyTestController;
use App\Http\Controllers\HHMDFormController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HBSCPFormController;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\SignatureController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PSCPFormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

// Rute untuk menampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Rute untuk memproses login
Route::post('/login', [LoginController::class, 'login']);

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute yang dilindungi untuk Officer
Route::middleware(['checkrole:officer'])->group(function () {
    Route::get('/officer/dashboard', function () {
        return view('officer.dashboard');
    })->name('officer.dashboard');
});

// Rute yang dilindungi untuk User (superadmin dan supervisor)
Route::middleware(['checkrole:superadmin,supervisor'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/masterdata', [MasterDataController::class, 'index'])->name('masterdata.index');
    Route::post('/masterdata/add-user', [MasterDataController::class, 'addUser'])->name('masterdata.addUser');
    Route::post('/masterdata/add-officer', [MasterDataController::class, 'addOfficer'])->name('masterdata.addOfficer');
    Route::put('/masterdata/officer/{id}', [MasterDataController::class, 'editOfficer'])->name('masterdata.updateOfficer');
    Route::delete('/masterdata/officer/{id}', [MasterDataController::class, 'deleteOfficer'])->name('masterdata.deleteOfficer');
    Route::get('/masterdata/officer/{id}', [MasterDataController::class, 'getOfficer'])->name('masterdata.getOfficer');
    Route::put('/masterdata/user/{id}', [MasterDataController::class, 'editUser'])->name('masterdata.updateUser');
    Route::delete('/masterdata/user/{id}', [MasterDataController::class, 'deleteUser'])->name('masterdata.deleteUser');
    Route::get('/masterdata/user/{id}', [MasterDataController::class, 'getUser'])->name('masterdata.getUser');
    Route::get('/hhmdform', [DashboardController::class, 'hhmdIndex'])->name('hhmdform');
    Route::get('/wtmd', [DashboardController::class, 'wtmdIndex'])->name('wtmd.index');
    Route::get('/pscp', [DashboardController::class, 'pscpIndex'])->name('xrayform');
    Route::get('/hbscp', [DashboardController::class, 'hbscpIndex'])->name('xrayform');
    Route::get('/xrayform', [DashboardController::class, 'xrayIndex'])->name('xray.index');
});

// Rute Daily Task yang dapat diakses oleh semua pengguna yang sudah login
Route::middleware(['checkrole:superadmin,supervisor,officer'])->group(function () {
    Route::prefix('daily-test')->name('daily-test.')->group(function () {
        // X-ray routes
        Route::prefix('x-ray')->name('x-ray.')->group(function () {
            Route::get('/pscp', [DailyTestController::class, 'pscpCabin'])->name('pscp');
            Route::get('/hbscp', [DailyTestController::class, 'hbscpBagasi'])->name('hbscp');
        });
        // End X-ray routes

        // WTMD routes
        Route::prefix('wtmd')->name('wtmd.')->group(function () {
            Route::get('/pos-timur', [DailyTestController::class, 'wtmdPosTimur'])->name('pos-timur');
            Route::get('/pscp-utara', [DailyTestController::class, 'wtmdPscpUtara'])->name('pscp-utara');
            Route::get('/pscp-selatan', [DailyTestController::class, 'wtmdPscpSelatan'])->name('pscp-selatan');
        });

        // HHMD route
        Route::get('/hhmd', [DailyTestController::class, 'hhmdLayout'])->name('hhmd');
    });

    Route::get('/officer-signature-image', [SignatureController::class, 'showOfficer'])->name('officer.signature.image');
    Route::get('/user-signature-image', [SignatureController::class, 'showUser'])->name('user.signature.image');
    // HHMD form submission routes
    Route::post('/submit-hhmd', [HHMDFormController::class, 'store'])->name('submit.hhmd');

    // X-RAY form submission routes
    Route::post('/submit-pscp-cabin', [PSCPFormController::class, 'store'])->name('submit.pscp.cabin');
    Route::post('/submit-hbscp-bagasi', [HBSCPFormController::class, 'store'])->name('submit.hbscp.bagasi');
    // X-RAY form submission routes
});

// HHMD Dashboard routes
Route::get('/review/hhmd/{id}', [HHMDFormController::class, 'review'])->name('review.hhmd.reviewhhmd');
Route::get('/pdf/{id}', [PdfController::class, 'generatePDF'])->name('pdf.hhmd');
Route::post('/generate-merged-pdf', [PdfController::class, 'generateMergedPDF'])
    ->name('generate.merged.pdf');
Route::patch('/hhmd/update-status/{id}', [HHMDFormController::class, 'updateStatus'])->name('hhmd.updateStatus');

Route::post('/hhmd/{id}/save-supervisor-signature', [HHMDFormController::class, 'saveSupervisorSignature'])->name('hhmd.saveSupervisorSignature');

Route::post('/filter-hhmd-forms', [DashboardController::class, 'filterByDate'])->name('filter.hhmd.forms');
// End HHMD Dashboard routes

// PSCP Dashboard routes
Route::get('/review/pscp/{id}', [PSCPFormController::class, 'review'])->name('review.pscp.reviewpscp');
Route::get('/pdf/pscp/{id}', [PdfController::class, 'generatePDF'])->name('pdf.pscp');
Route::post('/generate-merged-pdf', [PdfController::class, 'generateMergedPDF'])
    ->name('generate.merged.pdf');
Route::patch('/pscp/update-status/{id}', [PSCPFormController::class, 'updateStatus'])->name('pscp.updateStatus');

Route::post('/filter-pscp-forms', [DashboardController::class, 'filterByDate'])->name('filter.pscp.forms');
// Route::get('/cabinutara', [DashboardController::class, 'Index'])->name('pscp.index');
Route::post('/pscp/{id}/save-supervisor-signature', [PSCPFormController::class, 'saveSupervisorSignature'])->name('pscp.saveSupervisorSignature');

Route::get('/xray-forms', [DashboardController::class, 'showXrayForms'])->name('xray.forms');
// Route::post('/filter-pscp-forms', [DashboardController::class, 'dateRangePscp'])->name('filter.pscp.forms');
// End PSCP Dashboard routes

// HBSCP Dashboard routes
Route::get('/review/hbscp/{id}', [HBSCPFormController::class, 'review'])->name('review.hbscp.reviewhbscp');
Route::get('/pdf/{id}', [PdfController::class, 'generatePDF'])->name('pdf.hbscp');
Route::post('/generate-merged-pdf', [PdfController::class, 'generateMergedPDF'])
    ->name('generate.merged.pdf');
Route::patch('/hbscp/update-status/{id}', [HBSCPFormController::class, 'updateStatus'])->name('hbscp.updateStatus');

// Route::get('/hbscp', [DashboardController::class, 'hbscpIndex'])->name('hbscpcabin.index');
Route::post('/hbscp/{id}/save-supervisor-signature', [HBSCPFormController::class, 'saveSupervisorSignature'])->name('hbscp.saveSupervisorSignature');

Route::get('/xray-forms', [DashboardController::class, 'showXrayForms'])->name('xray.forms');
// Route::post('/filter-hbscp-forms', [DashboardController::class, 'dateRangeXray'])->name('filter.hbscp.forms');
// End HBSCP Dashboard routes

// Mengelompokkan route yang memerlukan middleware 'auth:officer'
Route::middleware(['auth:officer'])->group(function () {

    // Route untuk menampilkan formulir pembuatan HHMD
    Route::get('/officer/hhmd/create', [HHMDFormController::class, 'create'])
        ->name('officer.hhmd.create'); // Menamai route untuk memudahkan referensi

    // Route untuk menampilkan formulir pembuatan PSCP
    Route::get('/officer/pscp/create', [PSCPFormController::class, 'create'])
        ->name('officer.pscp.create'); // Menamai route untuk memudahkan referensi

    // Route untuk menampilkan formulir pembuatan HBSCP
    Route::get('/officer/hbscp/create', [HBSCPFormController::class, 'create'])
        ->name('officer.hbscp.create'); // Menamai route untuk memudahkan referensi

    // Route untuk menampilkan formulir edit HHMD berdasarkan ID
    Route::get('/officer/hhmd/{id}/edit', [HHMDFormController::class, 'edit'])
        ->name('officer.hhmd.edit'); // Menamai route untuk memudahkan referensi

    // Route untuk menampilkan formulir edit PSCP berdasarkan ID
    Route::get('/officer/pscp/{id}/edit', [PSCPFormController::class, 'edit'])
        ->name('officer.pscp.edit'); // Menamai route untuk memudahkan referensi

    // Route untuk menampilkan formulir edit HBSCP berdasarkan ID
    Route::get('/officer/hbscp/{id}/edit', [HBSCPFormController::class, 'edit'])
        ->name('officer.hbscp.edit'); // Menamai route untuk memudahkan referensi

    // Route untuk memperbarui data HHMD berdasarkan ID
    Route::put('/officer/hhmd/{id}', [HHMDFormController::class, 'update'])
        ->name('officer.hhmd.update'); // Menamai route untuk memudahkan referensi

    // Route untuk memperbarui data PSCP berdasarkan ID
    Route::put('/officer/pscp/{id}', [PSCPFormController::class, 'update'])
        ->name('officer.pscp.update'); // Menamai route untuk memudahkan referensi

    // Route untuk memperbarui data HBSCP berdasarkan ID
    Route::put('/officer/hbscp/{id}', [HBSCPFormController::class, 'update'])
        ->name('officer.hbscp.update'); // Menamai route untuk memudahkan referensi

});
// End Mengelompokkan route yang memerlukan middleware 'auth:officer'

// Partials routes HHMD
Route::prefix('hhmdform')->group(function () {
    Route::get('/hbscp', function () {
        return view('partials.hbscp');
    })->name('hbscp.index');
    Route::get('/poskedatangan', function () {
        return view('partials.kedatangan');
    })->name('kedatangan.index');
    Route::get('/postimur', function () {
        return view('partials.postimur');
    })->name('postimur.index');
    Route::get('/posbarat', function () {
        return view('partials.posbarat');
    })->name('posbarat.index');
    Route::get('/pscpselatan', function () {
        return view('partials.pscpselatan');
    })->name('pscpselatan.index');
    Route::get('/pscputara', function () {
        return view('partials.pscputara');
    })->name('pscputara.index');
});
// Partials routes HHMD

// Partials routes Xray
// Mengelompokkan route dengan prefix 'pscpform'
Route::prefix('xrayform')->group(function () {
    Route::get('/cabinutara', function () {
        return view('partials.cabinutara');
    })->name('cabinutara.index');
    Route::get('/cabinselatan', function () {
        return view('partials.cabinselatan');
    })->name('cabinselatan.index');
    Route::get('/bagasitimur', function () {
        return view('partials.bagasitimur');
    })->name('bagasitimur.index');
    Route::get('/bagasibarat', function () {
        return view('partials.bagasibarat');
    })->name('bagasibarat.index');
});
// End Partials routes Xray

Route::get('/xrayform/cabinutara', [DashboardController::class, 'cabinutara_formCard'])->name('cabinutara.index');
Route::post('/xrayform/cabinutara/filter', [DashboardController::class, 'filtercabinutra_FormCardByDate'])->name('filter.cabinutara.forms');

Route::get('/xrayform/cabinselatan', [DashboardController::class, 'cabinselatan_formCard'])->name('cabinselatan.index');
Route::post('/xrayform/cabinselatan/filter', [DashboardController::class, 'filtercabinselatan_FormCardByDate'])->name('filter.cabinselatan.forms');

Route::get('/xrayform/bagasitimur', [DashboardController::class, 'bagasitimur_formCard'])->name('bagasitimur.index');
Route::post('/xrayform/bagasitimur/filter', [DashboardController::class, 'filterbagasitimur_FormCardByDate'])->name('filter.bagasitimur.forms');

Route::get('/xrayform/bagasibarat', [DashboardController::class, 'bagasibarat_formCard'])->name('bagasibarat.index');
Route::post('/xrayform/bagasibarat/filter', [DashboardController::class, 'filterbagasibarat_FormCardByDate'])->name('filter.bagasibarat.forms');

// HHMD Partials routes
Route::get('/hhmdform/kedatangan', [DashboardController::class, 'kedatangan_formCard'])->name('kedatangan.index');
Route::post('/hhmdform/kedatangan/filter', [DashboardController::class, 'filterKedatangan_FormCardByDate'])->name('filter.kedatangan.forms');

Route::get('/hhmdform/hbscp', [DashboardController::class, 'hbscp_formCard'])->name('hbscp.index');
Route::post('/hhmdform/hbscp/filter', [DashboardController::class, 'filterhbscp_FormCardByDate'])->name('filter.hbscp.forms');

Route::get('/hhmdform/postimur', [DashboardController::class, 'postimur_formCard'])->name('postimur.index');
Route::post('/hhmdform/postimur/filter', [DashboardController::class, 'filterpostimur_FormCardByDate'])->name('filter.postimur.forms');

Route::get('/hhmdform/posbarat', [DashboardController::class, 'posbarat_formCard'])->name('posbarat.index');
Route::post('/hhmdform/posbarat/filter', [DashboardController::class, 'filterposbarat_FormCardByDate'])->name('filter.posbarat.forms');

Route::get('/hhmdform/pscputara', [DashboardController::class, 'pscputara_formCard'])->name('pscputara.index');
Route::post('/hhmdform/pscputara/filter', [DashboardController::class, 'filterpscputara_FormCardByDate'])->name('filter.pscputara.forms');

Route::get('/hhmdform/pscpselatan', [DashboardController::class, 'pscpselatan_formCard'])->name('pscpselatan.index');
Route::post('/hhmdform/pscpselatan/filter', [DashboardController::class, 'filterpscpselatan_FormCardByDate'])->name('filter.pscpselatan.forms');
// End HHMD Partials routes