<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisSKController;
use App\Http\Controllers\JenisMemoController;
use App\Http\Controllers\jenisSuratMasukController;
use App\Http\Controllers\JenisSuratInternController;
use App\Http\Controllers\DataSkController;
use App\Http\Controllers\DataMemoController;
use App\Http\Controllers\DataSuratMasukController;
use App\Http\Controllers\DataSuratInternController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KraniController;
use App\Http\Controllers\TamuController;

use App\Http\Controllers\KraniDataSkController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [TamuController::class,'index'])->name('tamu');
// Route::get('/pengajuan', [TamuController::class,'pengajuan'])->name('pengajuan');
// Route::get('/tracking-pengajuan', [TamuController::class,'tracking'])->name('tracking');


Route::get('/', [LoginController::class,'index'])->name('login');
// Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginaksi', [LoginController::class,'login'])->name('loginaksi');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/admin', [AdminController::class, 'index'])->name('admin')->middleware('auth');

Route::get('/role', [RoleController::class, 'index'])->name('role')->middleware('auth');
Route::POST('/role/store', [RoleController::class, 'store'])->name('add.role')->middleware('auth');
Route::get('/role/{id}', [RoleController::class, 'editview'])->name('editRole')->middleware('auth');
Route::put('/role/{id}/edit', [RoleController::class, 'update'])->name('updaterole')->middleware('auth');
Route::get('/roledelete/{id}', [RoleController::class, 'hapus'])->name('rolehapus')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user')->middleware('auth');
Route::POST('/user/store', [UserController::class, 'store'])->name('add_user')->middleware('auth');
Route::get('/user/{id}', [UserController::class, 'edituser'])->name('edituser')->middleware('auth');
Route::put('/user/{id}/edit', [UserController::class, 'update'])->name('updateuser')->middleware('auth');
Route::get('/userdelete/{id}', [UserController::class, 'hapus'])->name('userhapus')->middleware('auth');
Route::get('/statususer/{id}', [UserController::class, 'statususer'])->name('statususer')->middleware('auth');  

Route::get('/jenissk', [JenisSKController::class, 'index'])->name('jenissk')->middleware('auth');
Route::POST('/jenissk/store', [JenisSKController::class, 'store'])->name('add_jenissk')->middleware('auth');
Route::get('/jenissk/{id}', [JenisSKController::class, 'editview'])->name('editJenisSk')->middleware('auth');
Route::put('/jenissk/{id}/edit', [JenisSKController::class, 'update'])->name('updatejenissk')->middleware('auth');
Route::get('/jenisskdelete/{id}', [JenisSKController::class, 'hapus'])->name('jenisskhapus')->middleware('auth');

Route::get('/jenismemo', [JenisMemoController::class, 'index'])->name('jenismemo')->middleware('auth');
Route::POST('/jenismemo/store', [JenisMemoController::class, 'store'])->name('add_jenismemo')->middleware('auth');
Route::get('/jenismemo/{id}', [JenisMemoController::class, 'editview'])->name('editJenisMemo')->middleware('auth');
Route::put('/jenismemo/{id}/edit', [JenisMemoController::class, 'update'])->name('updatejenismemo')->middleware('auth');
Route::get('/jenismemodelete/{id}', [JenisMemoController::class, 'hapus'])->name('jenismemohapus')->middleware('auth');

Route::get('/jenis-surat-masuk', [jenisSuratMasukController::class, 'index'])->name('jenisSuratMasuk')->middleware('auth');
Route::POST('/jenis-surat-masuk/store', [jenisSuratMasukController::class, 'store'])->name('add_jenisSuratMasuk')->middleware('auth');
Route::get('/jenis-surat-masuk/{id}', [jenisSuratMasukController::class, 'editview'])->name('jenisSuratMasukEdit')->middleware('auth');
Route::put('/jenis-surat-masuk/{id}/update', [jenisSuratMasukController::class, 'update'])->name('updatejenisSuratMasuk')->middleware('auth');
Route::get('/jenis-surat-masuk/hapus/{id}', [jenisSuratMasukController::class, 'hapus'])->name('jenisSuratMasukHapus')->middleware('auth');

Route::get('/jenis-surat-intern', [JenisSuratInternController::class, 'index'])->name('JenisSuratIntern')->middleware('auth');
Route::POST('/jenis-surat-intern/store', [JenisSuratInternController::class, 'store'])->name('add_jenisintern')->middleware('auth');
Route::get('/jenis-surat-intern/hapus/{id}', [JenisSuratInternController::class, 'hapus'])->name('JenisSuratIntern.hapus')->middleware('auth');
Route::get('/jenis-surat-intern/{id}', [JenisSuratInternController::class, 'editview'])->name('JenisSuratInternEdit')->middleware('auth');
Route::put('/jenis-surat-intern/{id}/update', [JenisSuratInternController::class, 'update'])->name('updateJenisSuratIntern')->middleware('auth');


Route::get('/datask', [DataSkController::class, 'index'])->name('datask')->middleware('auth');
Route::POST('/datask/store', [DataSkController::class, 'store'])->name('add_datask')->middleware(['auth','check.size']);
Route::get('/datask/{id}', [DataSkController::class, 'editview'])->name('editsk')->middleware('auth');
Route::put('/datask/{id}/edit', [DataSkController::class, 'update'])->name('updatesk')->middleware(['auth','check.size']);
Route::get('/dataskdelete/{id}', [DataSkController::class, 'hapus'])->name('dataskhapus')->middleware('auth');
// Route::get('download/{id}', [DataSkController::class, 'download'])->name('downloadfile')->middleware('auth');
Route::get('/download/{fileName}', [DataSkController::class, 'downloadFile'])->name('download')->middleware('auth');

Route::get('/datamemo', [DataMemoController::class, 'index'])->name('datamemo')->middleware('auth');
Route::POST('/datamemo/store', [DataMemoController::class, 'store'])->name('add_datamemo')->middleware(['auth','check.size']);
Route::get('/datamemo/{id}', [DataMemoController::class, 'editview'])->name('editmemo')->middleware('auth');
Route::put('/datamemo/{id}/edit', [DataMemoController::class, 'update'])->name('updatedatamemo')->middleware(['auth','check.size']);
Route::get('/datamemodelete/{id}', [DataMemoController::class, 'hapus'])->name('datamemohapus')->middleware('auth');
Route::get('download/{id}', [DataMemoController::class, 'download'])->name('downloadfile')->where('file', '.*')->middleware('auth');

Route::get('/datasuratmasuk', [DataSuratMasukController::class, 'index'])->name('datasuratmasuk')->middleware('auth');
Route::POST('/datasuratmasuk/store', [DataSuratMasukController::class, 'store'])->name('add_datasuratmasuk')->middleware(['auth','check.size']);
Route::get('/datasuratmasuk/{id}', [DataSuratMasukController::class, 'editview'])->name('editSuratMasuk')->middleware('auth');
Route::put('/datasuratmasuk/{id}/edit', [DataSuratMasukController::class, 'update'])->name('updatedatasuratmasuk')->middleware(['auth','check.size']);
Route::get('/datasuratmasukdelete/{id}', [DataSuratMasukController::class, 'hapus'])->name('datasuratmasukhapus')->middleware('auth');
Route::get('download/{id}', [DataSuratMasukController::class, 'download'])->name('downloadfile')->where('file', '.*')->middleware('auth');


Route::get('/dataintern', [DataSuratInternController::class, 'index'])->name('dataintern')->middleware('auth');
Route::POST('/dataintern/store', [DataSuratInternController::class, 'store'])->name('add_dataintern')->middleware(['auth','check.size']);
Route::get('/data-surat/intern/{id}', [DataSuratInternController::class, 'hapus'])->name('datasuratinternhapus')->middleware('auth');
Route::get('/data-surat/edit/intern/{id}', [DataSuratInternController::class, 'editview'])->name('editSuratIntern')->middleware('auth');
Route::put('/data-surat/edit/{id}/update', [DataSuratInternController::class, 'update'])->name('updatedatasuratintern')->middleware(['auth','check.size']);

Route::get('/histori', [HistoriController::class, 'index'])->name('histori')->middleware('auth');

// Krani
Route::get('/krani', [KraniController::class, 'index'])->name('krani')->middleware('auth');
